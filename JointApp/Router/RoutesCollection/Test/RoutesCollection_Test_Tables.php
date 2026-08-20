<?php

namespace JointApp\Router\RoutesCollection\Test;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Test_Tables
{
    public static function getRoute_TestTables($routes_ns):JointSiteRoute
    {
        $route = (new JointSiteRoute())
            ->withController('JointApp\Controllers\Test\Controller_Test_Tables')
            ->withModel('JointApp\Models\Test\Model_Test_Tables');

        if(!isset($routes_ns[3])){
            $route
                ->withAction('actionIndex')
                ->withView('JointApp\Views\Test\Tables\SiteView_Test_Tables');
        }
        elseif (strtolower($routes_ns[3]) == 'clear'){
            $route
                ->withAction('actionClearTable')
                ->responseFormat('json')
                ->withView('JointApp\Views\Test\Tables\TpView_Test_Tables');
        }
        elseif (strtolower($routes_ns[3]) == 'download'){
            $route
                ->withAction('actionDownloadTable')
                ->responseFormat('json')
                ->withView('JointApp\Views\Test\Tables\TpView_Test_Tables');
        }
        elseif (strtolower($routes_ns[3]) == 'drop'){
            $route
                ->withAction('actionDropTable')
                ->responseFormat('json')
                ->withView('JointApp\Views\Test\Tables\TpView_Test_Tables');
        }
        elseif (strtolower($routes_ns[3]) == 'create'){
            $route
                ->withAction('actionCreateTable')
                ->responseFormat('json')
                ->withView('JointApp\Views\Test\Tables\TpView_Test_Tables');
        }
        elseif (strtolower($routes_ns[3]) == 'upload'){
            $route
                ->withAction('actionUploadTable')
                ->responseFormat('json')
                ->withView('JointApp\Views\Test\Tables\TpView_Test_Tables');
        }
        elseif (strtolower($routes_ns[3]) == 'uploadall'){
            $route
                ->withAction('actionUploadAll')
                ->responseFormat('json')
                ->withView('JointApp\Views\Test\Tables\TpView_Test_Tables');
        }

        elseif (strtolower($routes_ns[3]) == 'refreshtables'){
            $route
                ->withAction('actionRefreshTables')
                ->withView('JointApp\Views\Test\Tables\TpView_Test_Tables')
                ->responseFormat('json');
        }
        return $route;
    }
    /*
        public static function postRoute_TestTables($routes_ns):JointSiteRoute
        {
            $route = (new JointSiteRoute())
                ->withController('Src\Controllers\Test\Controller_Test_Tables')
                ->withModel('Src\Models\Test\Model_Test_Tables');
            $route
                ->withAction('actionMain')
                ->withView('Src\Views\Test\View_Test_Tables');

            return $route;
        }
    */
}