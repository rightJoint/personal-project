<?php

namespace JointApp\Views\Test\Migrations;


use JointApp\Views\Records\RecordListView;
use JointApp\Views\Test\TpView_Test_Menu;


class SiteView_Test_Migrations_Log extends RecordListView
{
    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        parent::putCustomTemplates();
    }

    protected function handleTpTestMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TestMenu->getResponseHtml().
            '</div></div></div>';
    }
}