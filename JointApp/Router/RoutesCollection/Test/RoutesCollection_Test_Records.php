<?php

namespace JointApp\Router\RoutesCollection\Test;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Test_Records
{
    //GET: test/records
    static function getRoute_Records($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        //test/records
        if(!isset($routes_ns[3])){
            $route
                ->withController('JointApp\Controllers\Test\Controller_Test_Records')
                ->withAction("actionTables")
                ->withAction("htmlTables")
                ->withModel("JointApp\Models\Model_Pdo")
                ->withView("JointApp\Views\Test\Records\SiteView_Test_Records_TblSelector");
        }elseif (!empty($routes_ns[3])){
            $route
                ->withController('JointApp\Controllers\Test\Controller_Test_Records',
                    array('processUri' => '/test/records/'.$routes_ns[3], 'list_frame_id' => $routes_ns[3]))
                ->withModel('JointApp\Models\RecordsModel', array('tableName' => $routes_ns[3]));

            if(!isset($routes_ns[4]) or $routes_ns[4] == 'listview'){
                $route
                    ->withAction("actionTables")
                    ->withAction('actionIndex')
                    ->withAction('htmlListView')
                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_ListView');

            }elseif ($routes_ns[4] == 'detailview'){
                $route->withAction('actionTables')
                    ->withAction('actionDetail')
                    ->withAction('htmlDetailView')
                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_DetailView');
            }elseif ($routes_ns[4] == 'editview'){
                $route->withAction('actionTables')
                    ->withAction('htmlEditView')
                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_EditView');
            }elseif ($routes_ns[4] == 'newview'){
                $route->withAction('actionTables')
                    ->withAction('htmlNewView')
                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_EditView');
            }elseif ($routes_ns[4] == 'deleteview'){
                $route->withAction('actionTables')
                    ->withAction('htmlDeleteView')
                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_DetailView');
            }
        }

        return $route;
    }

//POST: test/records
    static function postRoute_Records($routes_ns):JointSiteRoute
    {
        //POST: test/records
        if (isset($routes_ns[3]) and !empty($routes_ns[3])) {
            $route = (new JointSiteRoute())
                ->withController("JointApp\Controllers\Test\Controller_Test_Records",
                    array('processUri' => '/test/records/'.$routes_ns[3], 'list_frame_id' => $routes_ns[3]))
                ->withModel("JointApp\Models\RecordsModel", array('tableName' => $routes_ns[3]));

            //POST: test/records/...tableName.../listview
            if (!isset($routes_ns[4]) or $routes_ns[4] == 'listview') {
                $route
                    ->withAction('applyFilterView')
                    //->withAction('getViewSelectTblPanel')
                    ->withView('JointApp\Views\Records\RecordListView')
                    ->responseFormat('json');
            }
            //POST: test/records/...tableName.../editview
            elseif ($routes_ns[4] == 'editview') {
                $route
                    ->withAction('actionTables')
                    ->withAction('actionEdit')
                    ->withAction('htmlEditView')
                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_EditView');
            }
            //POST: test/records/...tableName.../deleteview
            elseif ($routes_ns[4] == 'deleteview') {
                $route
                    ->withAction('actionTables')
                    ->withAction('actionDelete')
                    ->withAction('postDeleteView')
                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_DetailView');
            }
            //POST: test/records/...tableName.../newview
            elseif ($routes_ns[4] == 'newview') {
                $route
                    ->withAction('actionTables')
                    ->withAction('actionNew')
                    ->withAction('postNewView')


                    ->withView('JointApp\Views\Test\Records\SiteView_Test_Records_EditView');
            }
        }
        return $route;
    }
}