<?php

namespace JointApp\Views\PersonalPage;


use JointApp\Views\SiteView\SiteView;

class SiteView_PP_Home extends SiteView
{
    public bool $robotNoIndex = true;

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

    protected function putCustomTemplates():void
    {
        $this->tpSet->PpUserMenu = new TpView_PP_UserMenu();
        $this->tpSet->PpUserInfo = new TpView_User_Info();
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Home\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Home_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Home\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Home_Header';
        return new $class_Name();
    }
}