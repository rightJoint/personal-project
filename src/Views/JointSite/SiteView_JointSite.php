<?php


namespace Src\Views\JointSite;


use JointApp\Views\SiteView\SiteView;

class SiteView_JointSite extends SiteView
{
    public string $userLang = 'en';

    protected function putCustomTemplates():void
    {
        $this->tpSet->JointSiteMenu = new TpView_JointSite_Menu();
        $this->putArticleTemplate();
    }

    protected function putArticleTemplate()
    {

    }

    protected function handleTpJointSiteMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->JointSiteMenu->renderView().
            '</div></div></div>';
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JointSite_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JointSite_Header';
        return new $class_Name();
    }
}