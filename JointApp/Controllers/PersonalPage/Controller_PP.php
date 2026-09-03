<?php

namespace JointApp\Controllers\PersonalPage;


use JointApp\Controllers\ControllerWeb;

class Controller_PP extends ControllerWeb
{
    //update user info
    public string $pp_user_id = '';
    public string $pp_login = '';
    public string $pp_alias = '';
    public string $pp_regDate = '';
    public string $pp_avatar = '';
    public bool $pp_blackList = false;
    public string $pp_followed_by_id = '';
    public string $pp_pref_lang = 'ru';
    public string $pp_birthDay = '';
    public bool $errAlias = false;
    public bool $pp_update_info_susses = false;
    public string $pp_followed_by_name = '';

    //change user password
    public string $pp_cur_pass = '';
    public string $pp_new_pass = '';
    public string $pp_repeat_pass = '';
    public bool $pp_err_pass_unacceptable = false;
    public bool $pp_err_pass_doent_match = false;
    public bool $pp_changed_susses = false;
    public bool $pp_err_cur_pass_incorrect = false;

    public function actionIndex()
    {
        $this->getUserInfo();
    }

    public function getUserInfo()
    {
        $this->model->record['user_id']['curVal'] = $this->user->getId();
        $this->model->copyRecord();
        $this->updateParamsFromModel();
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
            if(!$this->model->checkUserAlias($this->model->record['alias']['curVal'])){
                $this->errAlias = true;
            }
        }
        if(!$this->errAlias){
            $this->model->updateRecord();
            $this->pp_update_info_susses = true;
        }
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

    public function changeUserPassword():void
    {
        $this->model->record['user_id']['curVal'] = $this->user->getId();
        $this->model->copyRecord();

        $this->pp_cur_pass = $this->requestParams['pp_cur_pass'];
        $this->pp_new_pass = $this->requestParams['pp_new_pass'];
        $this->pp_repeat_pass = $this->requestParams['pp_repeat_pass'];

        $err = false;

        if($this->user::checkUserPassword($this->pp_cur_pass)){
            if (password_verify($this->pp_cur_pass, $this->model->record['pw_hash']['curVal'])) {
                if($this->user::checkUserPassword($this->pp_new_pass)){
                    if(!$this->pp_new_pass == $this->pp_repeat_pass){
                        $this->pp_err_pass_doent_match = true;
                        $err = true;
                    }
                }else{
                    $this->pp_err_pass_unacceptable = true;
                    $err = true;
                }
            }else{
                $this->pp_err_cur_pass_incorrect = true;
                $err = true;
            }
        }else{
            $this->pp_err_cur_pass_incorrect = true;
            $err = true;
        }

        if(!$err){
            $this->model->record['pw_hash']['curVal'] = password_hash($this->pp_new_pass, PASSWORD_DEFAULT);
            $this->model->updateRecord();
            $this->pp_changed_susses = true;
        }
    }
}