<?php


namespace Src\Views\JointSite\User;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_User_About extends SiteView_JointSite
{

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\User\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_U_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\User\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_U_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->User = new TpView_JointSite_User_About_Art();
    }

    protected function handleTpUser(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">111'.$this->tpSet->User->getResponseHtml().
            '</div></div></div>';
    }
}