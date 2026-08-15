<?php

namespace Src\RoutesCollection\Test;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Test
{

    use RoutesCollection_Test_Connection;
    use RoutesCollection_Test_Records;
    use RoutesCollection_Test_Migrations;
    use RoutesCollection_Test_Migrations_Log;
    use RoutesCollection_Test_Tables;

    static function getRoute_Test($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(empty($routes_ns[2])) {
            $route
                ->withController('JointApp\Controllers\Controller')
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
            if(isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'log'){
                $route = self::getRoute_MigrationsLog($routes_ns);
            }else{
                $route = self::getRoute_TestMigrations($routes_ns);
            }
        }
        elseif (strtolower($routes_ns[2]) == 'tables') {
            $route = self::getRoute_TestTables($routes_ns);
        }
        return $route;
    }

    static function postRoute_Test($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if (strtolower($routes_ns[2]) == 'connection') {
            $route = self::postRoute_TestConnection($routes_ns);
        }
        if (strtolower($routes_ns[2]) == 'migrations') {
            if(isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'log'){
                $route = self::postRoute_MigrationsLog($routes_ns);
            }else{
                $route = self::postRoute_TestMigrations($routes_ns);
            }
        }
        elseif (strtolower($routes_ns[2]) == 'records') {
            $route = self::postRoute_Records($routes_ns);
        }

        return $route;
    }
}