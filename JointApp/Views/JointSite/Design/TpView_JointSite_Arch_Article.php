<?php


namespace JointApp\Views\JointSite\Design;



use JointApp\Views\TpView;


class TpView_JointSite_Arch_Article extends TpView
{
    public string $langSl = '';

    public function getResponseHtml():string
    {
        return $this->langFile::H3;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JointSite_A_Article';
        return new $class_Name();
    }
}