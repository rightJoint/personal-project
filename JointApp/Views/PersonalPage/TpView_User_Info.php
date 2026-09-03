<?php

namespace JointApp\Views\PersonalPage;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;

class TpView_User_Info extends TpView
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


    public $css = ['pp-user-info' => '/css/pp/pp-user-info.css'];

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Home\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Info';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {
        if($this->pp_avatar){
            $avatar = SettingsEnv::USER_AVATARS_DIR.'/'.$this->pp_avatar;
        }else{
            $avatar = '/img/popimg/avatar-default.png';
        }


        if($this->pp_followed_by_id){
            $followed_txt = '<a href="'.$this->langSl.'/userinfo/'.$this->pp_followed_by_id.'">'.$this->pp_followed_by_name.'</a> ';
            $small_f = 'your account has been validated';
        }else{
            $small_f = 'your account isnt validated';
            $followed_txt = '-';
        }

        if($this->pp_blackList){
            $banned = 'checked';
            $small_b = 'your account is banned';
        }else{
            $small_b = 'your account isnt in black list';
            $banned = '';
        }



        $return = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<div class="pp-user-info">'.
            '<div class="pp-user-info-img"><img src="'.$avatar.'"></div>'.
            '<div class="pp-user-info-text">'.
            '<div class="pp-user-info-text-line"><span class="pp-label">ID:</span>'.$this->pp_user_id.'</div>'.
            '<div class="pp-user-info-text-line"><span class="pp-label">Login: </span>'.$this->pp_login.'</div>'.
            '<div class="pp-user-info-text-line"><span class="pp-label">Alias: </span>'.$this->pp_alias.'</div>'.
            '<div class="pp-user-info-text-line"><span class="pp-label">Reg. date: </span>'.$this->pp_regDate.'</div>'.
            '<div class="pp-user-info-text-line"><span class="pp-label">BirthDay: </span>'.$this->pp_birthDay.'</div>'.
            '<div class="pp-user-info-text-line"><span class="pp-label">Followed by: </span>'.$followed_txt.
            '<small>'.$small_f.'</small>'.
            '</div>'.
            '<div class="pp-user-info-text-line"><span class="pp-label">Black list: </span><input type="checkbox" disabled '.$banned.'">'.
            '<small>'.$small_b.'</small>'.
            '</div>'.
            '<div class="pp-user-info-text-line"><span class="pp-label">Pref/ lang: </span>'.$this->pp_pref_lang.'</div>'.
            '</div>'.
            '</div></div></div>';

        return $return;
    }
}