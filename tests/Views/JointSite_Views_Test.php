<?php
//php ./vendor/bin/phpunit tests/Views/JointSite_Views_Test.php

use JointApp\Views\SiteView\TpView_Head;
use JointApp\Views\SiteView\TpView_Header;
use JointApp\Views\SiteView\TpView_Footer;
use JointApp\Views\SiteView\TpView_ModalMenu;
use JointApp\Views\SiteView\TpView_ModalUser;
use JointApp\Views\WebView;
use JointApp\Views\SiteView\SiteView;


class JointSite_Views_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteView():void
    {
        $langSet = ['ru', 'en'];

        for($i=1; $i<=count($langSet); $i++){
            $webView = new SiteView();
            $webView->userLang = $langSet[$i-1];
            $webView->handleViewParams();
            $webView->setUpCustomLang($webView->getDefaultLang());
            $webView->getResponseHtml();
        }
    }

    public function testWebView():void
    {
        $langSet = ['ru', 'en'];

        for($i=1; $i<=count($langSet); $i++){
            $webView = new WebView();
            $webView->userLang = $langSet[$i-1];
            $webView->handleViewParams();
            $webView->setUpCustomLang($webView->getDefaultLang());
            $webView->getResponseHtml();
        }
    }

    public function testErrorsView():void
    {
        $langSet = ['ru', 'en'];

        for($i=1; $i<=count($langSet); $i++){
            $webView = new \JointApp\Views\ErrorsView();
            $webView->userLang = $langSet[$i-1];
            $webView->handleViewParams();
            $webView->setUpCustomLang($webView->getDefaultLang());
            $webView->getResponseHtml();
        }
    }

    public function testWebViewTemplates():void
    {
        $langSet = ['ru', 'en'];

        for($i=1; $i<=count($langSet); $i++){
            $userLang = $langSet[$i-1];

            $tpView_Err = new \JointApp\Views\TpView_Errors();
            $tpView_Err->userLang = $userLang;
            $tpView_Err->handleViewParams();
            $tpView_Err->setUpCustomLang($tpView_Err->getDefaultLang());
            $tpView_Err->getResponseHtml();

            $tpView_User = new TpView_ModalUser();
            $tpView_User->userLang = $userLang;
            $tpView_User->handleViewParams();
            $tpView_User->setUpCustomLang($tpView_User->getDefaultLang());
            $tpView_User->getResponseHtml();

            $tpView_Menu = new TpView_ModalMenu();
            $tpView_Menu->userLang = $userLang;
            $tpView_Menu->handleViewParams();
            $tpView_Menu->setUpCustomLang($tpView_Menu->getDefaultLang());
            $tpView_Menu->getResponseHtml();

            $tpView_Footer = new TpView_Footer();
            $tpView_Footer->userLang = $userLang;
            $tpView_Footer->handleViewParams();
            $tpView_Footer->setUpCustomLang($tpView_Footer->getDefaultLang());
            $tpView_Footer->getResponseHtml();

            $tpView_Header = new TpView_Header();
            $tpView_Header->userLang = $userLang;
            $tpView_Header->handleViewParams();
            $tpView_Header->setUpCustomLang($tpView_Header->getDefaultLang());
            $tpView_Header->getResponseHtml();

            $tpView_Head = new TpView_Head();
            $tpView_Head->userLang = $userLang;
            $tpView_Head->handleViewParams();
            $tpView_Head->setUpCustomLang($tpView_Head->getDefaultLang());
            $tpView_Head->getResponseHtml();

            $tpView = new \JointApp\Views\TpView();
            $tpView->userLang = $userLang;
            $tpView->handleViewParams();
            $tpView->setUpCustomLang($tpView->getDefaultLang());
            $tpView->getResponseHtml();
        }
    }
}