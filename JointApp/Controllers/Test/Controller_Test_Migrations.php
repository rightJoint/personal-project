<?php


namespace JointApp\Controllers\Test;



use JointApp\Controllers\Records\RecordsControllerWeb;
use JointApp\JointAppQueryBuilder;

class Controller_Test_Migrations extends RecordsControllerWeb
{
    public bool $connect_server_status = false;
    public bool $connect_db_status = false;
    public bool $migr_table_exist = false;
    public bool $migr_log_exist = false;
    public int $new_migr_count = 0;
    public string $migration_log = '';
    public string $exec_one_log = '';

    //exec one flag
    public string $execOne = '';


    public string $processUri = '/test/migrations';
    public string $list_frame_id = 'migrations';

    public function prepareListFields():void
    {
        $this->listFields = Array
        (
            "btnDetail" => Array
            (
                "replaces" => Array("migration_name", ),
                "format" => "link",
                "url" => "migration_name=migration_name",
            ),

            "btnEdit" => Array
            (
                "replaces" => Array("migration_name", ),
                "format" => "link",
                "url" => "migration_name=migration_name",
            ),

            "btnDelete" => Array
            (
                "replaces" => Array("migration_name", ),
                "format" => "link",
                "url" => "migration_name=migration_name",
            ),
            "migration_name" => Array
            (
                "pri" => 1,
                "format" => "link",
                "replaces" => Array("migration_name", ),
                "url" => "/test/migrations/log?migration_name=migration_name",
            ),
            "status" => Array
            (
                "format" => "varchar",
            ),

            "try_date" => Array
            (
                "format" => "datetime",
            ),

            "add_date" => Array
            (
                "format" => "datetime",
            ),

            "migr_file" => Array
            (
                "format" => "tinyint",
            ),
        );
    }

    public function prepareEditFields(): void
    {
        $this->editFields = Array
        (
            "migration_name" => Array
            (
                "pri" => 1,
                "format" => "varchar",
                'curVal' => '',
            ),
            "status" => Array
            (
                "format" => "varchar",
                'curVal' => '',
            ),

            "try_date" => Array
            (
                "format" => "datetime",
                'curVal' => '',
            ),

            "add_date" => Array
            (
                "format" => "datetime",
                'curVal' => '',
            ),

            "migr_file" => Array
            (
                "format" => "tinyint",
                'curVal' => '',
            ),
        );
    }

    public function htmlNewView():void
    {
        parent::htmlNewView();

        $this->editFields['add_date']['curVal'] = date('Y-m-d H:i:s');
        $this->editFields['add_date']['readonly'] = true;
        $this->editFields['status']['curVal'] = 'new';
        $this->editFields['status']['readonly'] = true;
        $this->editFields['try_date']['readonly'] = true;
        $this->editFields['migr_file']['readonly'] = true;
    }

    public function prepareViewFields(): void
    {
        $this->viewFields = Array
        (
            "migration_name" => Array
            (
                "pri" => 1,
                "format" => "varchar",
                "readonly" => 1,
            ),
            "status" => Array
            (
                "format" => "varchar",
                "readonly" => 1,
            ),

            "try_date" => Array
            (
                "format" => "datetime",
                "readonly" => 1,
            ),

            "add_date" => Array
            (
                "format" => "datetime",
                "readonly" => 1,
            ),
        );

        foreach ($this->model->record as $fN=>$fOpt){
            if(strpos(' '.$fN, 'cmd_')){
                $this->viewFields[$fN]['format'] = 'text';
                $this->viewFields[$fN]['readonly'] = 1;
                $this->viewFields[$fN]['style'] = array(
                    'class' => 'wd100',
                );
            }

            if(isset($this->model->record[$fN]['curVal'])){
                $this->viewFields[$fN]['curVal'] = $this->model->record[$fN]['curVal'];
            }else{
                $this->viewFields[$fN]['curVal'] = null;
            }
        }
    }

    public function prepareSearchFields(): void
    {
        $this->searchFields = Array
        (
            "migration_name" => Array
            (
                "pri" => 1,
                "format" => "varchar",
                "sort" => 1,
                "search" => 1,
                "sortOrder" => "DESC",
                "curVal" => "",
            ),
            "status" => Array
            (
                "format" => "varchar",
                "sort" => 1,
                "search" => 1,
                "curVal" => "",
            ),

            "try_date" => Array
            (
                "format" => "datetime",
                "sort" => 1,
                "search" => 0,
                "curVal" => "",
            ),

            "add_date" => Array
            (
                "format" => "datetime",
                "sort" => 1,
                "search" => 0,
                "curVal" => "",
            ),

            "migr_file" => Array
            (
                "format" => "tinyint",
                "sort" => 1,
                "search" => 1,
                "curVal" => "",
            ),
        );
    }

