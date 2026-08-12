<?php


namespace Src\Views\JointSite\Deploy;



use JointApp\Views\TpView;


class TpView_JointSite_Deploy_Art extends TpView
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
        $class_Name = 'Src\LangFiles\Views\JointSite\Deploy\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JS_D_Article';
        return new $class_Name();
    }
}