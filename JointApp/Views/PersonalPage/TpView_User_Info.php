<?php

namespace JointApp\Views\PersonalPage;


use JointApp\Views\TpView;

class TpView_User_Info extends TpView
{
    //user info
    public string $u_user_id = '';
    public string $u_alias = '';
    public bool $u_blackList = false;
    public string $u_followed_by = '';
    public string $u_avatar = '';
    public string $u_login = '';
    public bool $u_isAuth = false;
    public bool $u_isValid = false;
    public bool $u_isAdmin = false;


    public $css = ['pp-user-info' => '/css/pp/pp-user-info.css'];

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Home\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Info';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {

        if($this->u_avatar){
            $avatar = '/img/popimg/avatar-default.png';
        }else{
            $avatar = '/img/popimg/user-logo.png';
        }

        $return = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<div class="pp-user-info">'.
            '<div class="pp-user-info-img"><img src="'.$avatar.'"></div>'.
            '<div class="pp-user-info-id">'.$this->u_user_id.'</div>'.
            '<div class="pp-user-info-login">'.$this->u_login.'</div>'.
            '<div class="pp-user-info-alias">'.$this->u_alias.'</div>'.
            '<div class="pp-user-info-vby">alias</div>'.
            '</div>'.
            '</div></div></div>';

        return $return;
    }
}