<?php

namespace JointApp\Controllers\UserInfo;


use JointApp\Controllers\ControllerWeb;

class Controller_UserInfo extends ControllerWeb
{
    //user info
    public string $pp_user_id = '';
    public string $pp_login = '';
    public string $pp_alias = '';
    public string $pp_regDate = '';
    public string $pp_avatar = '';
    public bool $pp_blackList = false;
    public string $pp_followed_by_id = '';
    public string $pp_pref_lang = 'ru';
    public string $pp_birthDay = '';
    public string $pp_followed_by_name = '';
    public string $user_id = '';


    public function actionIndex()
    {
        $this->model->record['user_id']['curVal'] = $this->user_id;
        $this->model->copyRecord();
        $this->updateParamsFromModel();
    }

    public function updateParamsFromModel():void
    {
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
        $this->pp_followed_by_name = $this->model->record['followed_by_name']['curVal'];
    }
}