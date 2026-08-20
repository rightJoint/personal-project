<?php


namespace JointApp\Views\Test\Migrations;


use JointApp\Views\Records\RecordDetailView;
use JointApp\Views\Test\TpView_Test_Menu;

class SiteView_Test_Migrations_DetailView extends RecordDetailView
{
    public bool $connect_server_status = true;
    public bool $connect_db_status = true;
    public bool $migr_table_exist = true;
    public bool $migr_log_exist = true;
    public int $new_migr_count = 4;
    public string $migration_log = '';
    public string $exec_one_log = '';


    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->MP = new TpView_Test_MigrationsPanel();
        $this->tpSet->Detail = new TpView_Detail_Migrations();
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