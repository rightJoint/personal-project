<?php

namespace JointApp\Views;


use JointApp\Views\SiteView\SiteView;

class ErrorsView extends SiteView
{
    public string $logo = '/img/popimg/error.png';

    public int $response_status_code = 200;
    public $app_custom_log = [];

    public bool $robotNoIndex = true;


    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_Errors_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_Errors_Header';
        return new $class_Name();
    }

    protected function putCustomTemplates():void
    {
        $this->tpSet->Errors = new TpView_Errors();
    }

    protected function handleTpErrors(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->Errors->renderView().
            '</div></div></div>';
    }
}