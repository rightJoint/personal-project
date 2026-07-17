<?php

namespace JointApp\Views;



use JointApp\Interfaces\LangFileInterface;
use JointApp\Interfaces\TemplateViewInterface;


class TpView implements TemplateViewInterface
{

    public static function loadViewLang(string $lang = 'ru'):LangFileInterface
    {
        $class_Name = 'JointApp\LangFiles\LangFiles_'.self::ucfirstLang($lang).'_'.'BaseLangFileTp';
        $langFile = new $class_Name();
        return $langFile;
    }

    public static function renderView(\stdClass $viewLang, \stdClass $viewData, string $langSl = ''):string
    {
        return $viewLang->testPhrase;
    }

    public static function getJS():array
    {
        return [];
    }

    public static function getCss():array
    {
        return [];
    }

    public static function printJs():string
    {
        $return = '';
        foreach (static::getJS() as $script_id=>$src){
            $return.= '<script src="'.$src.'"></script>';
        }

        return $return;
    }

    public static function printCss():string
    {
        $return = '';
        foreach (static::getCss() as $style_id=>$href){
            $return.= '<link rel="stylesheet" href="'.$href.'" type="text/css" media="screen, projection"/>';
        }

        return $return;
    }

    protected static function ucfirstLang(string $lang = ''):string
    {
        if(!empty($lang)){
            return  ucfirst(strtolower($lang));
        }
        //default lang "ru"
        else{
            return  'Ru';
        }
    }
}