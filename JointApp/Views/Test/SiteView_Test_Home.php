<?php

namespace JointApp\Views\Test;


use JointApp\Views\SiteView\SiteView;


class SiteView_Test_Home extends SiteView
{
    public string $logo = '/img/popimg/test-logo.png';
    public string $shortcutIcon = '/img/popimg/test-logo.png';
    public bool $robotNoIndex = true;

    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->Home = new TpView_Test_Home();
    }

    protected function handleTpTestMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TestMenu->getResponseHtml().
            '</div></div></div>';
    }

    protected function handleTpHome(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->Home->getResponseHtml().
            '</div></div></div>';
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Home\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_H_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Home\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_H_Header';
        return new $class_Name();
    }
}