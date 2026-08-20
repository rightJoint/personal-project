<?php

namespace JointApp\Controllers\Records;


use JointApp\Controllers\Controller;
use JointApp\JointAppQueryBuilder;

class RecordsController extends Controller
{
    protected $context = ['RecordsController' => __CLASS__];

    public string $processUri = '';

    public $searchFields = [];
    public $editFields = [];
    public $listFields = [];
    public $viewFields = [];


    public array $listRecords = [];
    public int $listCount = 0;


    public string $slave_req = '';

    public int $curPage = 1;
    public int $onPage = 10;
    public string $sortField = '';
    public string $sortOrder = 'ASC';

    public bool $action_result = false;
    public string $action_log = '';

    public string $submitEditForm = '';
    public string $submitDeleteView = '';

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Controllers\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Controllers_Record';
        return new $class_Name();
    }

    public function actionIndex()
    {
        $this->actionList();
    }

    function actionList():void
    {
        $this->prepareSearchFields();
        $this->prepareEditFields();
        $this->prepareListFields();

        $this->getListCount();
        $this->getListRecords();
    }

    public function getListCount():void
    {
        $qBuilder = $this->filterWhere();
        $qBuilder
            ->order('')
            ->limit('');
        $this->listCount = $this->model->countRecords($qBuilder);
    }

    //list records array from model
    public function getListRecords():void
    {
        $qBuilder = $this->filterWhere();
        $this->listRecords = $this->model->listRecords($qBuilder);
    }

    //action to display DetailView
    public function actionDetail():void
    {
        $this->prepareEditFields();
        $this->updateModelPriKeysFromRequest();
        if($this->model->copyRecord()){
            $this->prepareViewFields();
        }else{
            $this->logger->emergency($this->model->getLogMessage(),
                $this->context);
        }
    }

    //action to display EditView on post
    public function actionEdit():void
    {
        if ($this->submitEditForm) {
            $this->prepareEditFields();
            $this->updateModelPriKeysFromRequest();
            if ($this->model->copyRecord()) {
                $this->updateModelRecordFromRequest();
                if($this->action_result = $this->updateEditFieldsFromRecord()){
                    $this->action_result = $this->model->updateRecord();
                    $this->action_log = $this->model->getLogMessage();
                }else{
                    $this->action_result = false;
                    $this->action_log = 'updateEditFieldsFromRecord in Recors controller on ction postEditView';
                }
            } else {
                $this->action_log = $this->model->getLogMessage();
                $this->action_result = false;
            }
        }else{
            $this->logger->error('actionEdit, submit flag required', $this->context);
        }
    }

    public function actionNew():void
    {
        if ($this->submitEditForm) {
            $this->prepareEditFields();
            $this->updateModelRecordFromRequest();
            if($this->action_result = $this->updateEditFieldsFromRecord())
            {
                if($this->action_result = $this->model->insertRecord())
                {
                    $this->action_log = $this->model->getLogMessage();
                }else{
                    $this->action_result = false;
                    $this->action_log = $this->model->getLogMessage();
                }
            }else{
                $this->action_log = 'actionNew err: xxx';
            }
        }
    }

    public function actionDelete()
    {
        if ($this->submitDeleteView) {
            $this->prepareEditFields();
            $this->updateModelPriKeysFromRequest();
            if ($this->model->copyRecord()) {
                if($this->model->deleteRecord()){
                    $this->action_result = true;
                }else{
                    $this->action_log = $this->model->log_message;
                    $this->action_result = false;
                }
            } else {
                $this->logger->error($this->model->getLogMessage(), $this->context);
            }
        }else{
            $this->logger->error('actionDelete, submit flag required', $this->context);
        }
    }



    //set up fields
    //
    //prepareSearchFields
    //prepareEditFields
    //prepareListFields
    //prepareViewFields
    protected function prepareSearchFields():void
    {
        foreach ($this->model->record as $fieldName => $fieldOpt){
            $this->searchFields[$fieldName]['search'] = true;
            $this->searchFields[$fieldName]['sort'] = true;
            $this->searchFields[$fieldName]['format'] = $fieldOpt['format'];
            if(isset($this->requestParams[$fieldName])){
                $this->searchFields[$fieldName]['curVal'] = $this->requestParams[$fieldName];
            }else{
                $this->searchFields[$fieldName]['curVal'] = '';
            }
        }
    }

    protected function prepareEditFields():void
    {
        foreach ($this->model->record as $fieldName => $fieldOpt){
            $this->editFields[$fieldName]['format'] = $fieldOpt['format'];
            $this->editFields[$fieldName]['curVal'] = '';
            if(isset($fieldOpt['pri']) and $fieldOpt['pri']==1){
                $this->editFields[$fieldName]['pri'] = true;
                $this->editFields[$fieldName]['readonly'] = true;
            }
            if(isset($fieldOpt['auto_increment']) and $fieldOpt['auto_increment'] == true){

            }
        }
    }

    protected function prepareListFields():void
    {
        foreach ($this->model->record as $fieldName => $fieldOpt){;
            $this->listFields[$fieldName]['format'] = $fieldOpt['format'];
        }
    }

    //create view->viewFields
    public function prepareViewFields():void
    {
        foreach ($this->model->record as $fieldName => $fieldOpt){
            $this->viewFields[$fieldName]['format'] = $fieldOpt['format'];
            if(isset($this->model->record[$fieldName]['curVal'])){
                $this->viewFields[$fieldName]['curVal'] = $this->model->record[$fieldName]['curVal'];
            }else{
                $this->viewFields[$fieldName]['curVal'] = null;
            }
        }
    }

    //update model from fields
    //updateModelPriKeysFromRequest
    //updateModelRecordFromRequest
    public function updateModelPriKeysFromRequest()
    {
        if(isset($this->model->record)){
            foreach ($this->model->record as $fName=>$fData){
                if(isset($this->editFields[$fName])){
                    if(isset($this->editFields[$fName]['pri']) and $this->editFields[$fName]['pri'] == true) {
                        /*
                         * pri fields cant be checkbox or tinyint
                        if (($fData['format'] == 'checkbox') or ($fData['format'] == 'tinyint')) {
                            if (isset($this->requestParams[$fName]) and $this->requestParams[$fName] == 'on') {
                                $this->model->record[$fName]['curVal'] = 1;
                            } else {
                                $this->model->record[$fName]['curVal'] = 0;
                            }
                        } else {
                        */
                        if (isset($this->requestParams[$fName])) {
                            $this->model->record[$fName]['curVal'] = $this->requestParams[$fName];
                        } else {
                            if (isset($this->record[$fName]['fetchVal'])) {
                                $this->model->record[$fName]['curVal'] = '';
                            } else {
                                $this->model->record[$fName]['curVal'] = null;
                            }
                        }
                    }

                }
            }
        }
    }

    public function updateModelRecordFromRequest():void
    {
        if(isset($this->model->record)){
            foreach ($this->model->record as $fName=>$fData){
                if(isset($this->editFields[$fName])){
                    if(isset($this->editFields[$fName]['readonly']) and $this->editFields[$fName]['readonly'] == true) {
                        if(isset($this->model->record[$fName]['fetchVal'])){
                            $this->model->record[$fName]['curVal'] = $this->model->record[$fName]['fetchVal'];
                        }else{
                            $this->model->record[$fName]['curVal'] = '';
                        }
                    }else{
                        if (($fData['format'] == 'checkbox') or ($fData['format'] == 'tinyint')) {
                            if (isset($this->requestParams[$fName]) and $this->requestParams[$fName] == 'on') {
                                $this->model->record[$fName]['curVal'] = 1;
                            } else {
                                $this->model->record[$fName]['curVal'] = 0;
                            }
                        } else {
                            if (isset($this->requestParams[$fName])) {
                                $this->model->record[$fName]['curVal'] = $this->requestParams[$fName];
                            } else {
                                if (isset($this->model->record[$fName]['fetchVal'])) {
                                    $this->model->record[$fName]['curVal'] = $this->model->record[$fName]['fetchVal'];
                                } else {
                                    $this->model->record[$fName]['curVal'] = null;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    //update fields from model
    //updateEditFieldsFromRecord
    public function updateEditFieldsFromRecord():bool
    {
        $return = true;
        foreach ($this->editFields as $fName => $fOpt){
            if(isset($this->model->record[$fName]['curVal'])){
                $this->editFields[$fName]['curVal'] = $this->model->record[$fName]['curVal'];
            }else{
                $this->editFields[$fName]['curVal'] = null;
            }
            //used in find-select control
            if(isset($this->model->record[$fName]['findVal'])){
                $this->editFields[$fName]['findVal'] = $this->model->record[$fName]['findVal'];
            }
            if(isset($fOpt['accept'])){
                //check isset field (case when select)
                if(isset($this->editFields[$fName]['curVal'])){
                    if(!preg_match($fOpt['accept'], $this->editFields[$fName]['curVal'])){
                        $fName_p = $fName;
                        if(isset($this->langMap->fieldAliases[$fName])){
                            $fName_p = $this->langMap->fieldAliases[$fName];
                        }
                        $this->view->logMessage .= $fName_p.' '.$this->langMap->editF_accept_err.'; ';
                        $return = false;
                    }
                }else{
                    $this->view->logMessage .= $fName.' '.$this->langMap->editF_accept_err.'; ';
                    $return = false;
                }
            }
        }
        return $return;
    }

    //make query with fields
    //handle fields and request and create query
    public function filterWhere():JointAppQueryBuilder
    {
        $qBuilder = new JointAppQueryBuilder();
        $return_order = '';

        foreach ($this->searchFields as $fName=>$fData){
            $useFieldName = $fName;
            if(isset($fData['use_table_name'])){
                $useTableName = $fData['use_table_name'];
                if(isset($fData['use_field_name'])){
                    $useFieldName = $fData['use_field_name'];
                }
            }else{
                $useTableName = $this->model->tableName;
            }

            if(isset($this->requestParams[$fName]) and $this->requestParams[$fName]!= null){
                if(isset($fData['group_by_field'])){
                    if($fData['format']=='varchar' || $fData['format'] == 'text'){
                        $qBuilder->having .= $useFieldName.' like "%'.$this->requestParams[$fName].'%" and ';
                    }elseif($fData['format']=='int'){
                        $qBuilder->having .= $useFieldName.' = '.$this->requestParams[$fName].' and ';
                    }else{
                        $qBuilder->having .= $useFieldName.' = "'.$this->requestParams[$fName].'" and ';
                    }
                }elseif($fData['format']=='checkbox' or $fData['format']=='tinyint'){
                    if($this->requestParams[$fName] == 'on'){
                        $qBuilder->where.=$useTableName.'.'.$useFieldName.'=true and ';
                        //$this->model->record[$fName]['curVal'] = 1;
                    }else{
                        $qBuilder->where.=$useTableName.'.'.$useFieldName.'=false and ';
                        //$this->model->record[$fName]['curVal'] = 0;
                    }
                }elseif($fData['format']=='int'){
                    $qBuilder->where.=$useTableName.'.'.$useFieldName.' = '.$this->requestParams[$fName].' and ';
                }elseif($fData['format']=='varchar' || $fData['format'] == 'text'){
                    $qBuilder->where.=$useTableName.'.'.$useFieldName.' like "%'.$this->requestParams[$fName].'%" and ';
                    //$qBuilder->where.=$useTableName.'.'.$useFieldName." like '%'.$this->requestParams[$fName].'"% and ';
                }else{
                    $qBuilder->where.=$useTableName.'.'.$useFieldName.' = "'.$this->requestParams[$fName].'" and ';
                }
            }
        }

        $qBuilder->where = substr($qBuilder->where, 0 , strlen($qBuilder->where)-4);

        $qBuilder->having=substr($qBuilder->having, 0 , strlen($qBuilder->having)-4);

        if(isset($this->requestParams['onPage'])){
            if($this->requestParams['curPage']){
                $qBuilder->limit.=(($this->requestParams['curPage']-1)*$this->requestParams['onPage']).", ".$this->requestParams['onPage'];
            }
        }else{
            $qBuilder->limit.='10';
        }
        $sort_table_name = '';
        if(isset($this->requestParams['sortField'])){

            if(isset($this->searchFields[$this->requestParams['sortField']]['use_table_name'])){
                //group by case
                if(!empty($this->searchFields[$this->requestParams['sortField']]['use_table_name'])){
                    $sort_table_name = $this->searchFields[$this->requestParams['sortField']]['use_table_name'].'.';
                }

                if(isset($this->searchFields[$this->requestParams['sortField']]['use_field_name'])){
                    $sort_field_name = $this->searchFields[$this->requestParams['sortField']]['use_field_name'];
                }else{
                    $sort_field_name = $this->requestParams['sortField'];
                }

            }elseif (isset($this->searchFields[$this->requestParams['sortField']]['group_by_field'])){
                $sort_field_name = $this->requestParams['sortField'];
                $sort_table_name = '';
            }else{
                $sort_field_name = $this->requestParams['sortField'];
                $sort_table_name = $this->model->tableName.'.';
            }
            $return_order.= $sort_table_name.$sort_field_name;
            if(isset($this->requestParams['sortOrder'])){
                $return_order.=" ".$this->requestParams['sortOrder'];
            }
        }
        //sort by first field in view->searchFields
        else{
            $field_sort_default = null;
            foreach ($this->searchFields as $search_field => $sf_opt){
                if(isset($sf_opt['sort']) and $sf_opt['format'] != 'hidden'){
                    $field_sort_default = $search_field;
                    break;
                }
            }
            if($field_sort_default){
                if(isset($this->searchFields[$field_sort_default]['use_table_name'])){
                    //group by case
                    if(!empty($this->searchFields[$field_sort_default]['use_table_name'])){
                        $sort_table_name = $this->searchFields[$field_sort_default]['use_table_name'].'.';
                    }else{
                        //$this->logger->notice('group by case', $this->logger->logger_context);
                    }

                    if(isset($this->searchFields[$field_sort_default]['use_field_name'])){
                        $sort_field_name = $this->searchFields[$field_sort_default]['use_field_name'];
                    }else{
                        $sort_field_name = $field_sort_default;
                    }

                }else{
                    $sort_field_name = $field_sort_default;
                    $sort_table_name = $this->model->tableName.'.';
                }

                $return_order.= $sort_table_name.$sort_field_name;
                if(isset($this->searchFields[$field_sort_default]['sortOrder'])){
                    $return_order.=" ".$this->searchFields[$field_sort_default]['sortOrder'];
                }
            }
        }

        $qBuilder->order = $return_order;

        return $qBuilder;
    }
}