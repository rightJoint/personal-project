<?php

namespace JointApp\Views\Test\Records;


use JointApp\Views\Test\SiteView_Test_Home;
use JointApp\Views\Test\TpView_Test_Home;
use JointApp\Views\Test\TpView_Test_Menu;

class SiteView_Test_Records_TblSelector extends SiteView_Test_Home
{
    public string $langSl = '';
    public array $tblList = [];
    public string $selectedTbl = '';


    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->TS = new TpView_Test_Records_TblSelector();
    }

    protected function handleTpTS(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TS->getResponseHtml().
            '</div></div></div>';
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Records\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_R_TS_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\records\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_R_TS_Header';
        return new $class_Name();
    }
}