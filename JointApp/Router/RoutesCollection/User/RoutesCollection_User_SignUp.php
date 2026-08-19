<?php
namespace JointApp\Router\RoutesCollection\User;


use JointApp\Router\JointSiteRoute;

trait RoutesCollection_User_SignUp
{
    static function getRoute_UserSignUp($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\User\Controller_User_SignUp')
            ->withModel('JointApp\Models\Model')
            ->withView('JointApp\Views\User\SiteView_User_SignUp')
            ->withAction('actionIndex');
        return $route;
    }

    static function postRoute_UserSignUp($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\User\Controller_User_SignUp')
            ->withModel('JointApp\Models\Model')
            ->withView('JointApp\Views\User\SiteView_User_SignUp')
            ->withAction('actionSignUp')
            ->withAction('actionIndex');
        return $route;
    }
}