<?php

namespace JointApp\Views\Siteman;


use JointApp\Views\SiteView\SiteView;

class SiteView_SiteMan_Main extends SiteView
{

    public function handleTpModulesMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->ModulesMenu->getResponseHtml().
            '</div></div></div>';
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Siteman\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_Siteman_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Siteman\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_Siteman_Header';
        return new $class_Name();
    }

    public function putCustomTemplates(): void
    {
        $this->tpSet->ModulesMenu = new TpView_Siteman_ModulesMenu();
    }
}