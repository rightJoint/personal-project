<?php


namespace Src\RoutesCollection;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Main
{
    static function getRoute_Main($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();

        $route
            ->withController('JointApp\Controllers\Controller')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex')
            ->withView('Src\Views\JointSite\SiteView_JointSite');

        return $route;

    }
}