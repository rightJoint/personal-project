<?php


namespace JointApp\Factories;


use JointApp\JointAppRequest;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;

class ControllerFactory extends FromRequestFactory
{
    public static function ControllerFromRequest($namespace, JointAppRequest $request, JointSiteUser $user,
                                                 JointSiteLogger $logger, $controller_params = [])
    {
        $object = new $namespace($user, $logger, $controller_params);

        if($request->getMethod() == 'POST'){
            $object->requestParams = $request->getParsedBody();
        }else{
            $object->requestParams = $request->getQueryParams();
        }

        foreach ($object as $prop => $value){
            if(isset($object->requestParams[$prop])){
                $object->$prop = $object->requestParams[$prop];
            }
        }

        return self::ObjectFromRequest($object, $request);
    }
}