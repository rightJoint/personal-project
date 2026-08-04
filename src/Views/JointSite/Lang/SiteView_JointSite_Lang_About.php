<?php


namespace Src\Views\JointSite\Lang;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_Lang_About extends SiteView_JointSite
{

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Lang\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_L_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Lang\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_L_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Lang = new TpView_JointSite_Lang_About_Art();
    }

    protected function handleTpLang(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">111'.$this->tpSet->Lang->renderView().
            '</div></div></div>';
    }
}