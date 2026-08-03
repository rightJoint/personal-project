<?php


namespace Src\Views\JointSite\Controller;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_Controller_About extends SiteView_JointSite
{

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Controller\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_C_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Controller\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_C_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Controller = new TpView_JointSite_Controller_About_Art();
    }

    protected function handleTpController(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">111'.$this->tpSet->Controller->renderView().
            '</div></div></div>';
    }
}