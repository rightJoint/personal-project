<?php


namespace JointApp\Views\JointSite\Deploy;



use JointApp\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_Deploy_Migrations extends SiteView_JointSite
{

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Deploy\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_D_M_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Deploy\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_D_M_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Migrations = new TpView_JointSite_Deploy_Migrations();
    }

    protected function handleTpMigrations(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->Migrations->getResponseHtml().
            '</div></div></div>';
    }
}