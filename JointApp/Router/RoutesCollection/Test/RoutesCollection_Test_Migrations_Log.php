<?php

namespace JointApp\Router\RoutesCollection\Test;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Test_Migrations_Log
{
    static function getRoute_MigrationsLog($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route
            ->withController('JointApp\Controllers\Test\Controller_Test_Log')
            ->withModel('JointApp\Models\Migrations\Model_MigrationsLog');
        if(!isset($routes_ns[4]) or $routes_ns[4] == 'listview'){
            $route
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log');

        }elseif ($routes_ns[4] == 'detailview'){
            $route->withAction('actionDetail')
                ->withAction('htmlDetailView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_DetailView');
        }elseif ($routes_ns[4] == 'editview'){
            $route->withAction('htmlEditView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_EditView');
        }elseif ($routes_ns[4] == 'newview'){
            $route->withAction('htmlNewView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_EditView');
        }elseif ($routes_ns[4] == 'deleteview'){
            $route->withAction('htmlDeleteView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_DetailView');
        }

        return $route;
    }

    static function postRoute_MigrationsLog($routes_ns):JointSiteRoute
    {
        $route = (new JointSiteRoute())
            ->withController("JointApp\Controllers\Test\Controller_Test_Log")
            ->withModel('JointApp\Models\Migrations\Model_MigrationsLog');

        if (!isset($routes_ns[4]) or $routes_ns[4] == 'listview') {
            $route
                ->withAction('applyFilterView')
                //->withAction('getViewSelectTblPanel')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log')
                ->responseFormat('json');
        }
        elseif ($routes_ns[4] == 'editview') {
            $route->withAction('actionEdit')
                ->withAction('htmlEditView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_EditView');
        }
        elseif ($routes_ns[4] == 'deleteview') {
            $route->withAction('actionDelete')
                ->withAction('postDeleteView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_DetailView');
        }
        elseif ($routes_ns[4] == 'newview') {
            $route
                ->withAction('postNewView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_EditView');
        }
        return $route;
    }
}