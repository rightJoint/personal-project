<?php


namespace JointApp\Views\JointSite;


use JointApp\Views\SiteView\SiteView;

class SiteView_JointSite extends SiteView
{
    public string $logo = '/img/popimg/menu-icon.png';

    protected function putCustomTemplates():void
    {
        $this->tpSet->JointSiteMenu = new TpView_JointSite_Menu();
        $this->putArticleTemplate();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->About = new TpView_JointSite_About();
    }

    protected function handleTpJointSiteMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->JointSiteMenu->getResponseHtml().
            '</div></div></div>';
    }

    protected function handleTpAbout(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->About->getResponseHtml().
            '</div></div></div>';
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JointSite_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JointSite_Header';
        return new $class_Name();
    }
}