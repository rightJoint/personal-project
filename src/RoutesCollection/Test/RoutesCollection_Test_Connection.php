<?php

namespace Src\RoutesCollection\Test;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Test_Connection
{
    static function getRoute_Test($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(empty($routes_ns[2])) {
            $route
                ->withController('Src\Controllers\Test\Controller_Test')
                ->withAction('actionIndex')
                ->withModel('JointApp\Models\Model')
                ->withView('Src\Views\Test\SiteView_Test_Home');
        }
        elseif (strtolower($routes_ns[2]) == 'connection') {
            $route = self::getRoute_TestConnection($routes_ns);
        }
        elseif (strtolower($routes_ns[2]) == 'records') {
            $route = self::getRoute_Records($routes_ns);
        }
        elseif (strtolower($routes_ns[2]) == 'migrations') {
            $route = self::getRoute_TestMigrations($routes_ns);
        }

        return $route;
    }

    static function postRoute_Test($routes_ns):JointSiteRoute
    {
        if (strtolower($routes_ns[2]) == 'connection') {
            return self::postRoute_TestConnection($routes_ns);
        }elseif (strtolower($routes_ns[2]) == 'migrations') {
            return self::postRoute_TestMigrations($routes_ns);
        }
        elseif (strtolower($routes_ns[2]) == 'records') {
            return self::postRoute_Records($routes_ns);
        }
        //elseif (strtolower($routes_ns[2]) == 'tables') {
        //    return self::postRoute_TestTables($routes_ns);
        //}
    }


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