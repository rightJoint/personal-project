<?php


namespace JointApp\Router;



use Psr\Log\LoggerAwareTrait;
use Src\RoutesCollection\Api\RoutesCollection_Api;
use Src\RoutesCollection\RoutesCollection_JointSite;
use Src\RoutesCollection\RoutesCollection_Main;
use Src\RoutesCollection\Test\RoutesCollection_Test;


class JointSiteRouteFinder
{
    use LoggerAwareTrait;

    use RoutesCollection_Main;
    use RoutesCollection_JointSite;
    use RoutesCollection_Test;
    use RoutesCollection_Api;

    private $context = ['RouteFinder' => __CLASS__];

    public string $method;
    public $routes_ns = [];



    function findRoute():JointSiteRoute
    {
        $routeName = 'Main';

        if(!empty($this->routes_ns[1])){
            $tmp_name_arr = explode('-', $this->routes_ns[1]);
            $routeName = null;
            foreach ($tmp_name_arr as $num=>$key){
                $routeName .= ucfirst($key);
            }
        }

        $getRoute = strtolower($this->method).'Route_'.$routeName;

        $returnRoute = new JointSiteRoute();

        if(method_exists('JointApp\Router\JointSiteRouteFinder', $getRoute)){
            if($returnRoute = call_user_func('JointApp\Router\JointSiteRouteFinder::'.$getRoute, $this->routes_ns)){
                if(!empty($returnRoute->controllerName) and class_exists($returnRoute->controllerName)){
                    if(!empty($returnRoute->modelName) and class_exists($returnRoute->modelName)){
                        if(!empty($returnRoute->viewName) and class_exists($returnRoute->viewName)){
                            foreach ($returnRoute->actionsList as $aName=>$aData){
                                if(!method_exists($returnRoute->controllerName, $aName)){
                                    $this->logger->error('RouteFinder::'.$getRoute.' action \''.$aName.'\' not found', $this->context);
                                }
                            }
                        }else{
                            $this->logger->error('RouteFinder::'.$getRoute.' view '.$returnRoute->viewName.' not found', $this->context);
                        }
                    }else{
                        $this->logger->error('RouteFinder::'.$getRoute.' model not found', $this->context);
                    }
                }else{
                    $this->logger->error('RouteFinder::'.$getRoute.' controller "'.$returnRoute->controllerName.'" not found', $this->context);
                }
            }else{
                $this->logger->error('RouteFinder::'.$getRoute.' route not found', $this->context);
            }
        }else{
            $this->logger->error('RouteFinder::'.$getRoute.' method not exist', $this->context);
        }

        //call to update view params automatically
        if($returnRoute->responseFormat == 'text'){
            $returnRoute->withAction('updateViewParams');
        }else{
            $returnRoute->withAction('updateResponseJson');
        }

        return $returnRoute;
    }
}