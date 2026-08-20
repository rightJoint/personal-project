<?php


namespace JointApp\Views\JointSite;



use JointApp\Views\TpView;


class TpView_JointSite_About extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];


    public function getResponseHtml():string
    {
        return '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            'The JointSite is a web-application designed as personal site for developers" entertaining purpose. '.
            'Branch main is use to staring the Blog. '.
            '<p><strong>'.
            'The code for this application was written by a non-professional programmer, so you assume all risks associated with using this repository.'.
            '</strong></p>'.
            '<p>Backend php-8.1, frontend: jquery, database mysql</p>'.
            '<p>Details on ...</p>'.
            '</section>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JointSite_About';
        $langFile = new $class_Name();
        return $langFile;
    }
}