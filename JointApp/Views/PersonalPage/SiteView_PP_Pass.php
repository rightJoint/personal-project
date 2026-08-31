<?php

namespace JointApp\Views\PersonalPage;


use JointApp\Views\SiteView\SiteView;

class SiteView_PP_Pass extends SiteView
{
    public bool $robotNoIndex = true;

    public string $pp_cur_pass = '';
    public string $pp_new_pass = '';
    public string $pp_repeat_pass = '';
    public bool $pp_err_pass_unacceptable = false;
    public bool $pp_err_pass_doent_match = false;
    public bool $pp_changed_susses = false;
    public bool $pp_err_cur_pass_incorrect = false;


    protected function putCustomTemplates():void
    {
        $this->tpSet->PpUserMenu = new TpView_PP_UserMenu();
        $this->tpSet->PpUserPass = new TpView_PP_Pass();
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Pass\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Pass_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Pass\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Pass_Header';
        return new $class_Name();
    }
}