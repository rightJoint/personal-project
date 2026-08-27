<?php

namespace JointApp\Router\RoutesCollection\Siteman;


use JointApp\Router\JointSiteRoute;
use JointApp\Router\RoutesCollection\Siteman\SiteMap\RoutesCollection_Siteman_SiteMap;

trait RoutesCollection_Siteman
{
    use RoutesCollection_Siteman_SiteMap;

    static function getRoute_Siteman($routes_ns):JointSiteRoute
    {
        //siteman
        if(!isset($routes_ns[2]) or empty($routes_ns[2])){
            $route = new JointSiteRoute();
            $route->withModel('JointApp\Models\Model')
                ->withController('JointApp\Controllers\ControllerWeb')
                ->withView('JointApp\Views\Siteman\SiteView_Siteman_Main');

            return $route;
        }
        //siteman/sitemap
        elseif (strtolower($routes_ns[2]) == 'sitemap'){
            return self::getRoute_SitemanSiteMap($routes_ns);
        }
    }

    static function postRoute_Siteman($routes_ns):JointSiteRoute
    {
        if (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'sitemap'){
            return self::postRoute_SitemanSiteMap($routes_ns);
        }
    }
}