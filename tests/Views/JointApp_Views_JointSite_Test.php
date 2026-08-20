<?php
//php ./vendor/bin/phpunit tests/Views/JointApp_Views_JointSite_Test.php



class JointApp_Views_JointSite_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'JointApp\Views\JointSite\SiteView_JointSite',

            'JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy',
            'JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy_OpenServer',
            'JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy_Hosting',
            'JointApp\Views\JointSite\Deploy\SiteView_JointSite_Deploy_Migrations',

            'JointApp\Views\JointSite\Design\SiteView_JointSite_Arch',
            'JointApp\Views\JointSite\Design\SiteView_JointSite_A_Dir',
            'JointApp\Views\JointSite\Design\SiteView_JointSite_A_Lc',
            'JointApp\Views\JointSite\Design\SiteView_JointSite_A_App',
            'JointApp\Views\JointSite\Design\SiteView_JointSite_A_Mvc',

            'JointApp\Views\JointSite\Lang\SiteView_JointSite_Lang_About',

            'JointApp\Views\JointSite\Model\SiteView_JointSite_Model_About',

            'JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_About',
            'JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_TpView',
            'JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_WebView',
            'JointApp\Views\JointSite\Design\View\SiteView_JointSite_D_V_SiteView',

            'JointApp\Views\JointSite\Controller\SiteView_JointSite_Controller_About',

            'JointApp\Views\JointSite\User\SiteView_JointSite_User_About',

            'JointApp\Views\JointSite\Tests\SiteView_JointSite_Tests_About',
        );

        for($i=1; $i<=count($langSet); $i++){
            foreach ($Ns as $class){
                $SiteView = new $class();
                $SiteView->userLang = $langSet[$i-1];
                $SiteView->handleViewParams();
                $SiteView->setUpCustomLang($SiteView->getDefaultLang());
                $SiteView->getResponseHtml();
            }
        }
    }

    public function testTemplateViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'JointApp\Views\JointSite\TpView_JointSite_Menu',

            'JointApp\Views\JointSite\Deploy\TpView_JointSite_Deploy_Art',
            'JointApp\Views\JointSite\Deploy\TpView_JointSite_Deploy_OpenServer',
            'JointApp\Views\JointSite\Deploy\TpView_JointSite_Deploy_Hosting',
            'JointApp\Views\JointSite\Deploy\TpView_JointSite_Deploy_Migrations',

            'JointApp\Views\JointSite\Design\TpView_JointSite_Arch_Article',
            'JointApp\Views\JointSite\Design\TpView_JointSite_A_Dir_Article',
            'JointApp\Views\JointSite\Design\TpView_JointSite_A_Lc_Article',
            'JointApp\Views\JointSite\Design\TpView_JointSite_A_App_Article',
            'JointApp\Views\JointSite\Design\TpView_JointSite_A_Mvc_Article',

            'JointApp\Views\JointSite\Lang\TpView_JointSite_Lang_About_Art',

            'JointApp\Views\JointSite\Model\TpView_JointSite_Model_About_Art',

            'JointApp\Views\JointSite\Design\View\TpView_JointSite_D_V_About_Article',
            'JointApp\Views\JointSite\Design\View\TpView_JointSite_D_V_TpView',
            'JointApp\Views\JointSite\Design\View\TpView_JointSite_D_V_WebView',
            'JointApp\Views\JointSite\Design\View\TpView_JointSite_D_V_SiteView',
            'JointApp\Views\JointSite\TpView_JointSite_About',

            'JointApp\Views\JointSite\Controller\TpView_JointSite_Controller_About_Art',

            'JointApp\Views\JointSite\User\TpView_JointSite_User_About_Art',

            'JointApp\Views\JointSite\Tests\TpView_JointSite_Tests_About_Art',
        );

        for($i=1; $i<=count($langSet); $i++){
            $userLang = $langSet[$i-1];
            foreach ($Ns as $class){
                $tpView = new $class();
                $tpView->setUpCustomLang($tpView->getDefaultLang($userLang));
                $tpView->getResponseHtml();
            }
        }
    }
}