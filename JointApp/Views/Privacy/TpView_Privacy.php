<?php

namespace JointApp\Views\Privacy;


use JointApp\Views\TpView;

class TpView_Privacy extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
    ];

    public function getResponseHtml():string
    {
        return '<article class="pageContentJointSite">'.
            '<h2>'.$this->langFile::H2.'</h2>'.
            '<section>'.
            '<p>'.$this->langFile::S1_P1.'</p>'.
            '<p>'.$this->langFile::S1_P2.'</p>'.
            '<p>'.$this->langFile::S1_P3.'</p>'.
            '</section>'.
            '<section>'.
            $this->langFile::S2_H3.
            '<p>'.
            '<ul>'.
            '<li>'.$this->langFile::S2_P1_LI1.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI2.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI3.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI4.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI5.'</li>'.
            '</ul>'.
            '</p>'.
            '</section>'.
            '<section>'.
            '<p>'.$this->langFile::S3_P3.
            '<ul>'.
            '<li>'.$this->langFile::S3_P3_LI1.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI2.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI3.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI4.'</li>'.
            '</ul>'.
            '</p>'.
            '<p>'.
            $this->langFile::S3_P4.
            '</p>'.
            '</section>'.
            '<section>'.
            '<h3>'.$this->langFile::S4_H3.'</h3>'.
            '<p>'.$this->langFile::S4_P1.'</p>'.
            '</section>'.
            '<section>'.
            '<p>'.$this->langFile::S5_P1.'</p>'.
            '<p>'.$this->langFile::S5_P2.'</p>'.
            '<p>'.$this->langFile::S5_P3.'</p>'.
            '<p>'.$this->langFile::S5_P4.'</p>'.
            '</section>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Privacy\LangFiles_'.self::ucfirstLang($this->userLang).'_'. 'Views_Privacy_Article';
        return new $class_Name();
    }
}