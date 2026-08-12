<?php


namespace Src\Views\JointSite\Design\View;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_D_V_About extends SiteView_JointSite
{
    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\View\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'V_JS_D_V_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\View\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'V_JS_D_V_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->About = new TpView_JointSite_D_V_About_Article();
    }

    protected function handleTpAbout(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->About->getResponseHtml().
            '</div></div></div>';
    }
}