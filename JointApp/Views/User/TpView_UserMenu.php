<?php


namespace JointApp\Views\User;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;


class TpView_UserMenu extends TpView
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

    public function getResponseHtml():string
    {
        $return = '<div class="modal-line user-status">'.
            '<div class="modal-line-img">';
        if($this->u_avatar){
            $return .='<img src="'.SettingsEnv::USER_AVATARS_DIR.'/'.$this->u_avatar.'">';
        }else{
            $return .='<img src="/img/popimg/user-logo.png">';
        }
        $return .='</div>'.
            '<div class="modal-line-text">Вы: <a href="/pp" title="personal page" class="u-alias">'.$this->u_alias.'</a>'.
            '<sup><a href="/user/quit" title="quit account" class="u-quit">'.$this->langFile::USER_MENU_QUIT_ACCOUNT.'</a></sup>'.
            '<div><small>';
        if($this->u_isValid){
            $return .= $this->langFile::USER_MENU_NOT_VALID;
        }else{
            $return .= $this->langFile::USER_MENU_IS_VALID;
        }
        $return .='</small></div></div>'.
            '</div>'.
            '<div class="modal-line">'.
            '<div class="modal-line-img"><img src="/img/popimg/test-logo.png"></div>'.
            '<div class="modal-line-text">Сменить пароль</div>'.
            '</div>';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\User\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_User_Menu';
        return new $class_Name();
    }

}