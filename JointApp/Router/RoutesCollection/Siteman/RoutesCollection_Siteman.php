<?php

namespace JointApp\Router\RoutesCollection\Siteman;


use JointApp\Router\JointSiteRoute;
use JointApp\Router\RoutesCollection\Siteman\Robots\RoutesCollection_Siteman_Robots;
use JointApp\Router\RoutesCollection\Siteman\SiteMap\RoutesCollection_Siteman_SiteMap;
use JointApp\Router\RoutesCollection\Siteman\Users\RoutesCollection_Siteman_Users;

trait RoutesCollection_Siteman
{
    use RoutesCollection_Siteman_SiteMap;
    use RoutesCollection_Siteman_Robots;
    use RoutesCollection_Siteman_Users;

    static function getRoute_Siteman($routes_ns):JointSiteRoute
    {
        //siteman
        if(!isset($routes_ns[2]) or empty($routes_ns[2])){
            $route = new JointSiteRoute();
            $route->withModel('JointApp\Models\Model')
                ->withController('JointApp\Controllers\ControllerWeb')
                ->withView('JointApp\Views\Siteman\SiteView_SiteMan_Main');

            return $route;
        }
        //siteman/sitemap
        elseif (strtolower($routes_ns[2]) == 'sitemap'){
            return self::getRoute_SitemanSiteMap($routes_ns);
        }//siteman/sitemap
        elseif (strtolower($routes_ns[2]) == 'robots'){
            return self::getRoute_SitemanRobots($routes_ns);
        }
        //siteman/users
        elseif (strtolower($routes_ns[2]) == 'users'){
            return self::getRoute_SitemanUsers($routes_ns);
        }
        //siteman/blog
        elseif (strtolower($routes_ns[2]) == 'blog'){
            return self::getRoute_SitemanBlog($routes_ns);
        }
    }

    static function postRoute_Siteman($routes_ns):JointSiteRoute
    {
        if (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'sitemap'){
            return self::postRoute_SitemanSiteMap($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'robots'){
            return self::postRoute_SitemanRobots($routes_ns);
        }
        //siteman/users
        elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'users'){
            return self::postRoute_SitemanUsers($routes_ns);
        }
        //siteman/blog
        elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'blog'){
            return self::postRoute_SitemanBlog($routes_ns);
        }
    }
}