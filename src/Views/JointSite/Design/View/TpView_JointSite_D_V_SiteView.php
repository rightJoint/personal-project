<?php


namespace Src\Views\JointSite\Design\View;



use JointApp\Views\TpView;

class TpView_JointSite_D_V_SiteView extends TpView
{
    public function renderView():string
    {
        return
            '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            '<p>'.$this->langFile::P1.'</p>'.
            '<p>'.$this->langFile::P2.'</p>'.
            '<p>'.$this->langFile::P3.'</p>'.
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
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\View\LangFiles_'.self::ucfirstLang($lang).'_V_JS_D_V_SV_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}