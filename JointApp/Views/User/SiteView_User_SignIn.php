<?php


namespace JointApp\Views\User;


use JointApp\Views\SiteView\SiteView;

class SiteView_User_SignIn extends SiteView
{
    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\User\SignIn\LangFiles_'.$this->ucfirstLang($this->userLang).'_V_U_SignIn_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\User\SignIn\LangFiles_'.$this->ucfirstLang($this->userLang).'_V_U_SignIn_Header';
        return new $class_Name();
    }
}