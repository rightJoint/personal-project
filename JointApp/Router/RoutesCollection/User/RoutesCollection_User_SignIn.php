<?php
namespace JointApp\Router\RoutesCollection\User;


use JointApp\Router\JointSiteRoute;

trait RoutesCollection_User_SignIn
{
    static function getRoute_UserSignIn($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\User\Controller_User_SignIn')
            ->withModel('JointApp\Models\Model')
            ->withView('JointApp\Views\User\SiteView_User_SignIn')
            ->withAction('actionIndex');
        return $route;
    }

    static function postRoute_UserSignIn($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\User\Controller_User_SignIn')
            ->withModel('JointApp\Models\Model')
            ->withView('JointApp\Views\User\SiteView_User_SignIn')
            ->withAction('actionSignIn')
            ->withAction('actionIndex');
        return $route;
    }
}