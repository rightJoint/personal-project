<?php


namespace Src\Views\JointSite\Design;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_Arch extends SiteView_JointSite
{
    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->SiteView = new TpView_JointSite_Arch_Article();
    }

    protected function handleTpSiteView(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">22222'.$this->tpSet->SiteView->renderView().
            '</div></div></div>';
    }
}