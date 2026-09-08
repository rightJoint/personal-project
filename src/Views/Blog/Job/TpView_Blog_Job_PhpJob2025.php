<?php


namespace Src\Views\Blog\Job;


use JointApp\Views\TpView;


class TpView_Blog_Job_PhpJob2025 extends TpView
{
    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\PhpJob\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_PhpJob2025';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        return 'art text';
    }
}