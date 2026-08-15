<?php

namespace Src\RoutesCollection\Test;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Test_Connection
{
    static function getRoute_TestConnection($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        //GET: test/connection
        if (empty($routes_ns[3])) {
            $route
                ->withController('Src\Controllers\Test\Controller_Test_Connection')
                ->withAction('actionIndex')
                ->withModel('JointApp\Models\Model')
                ->withView('Src\Views\Test\Connection\SiteView_Test_Conn_Home');
        }
        return $route;
    }

    static function postRoute_TestConnection($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        //GET: test/connection
        if (empty($routes_ns[3])) {
            $route
                ->withController('Src\Controllers\Test\Controller_Test_Connection')
                ->withAction('actionCreateDatabase')
                ->withModel('JointApp\Models\Model')
                ->withView('Src\Views\Test\Connection\SiteView_Test_Conn_Home');
        }
        return $route;
    }
}