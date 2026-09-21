<?php

namespace JointApp\Models\Migrations;



use JointApp\JointAppQueryBuilder;
use JointApp\Models\RecordsModel;
use JointApp\SettingsEnv;

class Model_Migrations extends RecordsModel
{
    public string $tableName = 'migrations';

    function getRecordStructure()
    {
        $this->record = Array
        (
            "migration_name" => Array
            (
                "pri" => 1,
                "format" => "varchar",
                'custom' => false,
            ),
            "status" => Array
            (
                "format" => "varchar",
                "curVal" => "new",
                'custom' => false,
            ),

            "try_date" => Array
            (
                "format" => "datetime",
                'custom' => false,
            ),

            "add_date" => Array
            (
                "format" => "datetime",
                'custom' => false,
            ),

            "migr_file" => Array
            (
                "format" => "tinyint",
                'custom' => false,
            ),
        );

        $this->record["add_date"]["curVal"] = date("Y-m-d H:i:s");
    }

    function globMigrationFiles()
    {
        $files_list = null;
        $add_date = date('Y-m-d H:i:s');
        //$list_where = null;

        /*find all .sql -files in PATH_TO_MIGRATIONS
        and then put into migrations table if trey arent there
        */
        foreach (glob(SettingsEnv::DOC_ROOT.'/migrations/*.sql') as $mirgation_file) {
            $this->record['migration_name']['curVal'] = basename($mirgation_file);
            if(!$this->copyRecord()){
                $this->record['status']['curVal'] = 'new';
                $this->record['add_date']['curVal'] = $add_date;
                $this->record['migr_file']['curVal'] = 1;
                $this->insertRecord();
            }
            $files_list.='"'.basename($mirgation_file).'", ';
        }

        //$files_list - list all founded .sql -files

        //mark files they are in migrations table and has not founded (was deleted)
        $qBuilder = new JointAppQueryBuilder();
        if($files_list){
            $files_list =substr($files_list, 0, strlen($files_list)-2);
            $qBuilder->where('migration_name not in ('.$files_list.') and migr_file = true');
        }

        $list_migr = $this->listRecords($qBuilder);

        if(count($list_migr)){
            foreach ($list_migr as $m_num => $m_data){
                $this->record['migration_name']['curVal'] = basename($m_data['migration_name']);
                $this->copyRecord();
                $this->record['migr_file']['curVal'] = false;
                $this->updateRecord();
            }
        }

    }

    private function parseSqlFile($file_name):array
    {
        $acceptable_queries = array(
            'insert' => 'insert ',
            'insert_upper' => 'INSERT ',
            'update' => 'update ',
            'update_upper' => 'UPDATE ',
            'delete' => 'delete ',
            'replace' => 'replace ',
            'replace_upper' => 'REPLACE ',
            'create_table' => 'create table ',
            'create_table_upper' => 'CREATE TABLE ',
            'alter_table_upper' => 'ALTER TABLE ',
            'alter_table' => 'alter table ',
        );

        $new_cmd_lines = array();

        if(file_exists($file_name)){
            $this->record['commands']['curVal'] = file_get_contents($file_name);
            $this->record['commands']['use_table_name'] = 'non-db';
            $this->record['commands']['custom'] = 1;

            $commands = $this->record['commands']['curVal'];

            $cmd_lines = explode(';', $commands);

            $new_cmd_lines = array();

            $lines_cnt = count($cmd_lines);
            $lines_counter = 0;
            foreach ($cmd_lines as $cmd_line){
                $lines_counter++;
                $glue_flag= true;
                foreach ($acceptable_queries as $q_type => $q_tag){
                    if(strpos('-'.$cmd_line, $q_tag)){
                        $new_cmd_lines[$lines_counter]['type'] = $q_type;
                        $glue_flag = false;
                        break;
                    }
                }
                $new_lines_cnt = count($new_cmd_lines);

                if($glue_flag){
                    if($new_lines_cnt){
                        if($lines_counter < $lines_cnt){
                            $new_cmd_lines[$new_lines_cnt-1]['query'] = str_replace(array("\n"), '', $cmd_line);
                        }
                    }
                }else {
                    $new_cmd_lines[$new_lines_cnt]['query'] = str_replace(array("\n"), '', $cmd_line);
                }
            }
        }

        return $new_cmd_lines;
    }

