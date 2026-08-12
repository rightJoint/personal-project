<?php


namespace Src\Views\JointSite\Lang;



use JointApp\Views\TpView;


class TpView_JointSite_Lang_About_Art extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        return $this->langFile::H3;
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Lang\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JS_L_A_Article';
        return new $class_Name();
    }
}