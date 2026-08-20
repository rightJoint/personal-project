<?php

namespace JointApp\Views\Test\Tables;


use JointApp\Views\SiteView\SiteView;
use JointApp\Views\Test\TpView_Test_Menu;

class SiteView_Test_Tables extends SiteView
{
    public bool $robotNoIndex = true;

    public $tablesList = [];

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Tables\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_T_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Tables\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_T_Header';
        return new $class_Name();
    }

    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->TestTables = new TpView_Test_Tables();
    }

    protected function handleTpTestMenu(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->TestMenu->getResponseHtml().
            '</div></div></div>';
    }

    public function setUpCss():void
    {
        $this->css['preloader'] = '/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css';
        parent::setUpCss();;
    }

    public function setUpJs():void
    {
        $this->js['preloader'] = '/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js';
        parent::setUpJs();
    }
}