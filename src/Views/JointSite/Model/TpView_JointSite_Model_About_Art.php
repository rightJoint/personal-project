<?php


namespace Src\Views\JointSite\Model;



use JointApp\Views\TpView;


class TpView_JointSite_Model_About_Art extends TpView
{
    public function renderView():string
    {
        return $this->langFile::H3;
    }

    public static function getCss():array
    {
        return [
            'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
            'codesnippet' => '/css/code-snippet.css',
        ];
    }

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Model\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JS_M_A_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}