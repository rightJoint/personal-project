<?php

namespace JointApp\Views\Records;



use JointApp\Views\SiteView\SiteView;

class RecordDetailView extends SiteView
{
    public string $logo = '/img/popimg/eye-icon.png';

    public string $h2 = '';
    public string $processUri = '';
    public string $langSl = '';

    public string $type = 'detail';
    public $action_log = [];
    public $viewFields = [];
    public $fieldAliases = [];

    public bool $robotNoIndex = true;

    protected function putCustomTemplates():void
    {
        $this->tpSet->Detail = new TpView_Detail();
    }

    protected function handleTpDetail(): string
    {
        $return = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            $this->tpSet->Detail->renderView().
            '</div></div></div>';
        return $return;
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\Detail\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_D_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\Detail\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_D_Header';
        return new $class_Name();
    }
}