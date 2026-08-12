<?php


namespace Src\Views\JointSite\Design;



use JointApp\Views\TpView;


class TpView_JointSite_A_Mvc_Article extends TpView
{
    public function getResponseHtml():string
    {
        return $this->langFile::H3;
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JointSite_A_Mvc_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}