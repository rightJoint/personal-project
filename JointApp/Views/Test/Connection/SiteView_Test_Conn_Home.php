<?php

namespace JointApp\Views\Test\Connection;


use JointApp\Views\Test\SiteView_Test_Home;
use JointApp\Views\Test\TpView_Test_Menu;


class SiteView_Test_Conn_Home extends SiteView_Test_Home
{
    public bool $serverConnectStatus = false;
    public bool $dbConnectStatus = false;
    public string $reason = '';
    public string $create_log = '';


    protected function putCustomTemplates():void
    {
        $this->tpSet->TestMenu = new TpView_Test_Menu();
        $this->tpSet->Home = new TpView_Test_Conn_Home();
    }

    protected function handleTpConn(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->Conn->getResponseHtml().
            '</div></div></div>';
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Connection\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_C_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Connection\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_T_C_Header';
        return new $class_Name();
    }
}