<?php


namespace JointApp\Views\JointSite\Design;



use JointApp\Views\TpView;


class TpView_JointSite_A_Dir_Article extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        return '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.'</section>'.
            '<h3>JointApp</h3>'.
            '<h3>JointFramework</h3>'.
            '<h3>src</h3>'.
            '<h3>tests</h3>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JointSite_A_Dir_Article';
        return new $class_Name();
    }
}