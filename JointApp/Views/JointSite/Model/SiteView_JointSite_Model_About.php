<?php


namespace JointApp\Views\JointSite\Model;



use JointApp\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_Model_About extends SiteView_JointSite
{

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Model\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_M_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Model\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_M_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Model = new TpView_JointSite_Model_About_Art();
    }

    protected function handleTpModel(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">111'.$this->tpSet->Model->getResponseHtml().
            '</div></div></div>';
    }
}