<?php


namespace JointApp\Router\RoutesCollection;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Main
{
    static function getRoute_Main($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();

        $route
            ->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex')
            ->withView('JointApp\Views\JointSite\SiteView_JointSite');

        return $route;

    }

    static function getRoute_Privacy($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();

        $route
            ->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex')
            ->withView('JointApp\Views\Privacy\SiteView_Privacy');

        return $route;

    }
}