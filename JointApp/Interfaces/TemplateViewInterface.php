<?php


namespace JointApp\Interfaces;


interface TemplateViewInterface
{
    //must return langFile by default, any class
    public static function loadViewLang(string $userLang = 'ru');

    //return html code
    public function renderView():string;

    public static function getJS():array;

    public static function getCss():array;

    public function setLangFile($langFile);
}