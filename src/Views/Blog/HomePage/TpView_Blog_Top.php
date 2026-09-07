<?php


namespace Src\Views\Blog\HomePage;


use JointApp\Views\TpView;

class TpView_Blog_Top extends TpView
{
    public $css=['blog-home-top' => '/css/blog/blog-home-top.css'];

    public function getResponseHtml(): string
    {
        return '<div class="blog-home-top"><h2 class="">'.$this->langFile::H2.'</h2></div>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\HomePage\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_Blog_Hp_Top';
        return new $class_Name();
    }
}