<?php


namespace JointApp\Views\JointSite\Deploy;



use JointApp\Views\TpView;


class TpView_JointSite_Deploy_Migrations extends TpView
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
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Deploy\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JS_D_M_Article';
        return new $class_Name();
    }
}