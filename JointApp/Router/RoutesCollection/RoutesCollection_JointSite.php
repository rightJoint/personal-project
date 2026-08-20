<?php


namespace JointApp\Router\RoutesCollection;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_JointSite
{
    static function getRoute_JointSite($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(empty($routes_ns[2])){
            $route
                ->withController('JointApp\Controllers\ControllerWeb')
                ->withModel('JointApp\Models\Model')
                ->withAction('actionIndex')
                ->withView('JointApp\Views\JointSite\SiteView_JointSite');

            return $route;

        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'deploy'){
            $route = self::getRoute_JointSite_Deploy($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'architecture'){
            $route = self::getRoute_JointSite_Arch($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'model'){
            $route = self::getRoute_JointSite_Model($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'view'){
            $route = self::getRoute_JointSite_View($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'controller'){
            $route = self::getRoute_JointSite_Controller($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'user'){
            $route = self::getRoute_JointSite_User($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'tests'){
            $route = self::getRoute_JointSite_Tests($routes_ns);
        }elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'lang'){
            $route = self::getRoute_JointSite_Lang($routes_ns);
        }

        return $route;
    }

    static function getRoute_JointSite_Deploy($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'openserver'){
            $route->withView('JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy_OpenServer');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'hosting'){
            $route->withView('JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy_Hosting');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'migrations'){
            $route->withView('JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy_Migrations');
        }

        return $route;
    }
    static function getRoute_JointSite_Arch($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\Design\SiteView_JointSite_Arch');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'life-circle'){
            $route->withView('JointApp\Views\JointSite\Design\SiteView_JointSite_A_LC');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'app'){
            $route->withView('JointApp\Views\JointSite\Design\SiteView_JointSite_A_App');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'mvc'){
            $route->withView('JointApp\Views\JointSite\Design\SiteView_JointSite_A_Mvc');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'directories'){
            $route->withView('JointApp\Views\JointSite\Design\SiteView_JointSite_A_Dir');
        }

        return $route;
    }

    static function getRoute_JointSite_Model($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\Model\SiteView_JointSite_Model_About');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'life-circle'){
            //$route->withView('Src\Views\JointSite\Design\SiteView_JointSite_A_LC');
        }

        return $route;
    }

    static function getRoute_JointSite_View($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_About');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'tpview'){
            $route->withView('JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_TpView');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'webview'){
            $route->withView('JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_WebView');
        }elseif (isset($routes_ns[3]) and strtolower($routes_ns[3]) == 'siteview'){
            $route->withView('JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_SiteView');
        }

        return $route;
    }

    static function getRoute_JointSite_Controller($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\Controller\SiteView_JointSite_Controller_About');
        }

        return $route;
    }

    static function getRoute_JointSite_User($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\User\SiteView_JointSite_User_About');
        }

        return $route;
    }

    static function getRoute_JointSite_Tests($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\Tests\SiteView_JointSite_Tests_About');
        }

        return $route;
    }

    static function getRoute_JointSite_Lang($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route->withController('JointApp\Controllers\ControllerWeb')
            ->withModel('JointApp\Models\Model')
            ->withAction('actionIndex');

        if(empty($routes_ns[3])){
            $route->withView('JointApp\Views\JointSite\Lang\SiteView_JointSite_Lang_About');
        }

        return $route;
    }
}