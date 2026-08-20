<?php


namespace JointApp\Models\Test;


use JointApp\Models\Model_Pdo;

class Model_Test_Tables extends Model_Pdo
{
    const PATH_TO_TABLES_LIST = '/Tables/createQueries';
    const TABLE_EXT_FILE = '.php';
    const PATH_TO_DB_UPLOAD = '/Tables';

    public $tables = [
        'result' => ['err' => false,
            'log' => null,],
        'tables' => [],
    ];

    public string $docRoot = 'C:/OSPanel/domains/personal-project.web/src';

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Models\Test\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Models_Test';
        return new $class_Name();
    }


    public function globCreateQueries($table_name = null):void
    {
        $this->tables["result"]['log'] = null;
        $this->tables["result"]['err'] = false;
        foreach (glob($this->docRoot.self::PATH_TO_TABLES_LIST."/".$table_name."*".self::TABLE_EXT_FILE) as $filename){
            $tableName = substr(basename($filename),0, strlen(basename($filename))-strlen(self::TABLE_EXT_FILE));
            $this->tables["tables"][$tableName]['list']=true;
        }
    }

    public function checkExistTable($table_name = null):void
    {
        $query_text = 'SELECT TABLE_NAME, TABLE_ROWS FROM `information_schema`.`tables` WHERE
          `table_schema` = "'.$this->getDbName().'"';
        if($table_name){
            $query_text .= " and TABLE_NAME='".$table_name."'";
        }
        if($query_res = $this->pdoQuery($query_text)){
            $row_count = $query_res->rowCount();
            while ($query_row = $query_res->fetch(\PDO::FETCH_ASSOC)) {
                if($row_count == 1){
                    $trimTableName = $table_name;
                }else{
                    $trimTableName = $query_row['TABLE_NAME'];
                }
                $this->tables["tables"][$trimTableName]['exist'] = true;
                $this->tables["tables"][$trimTableName]['qty'] = $query_row['TABLE_ROWS'];
            }
        }
    }

    public function globBackUp()
    {
        if(count($this->tables["tables"])){
            foreach ($this->tables["tables"] as $tbl_name => $tbl_opt){
                foreach (glob( $this->docRoot.self::PATH_TO_DB_UPLOAD . "/*" . $tbl_name .
                    "*" . self::TABLE_EXT_FILE) as $tableToInsert) {
                    //case when delete table and no createTableFile
                    if(isset($this->tables["tables"][$tbl_name])){
                        $this->tables["tables"][$tbl_name]["load"][] = basename($tableToInsert);
                    }
                }
            }
        }
    }


    public function dropTable($tableName)
    {
        return $this->pdoQuery("drop table ".$tableName);
    }

    public function clearTable($tableName)
    {
        return $this->pdoQuery("delete from ".$tableName);
    }

    public function createTable($tableName){
        require_once ($this->docRoot.self::PATH_TO_TABLES_LIST."/".$tableName.self::TABLE_EXT_FILE);
        return $this->pdoQuery("create table ".$tableName." ".$query_text);
    }

    public function downloadTable($tableName)
    {
        if($queryToInsert=@file_get_contents( $this->docRoot.self::PATH_TO_DB_UPLOAD."/".$tableName)){
            if($this->pdoQuery($queryToInsert)){
                return true;
            }

        }
        return false;
    }

    public function uploadTable($tableName, $prefixTag = '', $dateTag = false, $extension = ".php"){

        $orderBy=null;

        $return=array(
            "log" => null,
            "err" => 0,
        );

        $query_text = "select * from ".$tableName." ".$orderBy;
        $query_res = $this->pdoQuery($query_text);
        if ($query_res->rowCount() == 0){
            $return['log'].= $this->langFile::TEST_TBL_EMPTY."<br>";
        }else
        {
            $queryToInsert = null;
            $queryToInsert_temp = "(";
            $queryToInsert .= "insert into ".$tableName." (\r";
            $query_row = $query_res->fetch(\PDO::FETCH_ASSOC);
            foreach ($query_row as $key => $value) {
                if ($value == null) {
                    $queryToInsert_temp .= "null, ";
                } else {
                    $queryToInsert_temp .= "'" . $value . "', ";
                }
                $queryToInsert .= $key . ", ";
            }
            $queryToInsert = substr($queryToInsert, 0, strlen($queryToInsert) - 2) . ")\r values \r";
            $queryToInsert_temp = substr($queryToInsert_temp, 0, strlen($queryToInsert_temp) - 2) . "), \r";
            $queryToInsert .= $queryToInsert_temp;
            while ($query_row = $query_res->fetch(\PDO::FETCH_ASSOC)) {
                $queryToInsert .= "(";
                foreach ($query_row as $key => $value) {
                    if ($value == null) {
                        $queryToInsert .= "null, ";
                    } else {
                        $queryToInsert .= "'" . $value  . "', ";
                    }
                }
                $queryToInsert = substr($queryToInsert, 0, strlen($queryToInsert) - 2) . "), \r";
            }
            $queryToInsert = substr($queryToInsert, 0, strlen($queryToInsert) - 3);
            if(!empty($prefixTag)){
                $file = htmlspecialchars($prefixTag)."-".$tableName;
            }else{
                $file = $tableName;
            }
            if($dateTag=='true'){
                $file .="_".date( 'Ymd_His');
            }
            $file.=$extension;



            if(!is_dir($this->docRoot.self::PATH_TO_DB_UPLOAD)){
                mkdir($this->docRoot.self::PATH_TO_DB_UPLOAD, 0777, true);
            }
            if(!file_put_contents($this->docRoot.self::PATH_TO_DB_UPLOAD.'/'.$file, $queryToInsert)){
                $return['err'].= $tableName."--> ".$this->langFile::TEST_RESP_UPLOAD;
            }else{
                $return['log'].= $tableName."--> ".$this->langFile::TEST_RESP_SUCCESS."<br>";
            }
        }
        return $return;
    }

    public function uploadAllTables($prefixTag = '', $dateTag = false, $extension = ".php")
    {
        $return = array(
            "log" => null,
            "err" => false,
        );
        $return['log'].=$this->langFile::TEST_UPLOAD_ALL."<br>";
        $orderBy=null;
        $return['log'].=$this->langFile::TEST_OPT_PT."=".$prefixTag."<br>".
            $this->langFile::TEST_OPT_DT."=".$dateTag."<br>";
        foreach ($this->tables["tables"] as $table => $value) {
            if ($this->tables["tables"][$table]['exist'] === true) {
                $query_text = "select * from " . $table . " " . $orderBy;
                $query_res = $this->pdoQuery($query_text);
                if ($query_res->rowCount() == 0) {
                    $return['log'].= $table . "-->> ".$this->langFile::TEST_TBL_EMPTY."<br>";
                } else {

                    $result = $this->uploadTable($table, $prefixTag, $dateTag, $extension);
                    $return['log'].=$result["log"];
                }
            }
        }
        return $return;
    }
}