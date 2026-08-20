<?php


namespace JointApp\Views\JointSite\Design;



use JointApp\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_A_Dir extends SiteView_JointSite
{
    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Dir_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Dir_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Dir = new TpView_JointSite_A_Dir_Article();
    }

    protected function handleTpDir(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->Dir->getResponseHtml().
            '</div></div></div>';
    }
}