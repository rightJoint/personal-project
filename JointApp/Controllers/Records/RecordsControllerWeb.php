<?php

namespace JointApp\Controllers\Records;



use JointApp\Views\Records\TpView_Grid;
use JointApp\Views\Records\TpView_NavBar;

class RecordsControllerWeb extends RecordsController
{
    public string $list_frame_id = '';
    public string $h2 = '<-h2->';
    public string $pri_query = '?';
    protected bool $applyFilterRec = false;
    public string $type_of_view = 'edit';

    function htmlListView():void
    {
        $this->h2 = $this->list_frame_id;
        $this->h1 = $this->list_frame_id;
        $this->prepareListButtons();
    }

    public function htmlDetailView():void
    {
        $this->type_of_view = 'detail';
        $this->h2 = $this->list_frame_id;
        $this->prepareEditFields();
        $this->updateEditFieldsFromRecord();
        $this->queryFromPriFields();
    }

    public function htmlEditView():void
    {
        $this->h2 = $this->list_frame_id;

        $this->h2 = $this->list_frame_id;
        $this->prepareEditFields();
        $this->updateModelPriKeysFromRequest();
        if ($this->model->copyRecord()) {
            $this->queryFromPriFields();
            $this->updateEditFieldsFromRecord();
        }else{
            $this->logger->emergency($this->model->getLogMessage(),
                $this->context);
        }
    }

    public function htmlNewView():void
    {
        $this->type_of_view = "new";
        $this->h2=$this->list_frame_id;
        $this->prepareEditFields();
    }

    public function htmlDeleteView():void
    {
        $this->h2 = $this->list_frame_id;
        $this->type_of_view = 'delete';
        $this->prepareEditFields();
        $this->updateModelPriKeysFromRequest();
        $this->queryFromPriFields();
        if($this->model->copyRecord()){
            $this->prepareViewFields();
            $this->updateEditFieldsFromRecord();
        }else{
            $this->logger->emergency($this->model->getLogMessage(),
                $this->context);
        }
    }

    public function postNewView():void
    {
        if($this->action_result){
            //redirect
            $this->queryFromPriFields();
            $this->logger->redirect($this->processUri . '/editview' . $this->pri_query);
        }else{
            $this->action_result = $this->updateEditFieldsFromRecord();
            $this->type_of_view = "new";
            $this->h2=$this->list_frame_id;
        }
    }

    public function postDeleteView()
    {
        if($this->action_result){
            $this->logger->redirect($this->processUri);
        }else{
            $this->type_of_view = "new";
            $this->h2=$this->list_frame_id;
        }
    }

    protected function prepareListButtons():void
    {
        $replaceUrl = null;
        $buttons = [];
        foreach ($this->model->record as $fieldName => $fieldOpt){
            if(isset($fieldOpt['pri']) and $fieldOpt['pri'] = 1){

                $replaceUrl.=$fieldName.'='.$fieldName.'&';
                $buttons['btnDetail']['replaces'][] = $fieldName;
                $buttons['btnEdit']['replaces'][] = $fieldName;
                $buttons['btnDelete']['replaces'][] = $fieldName;
            }
        }
        $buttons['btnDetail']['format'] = 'link';
        $buttons['btnEdit']['format'] = 'link';
        $buttons['btnDelete']['format'] = 'link';

        $replaceUrl=substr($replaceUrl, 0, strlen($replaceUrl)-1);
        $buttons['btnDetail']['url'] = $replaceUrl;
        $buttons['btnEdit']['url'] = $replaceUrl;
        $buttons['btnDelete']['url'] = $replaceUrl;

        $this->listFields = array_merge($buttons, $this->listFields);
    }

    private function queryFromPriFields()
    {
        foreach ($this->model->record as $fieldName => $fieldOpt){
            if(isset($fieldOpt['pri']) and $fieldOpt['pri'] = 1){
                $this->pri_query .= $fieldName.'='.$fieldOpt['curVal'].'&';
            }
        }
        $this->pri_query=substr($this->pri_query, 0, strlen($this->pri_query)-1);
    }


    public function applyFilterView():void
    {
        if (isset($this->requestParams['applyFilterRec']) and $this->requestParams['applyFilterRec'] == 1) {

            $TpView_Grid = new TpView_Grid();
            $this->prepareSearchFields();
            $this->prepareListFields();
            $this->prepareListButtons();
            $this->getListRecords();
            $this->getListCount();
            $this->setUpViewParams($TpView_Grid);
            $TpView_Grid->setUpCustomLang($TpView_Grid->getDefaultLang());

            $TpView_NavBar = new TpView_NavBar();
            $this->setUpViewParams($TpView_NavBar);
            $TpView_NavBar->setUpCustomLang($TpView_NavBar->getDefaultLang($this->userLang));

            $this->responseJson = array(
                'listView' => $TpView_Grid->getResponseHtml(),
                'pgView' => $TpView_NavBar->paginationPrint(),
                'jsCtrlPanel' => $this->view::scriptListViewCrtlPannel($this->list_frame_id, $this->processUri, $this->slave_req),
            );
        }
    }

}