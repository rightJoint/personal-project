<?php

namespace JointApp\Views\Records;



use JointApp\Views\SiteView\SiteView;

class RecordDetailView extends SiteView
{
    public string $logo = '/img/popimg/eye-icon.png';

    public string $h2 = '';
    public string $processUri = '';
    public string $langSl = '';

    public $action_log = [];
    public $viewFields = [];
    public $fieldAliases = [];

    public bool $robotNoIndex = true;

    public string $pri_query = '?';
    public string $type_of_view = 'detail';
    public $editFields = [];

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
        if($this->type_of_view == 'edit'){
            $class_Name = 'JointApp\LangFiles\Views\Records\Detail\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_D_Head';
        }else{
            $class_Name = 'JointApp\LangFiles\Views\Records\Detail\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_Del_Head';
        }

        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        if($this->type_of_view == 'edit'){
            $class_Name = 'JointApp\LangFiles\Views\Records\Detail\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_D_Header';
        }else{
            $class_Name = 'JointApp\LangFiles\Views\Records\Detail\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_Del_Header';
        }

        return new $class_Name();
    }
}