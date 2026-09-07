<?php


namespace JointApp\Controllers\Records;


class RecordsControllerApi extends RecordsController
{
    public function getListRecordsApi():void
    {
        $this->prepareSearchFields();
        $this->prepareListFields();
        parent::getListRecords();
        $this->responseJson['listRecords'] = $this->listRecords;
    }

    public function getListCountApi():void
    {
        $this->prepareSearchFields();
        parent::getListCount();
        $this->responseJson['listCount'] = $this->listCount;
    }

    public function actionDetailApi():void
    {
        $this->prepareSearchFields();
        $this->prepareViewFields();
        parent::actionDetail();
        $this->responseJson['viewFields'] = $this->viewFields;
    }

    public function actionEditApi():void
    {
        parent::actionEdit();
        $this->responseJson = [
            'action_result' => $this->action_result,
            'action_log' => $this->action_log,
            'editFields' => $this->editFields,
        ];
    }

    public function actionNewApi():void
    {
        parent::actionNew();
        $this->responseJson = [
            'action_result' => $this->action_result,
            'action_log' => $this->action_log,
        ];
    }

    public function actionDeleteApi()
    {
        parent::actionDelete();
        $this->responseJson = [
            'action_result' => $this->action_result,
            'action_log' => $this->action_log,
        ];
    }

    protected function checkAccessController(): bool
    {
        return $this->user->isAdmin();
    }
}