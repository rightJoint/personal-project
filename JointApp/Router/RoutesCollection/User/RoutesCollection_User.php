<?php

namespace JointApp\Router\RoutesCollection\User;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_User
{
    use RoutesCollection_User_SignUp;
    use RoutesCollection_User_SignIn;

    static function getRoute_User($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'signup'){
            $route = self::getRoute_UserSignUp($routes_ns);
        }elseif(isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'signin'){
            $route = self::getRoute_UserSignIn($routes_ns);
        }
        return $route;
    }

    static function postRoute_User($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();

        if(isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'signup'){
           $route = self::postRoute_UserSignUp($routes_ns);
        }elseif(isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'signin'){
           $route = self::postRoute_UserSignIn($routes_ns);
        }

        return $route;
    }
}