    public function updateEditFieldsFromRecord(): bool
    {
        $counter = 1;
        $addNew = true;
        foreach ($this->model->record as $fN=>$fOpt){
            if(strpos(' '.$fN, 'cmd_')){
                if(strpos(' '.$fN, 'new') and empty($this->model->record[$fN]['curVal'])){
                    $addNew = false;
                }
                $counter++;
                $this->editFields[$fN]['format'] = 'text';
                $this->editFields[$fN]['style'] = array(
                    'class' => 'wd100 migration-command',
                );
            }
        }


        if($addNew){
            $this->editFields['cmd_'.$counter.'_new'] = array(
                'format' => 'text',
                'custom' => 1,
                'style'=> array(
                    'class' => 'wd100 migration-command',
                ),
            );
            $this->view->fieldAliases['cmd_'.$counter.'_new'] = 'cmd_'.$counter.'_new';
        }

        return parent::updateEditFieldsFromRecord();
    }

    public function updateModelRecordFromRequest():void
    {
        foreach ($this->requestParams as $p => $v) {
            if (strpos(' ' . $p, 'cmd_')) {
                $this->model->record[$p] = array(
                    'type' => 'text',
                    'custom' => true,
                    'use_table_name' => 'no-db',
                    'curVal' => $v,
                );
            }
        }
        parent::updateModelRecordFromRequest();
    }

    public function htmlEditView():void
    {
        $this->model->getRecordStructure();
        parent::htmlEditView();
    }

    public function actionCheckStatus():void
    {
        $this->connect_server_status = $this->model->getServerStatus();
        $this->connect_db_status = $this->model->getDbStatus();
        $this->migr_table_exist = $this->checkMigrationsTable();
        $this->migr_log_exist = $this->checkLogTable();
        $qBuilder = new JointAppQueryBuilder();
        $qBuilder->select("count(migration_name) as cnt")
            ->from('migrations')->where('status="New"');
        if($count_res = $this->model->fetchToArray($qBuilder->buildQuery())){
            $this->new_migr_count = $count_res[0]['cnt'];
        }
    }

    private function checkMigrationsTable():bool
    {
        if($res = $this->model->pdoQuery('SHOW TABLES LIKE "migrations"')){
            if($row = $res->fetch(\PDO::FETCH_ASSOC)){
                return true;
            }
        }
        return false;
    }

    private function checkLogTable():bool
    {
        if($res = $this->model->pdoQuery('SHOW TABLES LIKE "migrations_log"')){
            if($row = $res->fetch(\PDO::FETCH_ASSOC)){
                return true;
            }
        }
        return false;
    }

    public function actionCreateTables():void
    {
        if(!$this->checkMigrationsTable()){
            $query_text="CREATE TABLE IF NOT EXISTS migrations (".
                "migration_name varchar(256) not null, ".
                "status varchar(32) not null, ".
                "try_date datetime, ".
                "add_date datetime, ".
                "migr_file tinyint, ".
                "primary key (migration_name)".
                ") ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
            if($this->model->pdoQuery($query_text)){
                $this->migration_log = 'table migrations has created successfully; ';
            }else{
                $this->migration_log = 'actionCreateTables: cant create migrations table ('.$this->model->getLogMessage().'); ';
            }
        }else{
            $this->migration_log = 'table migrations has already exist; ';
        }

        if(!$this->checkLogTable()){
            $query_text="CREATE TABLE IF NOT EXISTS migrations_log(".
                "migration_log_id varchar(36) not null, ".
                "migration_name varchar(256) not null, ".
                "add_date datetime not null, ".
                "migration_log TEXT, ".
                "primary key (migration_log_id)".
                ") ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
            if($this->model->pdoQuery($query_text)){
                $this->migration_log = 'table migrations_log has created successfully; ';
            }else{
                $this->migration_log = 'actionCreateTables: cant create migrations_log table ('.$this->model->getLogMessage().'); ';
            }
        }else{
            $this->migration_log .= 'table migrations_log has already exist; ';
        }
    }

    public function actionGlob():void
    {
        $this->model->globMigrationFiles();
    }

    public function actionExecOne():void
    {
        if ($this->execOne) {
            if($this->requestParams['migration_name']){
                $res = $this->model->execOne($this->requestParams['migration_name']);
                if($res['result']){
                    $this->exec_one_log = 'execOne: Success';
                }else{
                    $this->exec_one_log = 'execOne: fail';
                }
            }else{
                $this->exec_one_log = 'execOne: Error (no migration_name)';
            }
        }
    }
}