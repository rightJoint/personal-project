<?php

namespace JointApp\Views;



use JointApp\Interfaces\LangFileInterface;
use JointApp\Interfaces\TemplateViewInterface;


class TpView implements TemplateViewInterface
{
    const BASE_LANGFILES_DIR = 'C:/OSPanel/domains/personal-project.web/JointApp/LangFiles';
    const APPND_DIR = '';
    const LANG_FILE_NAME = 'BaseLangFileTp';

    public static function loadViewLang(string $lang = 'ru'):LangFileInterface
    {
        if(!empty($lang)){
            $viewLang =  ucfirst(strtolower($lang));
        }
        //default lang "ru"
        else{
            $viewLang =  'Ru';
        }

        require_once static::BASE_LANGFILES_DIR.static::APPND_DIR.'/LangFiles_'.$viewLang.'_'.static::LANG_FILE_NAME.'.php';

        $class_Name = 'LangFiles_'.$viewLang.'_'.static::LANG_FILE_NAME;

        $langFile = new $class_Name();

        return $langFile;
    }

    public static function renderView(\stdClass $viewLang, \stdClass $viewData):string
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
}