<?php


namespace Src\Views\JointSite;



use JointApp\Views\TpView;


class TpView_JointSite_About extends TpView
{
    public string $langSl = '';


    public function renderView():string
    {
        return $this->langFile::H3;
    }

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JointSite_About';
        $langFile = new $class_Name();
        return $langFile;
    }
}