    function execOne(string $file_name):array
    {

        $return=array(
            'log' => array(),
            'result' => false,
        );
        $count_q = 0;
        $count_suss = 0;
        $count_fail = 0;
        $commands_count = 0;

        $this->record['migration_name']['curVal'] = $file_name;
        if($this->copyRecord()){
            if($this->record['status']['curVal'] == 'new' or $this->record['status']['curVal'] == 'fail' ){
                if($commands = $this->parseSqlFile(SettingsEnv::DOC_ROOT.'/migrations/'.$file_name)){
                    $return['log'][] = 'Exec file '.$file_name;
                    $commands_count = count($commands);
                    if($commands_count){
                        $return['log'][] = 'count('.$commands_count.')';
                        foreach ($commands as $q_num => $q_info){
                            $return['log'][] = 'exec No: '.$q_num.', type: '.$q_info['type'];
                            if($this->pdoQuery($q_info['query'])){
                                $count_suss++;
                                $return['log'][] = 'result: SUCCESS';
                            }else{
                                $return['log'][] = 'result: FAIL';

                                //foreach ($this->DB->errorInfo() as $err_num => $err_info){
                                //?????????????????//
                                $err_info = str_replace(array('\r\n', '\r', '\n', '"', "'"), '',  $this->log_message);
                                $return['log'][] = $err_info;
                                //}
                                $count_fail++;
                            }
                            $count_q++;
                        }

                        //break here to stop exec commands if one command fail

                        $return['log'][] = 'Results: total('.$count_q.'), success('.$count_suss.'), fail('.$count_fail.')';

                    }else{
                        $return['log'][] = 'no queries in '.$file_name;
                    }
                }else{
                    $return['log'][] = 'no sql file or no commands (empty migration sql file) '.$file_name;
                }
                if($commands_count == $count_suss){
                    $return['result'] = true;
                    $this->record['status']['curVal'] = 'SUCCESS';
                }else{
                    $this->record['status']['curVal'] = 'fail';
                }

            }else{
                $return['log'][] = 'migration status is not new';
            }


            $this->record['try_date']['curVal'] = date('Y-m-d H:i:s');


            $this->updateRecord();



        }else{
            $return['log'][] = 'cant find migration in the migrations table';
        }

        $migration_log = new Model_MigrationsLog($this->user, $this->logger);

        $migration_log->record['migration_name']['curVal'] = $file_name;
        $migration_log->record['add_date']['curVal'] = date('Y-m-d H:i:s');

        $migration_log->record['migration_log']['curVal'] = json_encode($return, true);

        $migration_log->insertRecord();

        return $return;

    }

    function execNew():array
    {
        $exec_new_result = array(
            'result' => false,
            'count_total' => 0,
            'count_success' => 0,
        );

        $this->globMigrationFiles();

        $qBuilder = new JointAppQueryBuilder();
        $qBuilder
            ->where('status in ("new", "fail")')
            ->order('migration_name');

        $list_migr = $this->listRecords($qBuilder);

        if($exec_new_result['count_total'] = count($list_migr)){
            foreach ($list_migr as $migr_num => $migr_data){
                $this->record['migration_name']['curVal'] = $migr_data['migration_name'];
                $migr_result = $this->execOne($migr_data['migration_name']);
                $exec_new_result['result'] = $migr_result['result'];
                if($migr_result['result']){
                    $exec_new_result['count_success']++;
                }else{
                    break;
                }
            }
        }else {
            //no new of fail migration
            $exec_new_result['result'] = true;
        }

        return $exec_new_result;
    }

    protected function copyCustomFields():bool
    {
        if($this->record['migration_name']['curVal'] ){
            if(file_exists(SettingsEnv::DOC_ROOT.'/migrations/'.
                $this->record['migration_name']['curVal'])){
                $commands = $this->parseSqlFile(SettingsEnv::DOC_ROOT.'/migrations/'.
                    $this->record['migration_name']['curVal']);
                foreach ($commands as $c_num => $c_data){
                    $cmd_field_name = 'cmd_'.$c_num.'_'.$c_data['type'];
                    $fieldAliases = array(
                        'en' => 'command No: '.$c_num.', type: '.$c_data['type'],
                        'rus' => 'комманда No: '.$c_num.', Тип: '.$c_data['type'],
                    );

                    $this->record[$cmd_field_name] = array(
                        'curVal' => $c_data['query'],
                        'custom' => true,
                        'use_table_name' => 'non-db',
                        'format' => 'text',
                        'fieldAliases' => $fieldAliases,
                    );

                }
            }
        }

        return true;
    }

    function getCommandsText($req_arr):string
    {
        $commands = '';
        foreach ($req_arr as $key => $val){
            if(strpos(" ".$key, 'cmd_')){
                if($val){
                    $commands.=$val;
                }
            }
        }
        return $commands;
    }

    protected function updateCustomFields():bool
    {
        $commands = $this->commandsContent();
        if(((isset($this->record['commands']['curVal']) and
                $this->record['commands']['curVal'] != $commands))
            or (!isset($this->record['commands']['curVal']) and !empty($commands))){
            file_put_contents(SettingsEnv::DOC_ROOT.'/migrations/'.$this->record['migration_name']['curVal'], $commands);
            $this->log_message .= 'update migration file success';

            $this->updateMigrFile();
        }
        return true;
    }

    private function updateMigrFile()
    {
        if(!$this->record['migr_file']['curVal']){
            $migrations = new RecordsModel($this->user, $this->logger, ['tableName' => 'migrations']);
            $migrations->record['migration_name']['curVal'] = $this->record['migration_name']['curVal'];
            $migrations->copyRecord();
            $migrations->record['migr_file']['curVal'] = 1;
            $migrations->updateRecord();
        }
    }

    private function commandsContent():string
    {
        $commands = "";
        foreach ($this->record as $key => $val){
            if(strpos(" ".$key, 'cmd_')){

                if(!empty($this->record[$key]['curVal'])){
                    $curVal = str_replace(array(";"), '', $this->record[$key]['curVal']);
                    $commands.=$curVal.';'."\n";
                }
            }
        }
        return $commands;
    }
}