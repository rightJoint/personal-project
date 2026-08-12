<?php


namespace Src\Views\JointSite\Design;



use JointApp\Views\TpView;


class TpView_JointSite_A_App_Article extends TpView
{
    public string $langSl = '';

    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        return '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.'</section>'.
            '<h3>JointAppRequest</h3>'.
            '<h4>Request adapter</h4>'.
            '<h3>Router</h3>'.
            '<h4>Route Finder</h4>'.
            '<h3>JointSiteLogger</h3>'.
            '<h3>JointAppResponse</h3>'.
            '<h3></h3>'.
            '<h3>Request handler</h3>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JointSite_A_App_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}