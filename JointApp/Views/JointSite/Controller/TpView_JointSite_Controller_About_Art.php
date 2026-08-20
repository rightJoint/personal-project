<?php


namespace JointApp\Views\JointSite\Controller;



use JointApp\Views\TpView;


class TpView_JointSite_Controller_About_Art extends TpView
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
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Controller\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JS_C_A_Article';
        return new $class_Name();
    }
}