<?php


namespace JointApp\Views\Test\Records;


use JointApp\Views\Records\RecordListView;
use JointApp\Views\Test\TpView_Test_Menu;

class SiteView_Test_Records_ListView extends RecordListView
{
    public array $tblList = [];
    public string $selectedTbl = '';

    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->TS = new TpView_Test_Records_TblSelector();
        parent::putCustomTemplates();
    }

    protected function handleTpTestMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TestMenu->getResponseHtml().
            '</div></div></div>';
    }

    protected function handleTpTS(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TS->getResponseHtml().
            '</div></div></div>';
    }

}