<?php


namespace JointApp\Factories;


use JointApp\JointAppRequest;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;

class ModelFactory extends FromRequestFactory
{
    public static function ModelFromRequest($namespace, JointAppRequest $request, JointSiteUser $user, JointSiteLogger $logger)
    {
        $object = new $namespace($user, $logger);

        return self::ObjectFromRequest($object, $request);
    }
}