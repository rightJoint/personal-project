<?php


namespace JointApp\Router\RoutesCollection\UserInfo;


use JointApp\Router\JointSiteRoute;

trait RoutesCollection_UserInfo
{
    static function getRoute_Userinfo($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(isset($routes_ns[2]) and !empty($routes_ns[2])){
            $route->withModel('JointApp\Models\PersonalPage\Model_PP_userInfo')
                ->withController('JointApp\Controllers\UserInfo\Controller_UserInfo', ['user_id' => $routes_ns[2]])
                ->withView('JointApp\Views\UserInfo\SiteView_UserInfo')
                ->withAction('actionIndex');
        }
        return $route;
    }
}