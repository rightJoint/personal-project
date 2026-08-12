<?php

namespace JointApp\Views;



use JointApp\Interfaces\SiteViewInterface;


class TpView extends View
{
    public string $userLang = 'ru';
    public string $langSl = 'ru';

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
}