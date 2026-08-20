<?php


namespace JointApp\Views\JointSite\Design\View;



use JointApp\Views\TpView;

class TpView_JointSite_D_V_SiteView extends TpView
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
            '<p>'.$this->langFile::P1.'</p>'.
            '<p>'.$this->langFile::P2.'</p>'.
            '<p>'.$this->langFile::P3.'</p>'.
            '</section>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\View\LangFiles_'.self::ucfirstLang($this->userLang).'_V_JS_D_V_SV_Article';
        return new $class_Name();
    }
}