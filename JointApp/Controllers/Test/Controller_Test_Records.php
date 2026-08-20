<?php


namespace JointApp\Controllers\Test;



use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Test_Records extends RecordsControllerWeb
{

    public string $langSl = '';
    public array $tblList = [];
    public string $selectedTbl = '';

    public function actionTables()
    {
        if($this->tblList = $this->model->fetchToArray("SHOW TABLES")){
            $firstTable = $this->tblList[0];
            if($this->list_frame_id){
                $this->selectedTbl = $this->list_frame_id;
            }else{
                $k = key($firstTable);
                $this->selectedTbl = $firstTable[$k];
            }
        }else{
            $this->logger->emergency("no tables in database", $this->context);
        }
    }

    public function htmlTables()
    {
        $this->updateViewParams($this->view);
    }
}