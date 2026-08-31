<?php


namespace Src\RoutesCollection\Blog;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Siteman_Blog_Comments
{
    static function getRoute_SitemanBlogComments($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route
            ->withController('Src\Controllers\Blog\Controller_Siteman_Blog_Comments')
            ->withModel('Src\Models\Blog\Model_Siteman_Blog_Comments');

        if(!isset($routes_ns[4]) or $routes_ns[4] == 'listview'){
            $route
                //->withAction("actionTables")
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Siteman\SitemanListView');

        }elseif ($routes_ns[4] == 'detailview'){
            $route->withAction('actionDetail')
                ->withAction('htmlDetailView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }elseif ($routes_ns[4] == 'editview'){
            $route->withAction('htmlEditView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }elseif ($routes_ns[4] == 'newview'){
            $route->withAction('htmlNewView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }elseif ($routes_ns[4] == 'deleteview'){
            $route->withAction('htmlDeleteView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }

        return $route;
    }

    static function postRoute_SitemanBlogComments($routes_ns):JointSiteRoute
    {
        $route = (new JointSiteRoute())
            ->withController('Src\Controllers\Blog\Controller_Siteman_Blog_Comments')
            ->withModel('Src\Models\Blog\Model_Siteman_Blog_Comments');

        if (!isset($routes_ns[4]) or $routes_ns[4] == 'listview') {
            $route
                ->withAction('applyFilterView')
                ->withView('JointApp\Views\Siteman\SitemanListView')
                ->responseFormat('json');
        }
        elseif ($routes_ns[4] == 'editview') {
            $route
                ->withAction('actionEdit')
                ->withAction('htmlEditView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }
        elseif ($routes_ns[4] == 'deleteview') {
            $route
                ->withAction('actionDelete')
                ->withAction('postDeleteView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }
        elseif ($routes_ns[4] == 'newview') {
            $route
                ->withAction('actionNew')
                ->withAction('postNewView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }
        return $route;
    }
}