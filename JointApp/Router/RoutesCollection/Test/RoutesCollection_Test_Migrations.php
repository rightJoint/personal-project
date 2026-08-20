<?php

namespace JointApp\Router\RoutesCollection\Test;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Test_Migrations
{
    //GET: test/migrations
    static function getRoute_TestMigrations($routes_ns):JointSiteRoute
    {
        //GET: test/migrations
        $route = (new JointSiteRoute())
            ->withController('JointApp\Controllers\Test\Controller_Test_Migrations')
            ->withModel('JointApp\Models\Migrations\Model_Migrations')
            ->withAction("actionCheckStatus");
        if(!isset($routes_ns[3]) or $routes_ns[3] == 'listview'){
            $route
                //->withAction("actionTables")
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_List');
        }elseif ($routes_ns[3] == 'detailview'){
            $route->withAction('actionDetail')
                ->withAction('htmlDetailView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_DetailView');
        }elseif ($routes_ns[3] == 'editview'){
            $route->withAction('htmlEditView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_EditView');
        }elseif ($routes_ns[3] == 'newview'){
            $route//->withAction('actionTables')
            ->withAction('htmlNewView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_EditView');
        }elseif ($routes_ns[3] == 'deleteview'){
            $route//->withAction('actionTables')
            ->withAction('htmlDeleteView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_DetailView');
        }
        return $route;
    }

    //POST: test/migrations
    static function postRoute_TestMigrations($routes_ns):JointSiteRoute
    {
        //POST: test/records
        $route = (new JointSiteRoute())
            ->withController('JointApp\Controllers\Test\Controller_Test_Migrations')
            ->withModel('JointApp\Models\Migrations\Model_Migrations');

        //POST: test/records/...tableName.../listview
        if (!isset($routes_ns[3]) or $routes_ns[3] == 'listview') {
            $route
                ->withAction('applyFilterView')
                //->withAction('getViewSelectTblPanel')
                ->withView('JointApp\Views\Records\RecordListView')
                ->responseFormat('json');
        }
        //POST: test/records/...tableName.../editview
        elseif ($routes_ns[3] == 'editview') {
            $route
                //->withAction('actionTables')
                ->withAction("actionCheckStatus")
                ->withAction('actionEdit')
                ->withAction('htmlEditView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_EditView');
        }
        //POST: test/records/...tableName.../deleteview
        elseif ($routes_ns[3] == 'deleteview') {
            $route
                //->withAction('actionTables')
                ->withAction("actionCheckStatus")
                ->withAction('actionDelete')
                ->withAction('postDeleteView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_DetailView');
        }
        //POST: test/records/...tableName.../newview
        elseif ($routes_ns[3] == 'newview') {
            $route
                //->withAction('actionNew')
                ->withAction("actionCheckStatus")
                ->withAction('actionNew')
                ->withAction('postNewView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_EditView');
        }
        elseif ($routes_ns[3] == 'createtables') {
            $route
                ->withAction('actionCreateTables')
                ->withAction('actionCheckStatus')
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_List');
        }
        elseif ($routes_ns[3] == 'glob') {
            $route
                ->withAction('actionGlob')
                ->withAction('actionCheckStatus')
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_List');
        }
        elseif ($routes_ns[3] == 'execNew') {
            $route
                ->withAction('actionExecNew')
                ->withAction('actionCheckStatus')
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_List');
        }
        elseif ($routes_ns[3] == 'detailview') {
            $route->withAction("actionExecOne")
                ->withAction("actionCheckStatus")
                ->withAction('actionDetail')
                ->withAction('htmlDetailView')
                ->withView('JointApp\Views\Test\Migrations\SiteView_Test_Migrations_DetailView');
        }
        return $route;
    }
}