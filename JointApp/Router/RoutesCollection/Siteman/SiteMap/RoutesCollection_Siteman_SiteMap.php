<?php

namespace JointApp\Router\RoutesCollection\Siteman\SiteMap;


use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Siteman_SiteMap
{
    static function getRoute_SitemanSiteMap($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route
            ->withController('JointApp\Controllers\Siteman\Controller_Siteman_Sitemap')
            ->withModel('JointApp\Models\Siteman\Model_Siteman_Sitemap');

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
        }elseif ($routes_ns[3] == 'update'){
            $route->withAction('siteMapUpdate')
                ->withView('JointApp\Views\Siteman\SiteMap\SiteView_Siteman_Sitemap_Update');
        }

        return $route;
    }

    static function postRoute_SitemanSiteMap($routes_ns):JointSiteRoute
    {
        $route = (new JointSiteRoute())
            ->withController('JointApp\Controllers\Siteman\Controller_Siteman_Sitemap')
            ->withModel('JointApp\Models\Siteman\Model_Siteman_Sitemap');

        if (!isset($routes_ns[3]) or $routes_ns[3] == 'listview') {
            $route
                ->withAction('applyFilterView')
                //->withAction('getViewSelectTblPanel')
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