<?php


namespace JointApp\Views\JointSite\Design;



use JointApp\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_A_Mvc extends SiteView_JointSite
{
    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Mvc_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Mvc_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Mvc = new TpView_JointSite_A_Mvc_Article();
    }

    protected function handleTpMvc(): string
    {

        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">444'.$this->tpSet->Mvc->getResponseHtml().
            '</div></div></div>';
    }
}