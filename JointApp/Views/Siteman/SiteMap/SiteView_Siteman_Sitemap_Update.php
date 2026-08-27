<?php

namespace JointApp\Views\Siteman\SiteMap;


use JointApp\Views\Siteman\TpView_Siteman_ModulesMenu;
use JointApp\Views\Siteman\TpView_Siteman_SubMenu;
use JointApp\Views\SiteView\SiteView;

class SiteView_Siteman_Sitemap_Update extends SiteView
{
    public string $list_frame_id = '';

    protected function putCustomTemplates():void
    {
        $this->tpSet->ModulesMenu = new TpView_Siteman_ModulesMenu();
        $this->tpSet->SubMenu = new TpView_Siteman_SubMenu();
        $this->tpSet->SubMenu = new TpView_Siteman_Sitemap_Update();
        parent::putCustomTemplates();
    }

    protected function handleTpModulesMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->ModulesMenu->getResponseHtml().
            '</div></div></div>';
    }

    protected function handleTpSubMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->SubMenu->getResponseHtml().
            '</div></div></div>';
    }
}