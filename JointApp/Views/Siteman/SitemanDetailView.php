<?php


namespace JointApp\Views\Siteman;


use JointApp\Views\Records\RecordDetailView;
use JointApp\Views\Test\TpView_Test_Menu;

class SitemanDetailView extends RecordDetailView
{
    public string $list_frame_id = '';

    protected function putCustomTemplates():void
    {
        $this->tpSet->ModulesMenu = new TpView_Siteman_ModulesMenu();
        $this->tpSet->SubMenu = new TpView_Siteman_SubMenu();
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