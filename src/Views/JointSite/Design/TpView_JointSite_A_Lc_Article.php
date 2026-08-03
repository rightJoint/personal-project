<?php


namespace Src\Views\JointSite\Design;



use JointApp\Views\TpView;


class TpView_JointSite_A_Lc_Article extends TpView
{
    public string $langSl = '';

    public function renderView():string
    {
        return $this->langFile::H3;
    }

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JointSite_A_Lc_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}