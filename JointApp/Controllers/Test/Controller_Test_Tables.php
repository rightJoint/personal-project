<?php


namespace JointApp\Controllers\Test;


use JointApp\Controllers\ControllerWeb;

class Controller_Test_Tables extends ControllerWeb
{

    public $tablesList = [];

    const TABLE_EXT_FILE = '.php';


    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Controllers\Test\Tables\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'C_T_Tables';
        return new $class_Name();
    }

    public function actionIndex()
    {
        $this->model->globCreateQueries();
        $this->model->checkExistTable();
        $this->model->globBackUp();

        $this->tablesList = $this->model->tables["tables"];
    }

    public function actionClearTable()
    {
        $this->execTableAction('clear');
    }

    public function actionDownloadTable()
    {
        $this->execTableAction('download');
    }

    public function actionCreateTable()
    {
        $this->execTableAction('create');
    }

    public function actionUploadTable()
    {
        $this->execTableAction('upLoad');
    }

    public function actionDropTable()
    {
        $this->execTableAction('drop');
    }

    public function actionUploadAll()
    {
        $this->execTableAction('upLoadAll');
    }

    public function actionRefreshTables()
    {
        $this->execTableAction('refreshTables');
    }

    public function execTableAction(string $actionTable)
    {
        $this->responseJson['log'] = '';
        if(isset($actionTable) and $actionTable==="refreshTables"){
            $this->model->globCreateQueries();
            $this->model->checkExistTable();
            $this->model->globBackUp();
            $this->tablesList = $this->model->tables["tables"];
            $this->updateViewParams();
            $this->view->setUpCustomLang($this->view->getDefaultLang());
            $this->responseJson['tablesList'] = $this->view->printTablesList();
        }
        elseif(isset($actionTable) and $actionTable==="upLoadAll"){
            $this->model->checkExistTable();
            $this->responseJson = $this->model->uploadAllTables($this->requestParams['prefixTag'],
                $this->requestParams['dateTag'], self::TABLE_EXT_FILE);
        }elseif (isset($actionTable) and  in_array($actionTable,
                array('clear', 'download', 'drop', 'create', 'upLoad'))){

            $action = $actionTable.'Table';

            if($actionTable == 'download'){
                $argum = $this->requestParams['dwlTable'];
            }else{
                $argum = $this->requestParams['tableName'];
            }

            if($actionTable != 'upLoad') {
                if ($this->model->$action($argum)) {
                    $this->responseJson['err'] = 0;
                } else {
                    $this->responseJson['err'] = $this->langFile->actionName($actionTable) . " " .
                        $this->langFile::TEST_TBL_TBL . " " .
                        $this->langFile::TEST_RES_FAIL;
                }
            }else{
                $this->responseJson = $this->model->uploadTable($this->requestParams['tableName'], $this->requestParams['prefixTag'],
                    $this->requestParams['dateTag'], self::TABLE_EXT_FILE);
            }
            $this->model->globCreateQueries($this->requestParams['tableName']);
            $this->model->checkExistTable($this->requestParams['tableName']);

            //case when table deleted and no creation file
            if(isset($this->model->tables['tables'])){
                $this->model->globBackUp($this->requestParams['tableName']);
            }

            $trimTableName = $this->requestParams['tableName'];

            $access_table_cell = null;
            if(isset($this->model->tables['tables'][$trimTableName])){
                $access_table_cell = $this->model->tables['tables'][$trimTableName];
            }

            $this->responseJson['row'] = $this->view::tableCell($this->requestParams['tableName'], $access_table_cell);

            $this->responseJson['log'].=$this->langFile::TEST_ACT_ACT.': '.
                $this->langFile->actionName($actionTable).'<br>'.
                '<ul>'.$this->langFile::TEST_OPT_OPT.':<li>'.
                $this->langFile::TEST_TBL_TBL.'--> '.$this->requestParams['tableName'].'</li></ul>'.
                $this->langFile::TEST_RUN_TIME.': ';
        }
    }

    protected function checkAccessController(): bool
    {
        return $this->user->isAdmin();
    }
}