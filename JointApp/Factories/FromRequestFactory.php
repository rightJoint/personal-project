<?php


namespace JointApp\Factories;

use JointApp\JointAppRequest;

class FromRequestFactory
{
    public static function ObjectFromRequest($object, JointAppRequest $request)
    {
        foreach ($object as $prop => $value){
            if(isset($request->$prop)){
                $object->$prop = $request->$prop;
            }
        }

        return $object;
    }

}