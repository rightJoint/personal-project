<?php


namespace Src\Views\JointSite\Design;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_A_Lc extends SiteView_JointSite
{
    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Lc_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Lc_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Lc = new TpView_JointSite_A_Lc_Article();
    }

    protected function handleTpLc(): string
    {

        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->Lc->getResponseHtml().
            '</div></div></div>';
    }
}