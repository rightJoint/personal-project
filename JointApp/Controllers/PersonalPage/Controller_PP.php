<?php

namespace JointApp\Controllers\PersonalPage;


use JointApp\Controllers\ControllerWeb;

class Controller_PP extends ControllerWeb
{
    public string $pp_user_id = '';
    public string $pp_login = '';
    public string $pp_alias = '';
    public string $pp_regDate = '';
    public string $pp_avatar = '';
    public bool $pp_blackList = false;
    public string $pp_followed_by_id = '';
    public string $pp_pref_lang = 'ru';
    public string $pp_birthDay = '';

    public function actionIndex()
    {
        $this->getUserInfo();
    }

    public function getUserInfo()
    {
        $this->model->record['user_id']['curVal'] = $this->user->getId();
        $this->model->copyRecord();
        $this->pp_user_id = $this->model->record['user_id']['curVal'];
        $this->pp_login = $this->model->record['login']['curVal'];
        $this->pp_alias = $this->model->record['alias']['curVal'];
        $this->pp_regDate = $this->model->record['regDate']['curVal'];
        if($this->model->record['birthDay']['curVal']){
            $this->pp_birthDay = $this->model->record['birthDay']['curVal'];
        }
        $this->pp_avatar = $this->model->record['avatar']['curVal'];
        $this->pp_blackList = $this->model->record['blackList']['curVal'];
        if($this->model->record['followed_by']['curVal']){
            $this->pp_followed_by_id = $this->model->record['followed_by']['curVal'];
        }
        $this->pp_pref_lang = $this->model->record['pref_lang']['curVal'];
    }

    protected function checkAccessController():bool
    {
        return $this->user->isAuth();
    }

    public function editUserInfo()
    {
        $this->model->record['user_id']['curVal'] = $this->user->getId();
        $this->model->copyRecord();
        if(isset($this->requestParams['birthDay'])){
            $this->model->record['birthDay']['curVal'] = $this->requestParams['birthDay'];
        }
        if(isset($this->requestParams['pref_lang'])){
            $this->model->record['pref_lang']['curVal'] = $this->requestParams['pref_lang'];
        }
        if(isset($this->requestParams['newAlias'])){
            $this->model->record['alias']['curVal'] = $this->requestParams['newAlias'];
        }
        $this->model->updateRecord();
    }
}