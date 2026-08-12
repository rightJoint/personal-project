<?php


namespace Src\Views\JointSite\User;



use JointApp\Views\TpView;


class TpView_JointSite_User_About_Art extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        return $this->langFile::H3;
    }

    public function getDefaultLang(string $lang = 'ru')
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\User\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JS_U_A_Article';
        return new $class_Name();
    }
}