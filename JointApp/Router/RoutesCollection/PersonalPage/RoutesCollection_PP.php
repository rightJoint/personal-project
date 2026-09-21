<?php


namespace JointApp\Router\RoutesCollection\PersonalPage;


use JointApp\Router\JointSiteRoute;

trait RoutesCollection_PP
{
    static function getRoute_Pp($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withModel('JointApp\Models\PersonalPage\Model_PP_UserInfo')
            ->withController('JointApp\Controllers\PersonalPage\Controller_PP');

        if(!isset($routes_ns[2]) or empty($routes_ns[2])){
            $route->withView('JointApp\Views\PersonalPage\SiteView_PP_Home')
            ->withAction('actionIndex');
        }elseif($routes_ns[2] == 'edit'){
            $route->withView('JointApp\Views\PersonalPage\SiteView_PP_Edit')
                ->withAction('getUserInfo');
        }elseif($routes_ns[2] == 'changepassword'){
            $route->withView('JointApp\Views\PersonalPage\SiteView_PP_Pass');
        }

        return $route;
    }

    static function postRoute_Pp($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withModel('JointApp\Models\PersonalPage\Model_PP_UserInfo')
            ->withController('JointApp\Controllers\PersonalPage\Controller_PP');

        if(isset($routes_ns[2]) and ($routes_ns[2] == 'edit')){
            $route->withView('JointApp\Views\PersonalPage\SiteView_PP_Edit')
            ->withAction('editUserInfo')
            ->withAction('updateParamsFromModel');
        }elseif(isset($routes_ns[2]) and ($routes_ns[2] == 'changepassword')){
            $route->withView('JointApp\Views\PersonalPage\SiteView_PP_Pass')
                ->withAction('changeUserPassword');
        }


        return $route;
    }
}