<?php


namespace Src\Views\JointSite\Design\View;



use JointApp\Views\TpView;

class TpView_JointSite_D_V_About_Article extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        return
            '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            '</section>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\View\LangFiles_'.self::ucfirstLang($this->userLang).'_V_JS_D_V_About_Article';
        return new $class_Name();
    }
}