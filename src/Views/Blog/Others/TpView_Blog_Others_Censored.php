<?php


namespace Src\Views\Blog\Others;


use JointApp\Views\TpView;

class TpView_Blog_Others_Censored extends TpView
{
    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\Others\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_Censored';
        return new $class_Name();
    }
}