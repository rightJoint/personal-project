<?php


namespace JointApp\Interfaces;


interface TemplateViewInterface
{
    public static function loadViewLang(string $lang = 'ru'):LangFileInterface;

    public static function renderView(\stdClass $viewLang, \stdClass $viewData, string $langSl = ''):string;

    public static function getJS():array;

    public static function getCss():array;

    public static function printJs():string;

    public static function printCss():string;

}