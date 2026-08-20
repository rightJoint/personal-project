<?php

namespace JointApp\Router\RoutesCollection\Api;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Api
{
    use RoutesCollerction_Api_Records;

    static function getRoute_Api($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(isset($routes_ns['2']) and strtolower($routes_ns['2']) == 'records'){
            $route = self::getRoute_ApiRecords($routes_ns);
        }
        return $route;
    }

    static function postRoute_Api($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(isset($routes_ns['2']) and strtolower($routes_ns['2']) == 'records'){
            $route = self::posRoute_ApiRecords($routes_ns);
        }
        return $route;
    }
}
