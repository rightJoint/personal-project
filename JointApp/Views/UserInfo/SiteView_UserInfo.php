<?php

namespace JointApp\Views\UserInfo;


use JointApp\Views\SiteView\SiteView;

class SiteView_UserInfo extends SiteView
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
    public string $pp_followed_by_name = '';

    protected function putCustomTemplates():void
    {
        $this->tpSet->PpUserInfo = new TpView_UserInfo();
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\UserInfo\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_UserInfo_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\UserInfo\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_UserInfo_Header';
        return new $class_Name();
    }
}