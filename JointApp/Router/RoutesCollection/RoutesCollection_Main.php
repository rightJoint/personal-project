<?php


namespace JointApp\Router\RoutesCollection;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Main
{
    static function getRoute_Main($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();

        $route
            ->withController('Src\Controllers\Blog\Controller_Blog')
            ->withModel('Src\Models\Blog\Model_Blog',)
            ->withAction('actionIndex')
            ->withView('Src\Views\Blog\HomePage\SiteView_Blog_HomePage');

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