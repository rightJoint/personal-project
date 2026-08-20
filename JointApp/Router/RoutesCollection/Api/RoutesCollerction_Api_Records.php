<?php
namespace JointApp\Router\RoutesCollection\Api;

use JointApp\Router\JointSiteRoute;

trait RoutesCollerction_Api_Records
{
    static function getRoute_ApiRecords($routes_ns):JointSiteRoute
    {

        $route = new JointSiteRoute();
        if(isset($routes_ns['3']) and !empty($routes_ns['3'])){
            $route->withController('JointApp\Controllers\Records\RecordsControllerApi', ['processUri' => '/api/records/'.$routes_ns['3']])
                ->withModel('JointApp\models\RecordsModel', ['tableName' => $routes_ns['3']])
                ->withView('JointApp\Views\View')
                ->responseFormat('json');
            if(!isset($routes_ns['4']) or $routes_ns['4'] == 'list'){
                $route->withAction('getListRecordsApi');
            }elseif($routes_ns['4'] == 'count'){
                $route->withAction('getListCountApi');
            }elseif($routes_ns['4'] == 'detail'){
                $route->withAction('actionDetailApi');
            }
        }
        return $route;
    }

    static function posRoute_ApiRecords($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        if(isset($routes_ns['3']) and !empty($routes_ns['3'])){
            $route->withController('JointApp\Controllers\Records\RecordsControllerApi', ['processUri' => '/api/records/'.$routes_ns['3']])
                ->withModel('JointApp\models\RecordsModel', ['tableName' => $routes_ns['3']])
                ->withView('JointApp\Views\View')
                ->responseFormat('json');
            if(isset($routes_ns['4']) and $routes_ns['4'] == 'delete'){
                $route->withAction('actionDeleteApi');
            }elseif(isset($routes_ns['4']) and $routes_ns['4'] == 'edit'){
                $route->withAction('actionEditApi');
            }elseif(isset($routes_ns['4']) and $routes_ns['4'] == 'new'){
                $route->withAction('actionNewApi');
            }
        }
        return $route;
    }
}