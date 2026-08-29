<?php

namespace JointApp\Controllers\PersonalPage;


use JointApp\Controllers\ControllerWeb;

class Controller_PP extends ControllerWeb
{
    protected function checkAccessController():bool
    {
        return $this->user->isAuth();
    }
}