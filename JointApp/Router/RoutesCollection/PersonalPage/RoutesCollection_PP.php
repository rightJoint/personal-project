<?php


namespace JointApp\Router\RoutesCollection\PersonalPage;


use JointApp\Router\JointSiteRoute;

trait RoutesCollection_PP
{
    static function getRoute_Pp($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withModel('JointApp\Models\Model')
            ->withController('JointApp\Controllers\PersonalPage\Controller_PP')
            ->withView('JointApp\Views\PersonalPage\SiteView_PP_Home');

        return $route;
    }
}