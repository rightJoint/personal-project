<?php


namespace JointApp\Interfaces;



interface LangInterface
{
    //must return langFile by default, any class
    public function getDefaultLang();

    //set up custom lang file
    public function setUpCustomLang($langFile):void;
}