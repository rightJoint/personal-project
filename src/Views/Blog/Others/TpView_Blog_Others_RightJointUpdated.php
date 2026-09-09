<?php


namespace Src\Views\Blog\Others;


use JointApp\Views\TpView;

class TpView_Blog_Others_RightJointUpdated extends TpView
{
    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\Others\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_RightJointUpdated';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        return '<section>'.
            '<p>'.$this->langFile::S1_P1.':'.
            '<ul>'.
            '<li>'.$this->langFile::S1_P1_LI1.'</li>'.
            '<li>'.$this->langFile::S1_P1_LI2.'</li>'.
            '<li>'.$this->langFile::S1_P1_LI3.'</li>'.
            '<li>'.$this->langFile::S1_P1_LI4.'</li>'.
            '</ul>'.
            '</p>'.
            '<p>'.$this->langFile::S1_P2.'</p>'.
            '</section>'.
            '<section>'.
            '<p>'.$this->langFile::S2_P1.
            '<ul>'.
            '<li>'.$this->langFile::S2_P1_LI1.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI2.'</li>'.
            '</ul>'.
            '</p>'.
            '</section>'.
            '<section>'.
            '<div class="note warning">'.$this->langFile::RJ_WARNING.'</div>'.
            '</section>'.
            '<section>'.
            '<p>'.
            $this->langFile::PR_TEXT_BEFORE.' '.
            '<a href="'.$this->langSl.'/privacy" title="'.$this->langFile::PR_REF_TITLE.'">'.$this->langFile::PR_REF_TEXT.'</a>'.
            '</p>'.
            '</section>';
    }
}