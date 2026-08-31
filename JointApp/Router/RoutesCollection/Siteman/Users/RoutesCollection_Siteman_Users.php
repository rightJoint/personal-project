<?php

namespace JointApp\Router\RoutesCollection\Siteman\Users;


use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Siteman_Users
{
    static function getRoute_SitemanUsers($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route
            ->withController('JointApp\Controllers\Siteman\Controller_Siteman_Users')
            ->withModel('JointApp\Models\Siteman\Model_Siteman_Users');

        if(!isset($routes_ns[3]) or $routes_ns[3] == 'listview'){
            $route
                //->withAction("actionTables")
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Siteman\SitemanListView');

        }elseif ($routes_ns[3] == 'detailview'){
            $route->withAction('actionDetail')
                ->withAction('htmlDetailView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }elseif ($routes_ns[3] == 'editview'){
            $route->withAction('htmlEditView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }elseif ($routes_ns[3] == 'newview'){
            $route->withAction('htmlNewView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }elseif ($routes_ns[3] == 'deleteview'){
            $route->withAction('htmlDeleteView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }

        return $route;
    }

    static function postRoute_SitemanUsers($routes_ns):JointSiteRoute
    {
        $route = (new JointSiteRoute())
            ->withController('JointApp\Controllers\Siteman\Controller_Siteman_Users')
            ->withModel('JointApp\Models\Siteman\Model_Siteman_Users');

        if (!isset($routes_ns[3]) or $routes_ns[3] == 'listview') {
            $route
                ->withAction('applyFilterView')
                ->withView('JointApp\Views\Siteman\SitemanListView')
                ->responseFormat('json');
        }
        elseif ($routes_ns[3] == 'editview') {
            $route
                ->withAction('actionEdit')
                ->withAction('htmlEditView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }
        elseif ($routes_ns[3] == 'deleteview') {
            $route
                ->withAction('actionDelete')
                ->withAction('postDeleteView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }
        elseif ($routes_ns[3] == 'newview') {
            $route
                ->withAction('actionNew')
                ->withAction('postNewView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }
        return $route;
    }
}