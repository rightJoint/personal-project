<?php


namespace JointApp\Factories;


use JointApp\JointAppRequest;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;

class ModelFactory extends FromRequestFactory
{
    public static function ModelFromRequest($namespace, JointAppRequest $request, JointSiteUser $user,
                                            JointSiteLogger $logger, $model_params = [])
    {
        $object = new $namespace($user, $logger, $model_params);
        $object->files = $request->getUploadedFiles();

        return self::ObjectFromRequest($object, $request);
    }
}