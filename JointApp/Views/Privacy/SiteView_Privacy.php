<?php

namespace JointApp\Views\Privacy;


use JointApp\Views\SiteView\SiteView;

class SiteView_Privacy extends SiteView
{
    protected function putCustomTemplates():void
    {
        $this->tpSet->Privacy = new TpView_Privacy();
    }

    protected function handleTpPrivacy(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            $this->tpSet->Privacy->getResponseHtml().
            '</div></div></div>';
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Privacy\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_Privacy_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Privacy\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_Privacy_Header';
        return new $class_Name();
    }
}