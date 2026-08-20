<?php


namespace JointApp\Views\Test\Migrations;


use JointApp\Views\Records\RecordDetailView;
use JointApp\Views\Test\TpView_Test_Menu;

class SiteView_Test_Migrations_Log_DetailView extends RecordDetailView
{
    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->Detail = new TpView_Detail_Migrations();
    }

    protected function handleTpTestMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TestMenu->getResponseHtml().
            '</div></div></div>';
    }
}