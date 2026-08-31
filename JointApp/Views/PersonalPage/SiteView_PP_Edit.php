<?php

namespace JointApp\Views\PersonalPage;


use JointApp\Views\SiteView\SiteView;

class SiteView_PP_Edit extends SiteView
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
    public bool $errAlias = false;
    public bool $pp_update_info_susses = false;

    protected function putCustomTemplates():void
    {
        $this->tpSet->PpUserMenu = new TpView_PP_UserMenu();
        $this->tpSet->PpUserInfo = new TpView_PP_Edit();
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Edit\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Edit_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Edit\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Edit_Header';
        return new $class_Name();
    }
}