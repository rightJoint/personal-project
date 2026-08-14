<?php

namespace Src\Views\Test\Migrations;


use JointApp\Views\Records\RecordListView;
use Src\Views\Test\TpView_Test_Menu;


class SiteView_Test_Migrations_List extends RecordListView
{
    public bool $connect_server_status = true;
    public bool $connect_db_status = true;
    public bool $migr_table_exist = true;
    public bool $migr_log_exist = true;
    public int $new_migr_count = 4;
    public string $migration_log = '';

    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->MP = new TpView_Test_MigrationsPanel();
        parent::putCustomTemplates();
    }

    protected function handleTpTestMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TestMenu->getResponseHtml().
            '</div></div></div>';
    }

    protected function handleTpMP(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->MP->getResponseHtml().
            '</div></div></div>';
    }
}