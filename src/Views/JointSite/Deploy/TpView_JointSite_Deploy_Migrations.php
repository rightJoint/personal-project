<?php


namespace Src\Views\JointSite\Deploy;



use JointApp\Views\TpView;


class TpView_JointSite_Deploy_Migrations extends TpView
{
    public function renderView():string
    {
        return
            '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            '</section>'.
            '</article>';
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
        $class_Name = 'Src\LangFiles\Views\JointSite\Deploy\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JS_D_M_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}