<?php


namespace Src\Views\Test\Migrations;



use JointApp\Views\TpView;


class TpView_Test_MigrationsPanel extends TpView
{
    public string $processUri = '';

    public bool $connect_server_status = true;
    public bool $connect_db_status = true;
    public bool $migr_table_exist = true;
    public bool $migr_log_exist = true;
    public int $new_migr_count = 4;
    public string $migration_log = '';

    private string $connect_ss = 'Ok';
    private string $connect_ds = 'Ok';
    private string $migr_te = 'Ok';
    private string $migr_le = 'Ok';

    private bool $use_migrations = false;
    private bool $use_glog = false;
    private bool $use_exec = false;


    protected $css = [
        'migrations-panel' => '/css/test/migrations-panel.css',
    ];


    public function handleViewParams(): void
    {
        if($this->connect_server_status){
            if($this->connect_db_status){
                $this->use_migrations = true;
                $this->use_glog = true;
                if($this->migr_table_exist){
                    $this->migr_te = 'Ok';
                }else{
                    $this->migr_te = 'Fail';
                }
                if($this->migr_log_exist){
                    $this->migr_le = 'Ok';
                }else{
                    $this->migr_le = 'Fail';
                }
                if($this->migr_log_exist and $this->migr_table_exist){
                    $this->use_glog = true;
                    $this->use_exec = true;
                }else{
                    $this->use_glog = false;
                    $this->use_exec = false;
                }
                if($this->new_migr_count){
                    $this->use_exec = true;
                }else{
                    $this->use_exec = false;
                }

            }else{
                $this->connect_ds = 'Fail';
                $this->use_glog = false;
                $this->use_exec = false;
            }
        }else{
            $this->connect_ss = 'Fail';
            $this->connect_ds = 'Fail';
            $this->use_migrations = false;
            $this->use_glog = false;
            $this->use_exec = false;
        }
    }

    public function getResponseHtml():string
    {



        $return ="<div class='migrations-panel'>".
            '<div class="server-db">'.
            '<div class="server">Connect server status: <span class="status '.strtolower($this->connect_ss).'">'.$this->connect_ss.'</span></div>'.
            '<div class="db">Connect db status: <span class="status '.strtolower($this->connect_ds).'">'.$this->connect_ds.'</span></div>'.
            '</div>';
        $return.='<div class="tables">';
        if($this->use_migrations){
            $return.='<div class="tables-status">'.
                '<div class="migration-table">Migrations table: <span class="status '.strtolower($this->migr_te).'">'.$this->migr_te.'</span></div>'.
                '<div class="migration-table-log">MigrationsLog table: <span class="status '.strtolower($this->migr_le).'">'.$this->migr_le.'</span></div>'.
                '</div>';
            if(!$this->migr_table_exist or !$this->migr_log_exist){
                $return.='<div class="tables-create">'.'<form method="post" action="'.$this->processUri.'/createtables">'.
                    '<input type="submit" name="CreateTables" value="Create tables">'.
                    '</form>'.
                '</div>';
            }
        }else{
            $return.= 'cant create migrations cause of connection fail';
        }
        $return.='</div>';

        if($this->use_glog){
            $return.='<div class="migrations-glob">';
            $return.='<form method="post" action="'.$this->processUri.'/glob">'.
                '<input type="submit" name="Glob" value="Find files">'.
                '</form>';
            $return.='</div>';
        }else{
            //$return.= 'cant create migrations cause of connection fail';
        }


        if($this->use_exec) {
            $return .= '<div class="exec">';
            $return.='<div class="migrations-new">'.$this->new_migr_count.' new migrations</div>' .
                '<div class="migrations-new">' .
                '<form method="post" action="'.$this->processUri.'/exec">' .
                '<input type="submit" name="ExecNew" value="Exec">' .
                '</form>' .
                '</div>';
            $return.='</div>';
        }else{
            // $return.= 'cant create migrations cause of connection fail';

        }

        $return.='</div>';
        if($this->migration_log){
            $return.= '<div class="migration-log">'.$this->migration_log.'</div>';
        }

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Test\Migrations\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_T_M_Panel';
        return new $class_Name();
    }
}