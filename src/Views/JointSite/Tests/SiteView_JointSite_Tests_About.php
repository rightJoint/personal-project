<?php


namespace Src\Views\JointSite\Tests;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_Tests_About extends SiteView_JointSite
{

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Tests\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_T_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Tests\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_T_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Tests = new TpView_JointSite_Tests_About_Art();
    }

    protected function handleTpTests(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">111'.$this->tpSet->Tests->getResponseHtml().
            '</div></div></div>';
    }
}