<?php

namespace JointApp\Views;



use JointApp\Interfaces\TemplateViewInterface;


class TpView implements TemplateViewInterface
{
    protected $langFile;

    public static function loadViewLang(string $lang = 'ru')
    {
        return new \stdClass();
    }

    public function renderView():string
    {
        return '';
    }

    public static function getJS():array
    {
        return [];
    }

    public static function getCss():array
    {
        return [];
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

    public function getLangFile()
    {
        return $this->langFile;
    }

    public function setLangFile($langFile)
    {
        $this->langFile = $langFile;
    }
}