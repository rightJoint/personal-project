<?php


namespace JointApp\Factories;


use JointApp\JointAppRequest;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;

class ControllerFactory extends FromRequestFactory
{
    public static function ControllerFromRequest($namespace, JointAppRequest $request, JointSiteUser $user, JointSiteLogger $logger)
    {
        $object = new $namespace($user, $logger);

        return self::ObjectFromRequest($object, $request);
    }
}