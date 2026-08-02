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
            $webView->setUpLangFiles();
            $webView->setUpCss();
            $webView->setUpJs();
            $webView->updateTpData();
            $webView->mkWebPage();
        }
    }

    public function testWebView():void
    {
        $langSet = ['ru', 'en'];

        for($i=1; $i<=count($langSet); $i++){
            $webView = new WebView();
            $webView->userLang = $langSet[$i-1];
            $webView->setUpLangFiles();
            $webView->setUpCss();
            $webView->setUpJs();
            $webView->updateTpData();
            $webView->mkWebPage();
        }
    }

    public function testErrorsView():void
    {
        $langSet = ['ru', 'en'];

        for($i=1; $i<=count($langSet); $i++){
            $webView = new \JointApp\Views\ErrorsView();
            $webView->userLang = $langSet[$i-1];
            $webView->setUpLangFiles();
            $webView->setUpCss();
            $webView->setUpJs();
            $webView->updateTpData();
            $webView->mkWebPage();
        }
    }

    public function testWebViewTemplates():void
    {
        $langSet = ['ru', 'en'];

        for($i=1; $i<=count($langSet); $i++){
            $userLang = $langSet[$i-1];

            $tpView_User = new \JointApp\Views\TpView_Errors();
            $tpView_User->setLangFile($tpView_User->loadViewLang($userLang));
            $tpView_User->renderView();

            $tpView_User = new TpView_ModalUser();
            $tpView_User->setLangFile($tpView_User->loadViewLang($userLang));
            $tpView_User->renderView();

            $tpView_Menu = new TpView_ModalMenu();
            $tpView_Menu->setLangFile($tpView_Menu->loadViewLang($userLang));
            $tpView_Menu->renderView();

            $tpView_Footer = new TpView_Footer();
            $tpView_Footer->setLangFile($tpView_Footer->loadViewLang($userLang));
            $tpView_Footer->renderView();

            $tpView_Header = new TpView_Header();
            $tpView_Header->setLangFile($tpView_Header->loadViewLang($userLang));
            $tpView_Header->renderView();

            $tpView_Head = new TpView_Head();
            $tpView_Head->setLangFile($tpView_Head->loadViewLang($userLang));
            $tpView_Head->renderView();

            $tpView = new \JointApp\Views\TpView();
            $tpView->setLangFile($tpView->loadViewLang($userLang));
            $tpView->renderView();
        }
    }
}