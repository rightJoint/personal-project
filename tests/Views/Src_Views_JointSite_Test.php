<?php
//php ./vendor/bin/phpunit tests/Views/Src_Views_JointSite_Test.php



class Src_Views_JointSite_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'Src\Views\JointSite\SiteView_JointSite',

            'Src\Views\JointSite\Deploy\SiteView_JointSite_Deploy',
            'Src\Views\JointSite\Deploy\SiteView_JointSite_Deploy_OpenServer',
            'Src\Views\JointSite\Deploy\SiteView_JointSite_Deploy_Hosting',
            'Src\Views\JointSite\Deploy\SiteView_JointSite_Deploy_Migrations',

            'Src\Views\JointSite\Design\SiteView_JointSite_Arch',
            'Src\Views\JointSite\Design\SiteView_JointSite_A_Dir',
            'Src\Views\JointSite\Design\SiteView_JointSite_A_Lc',
            'Src\Views\JointSite\Design\SiteView_JointSite_A_App',
            'Src\Views\JointSite\Design\SiteView_JointSite_A_Mvc',

            'Src\Views\JointSite\Lang\SiteView_JointSite_Lang_About',

            'Src\Views\JointSite\Model\SiteView_JointSite_Model_About',

            'Src\Views\JointSite\Design\View\SiteView_JointSite_D_V_About',
            'Src\Views\JointSite\Design\View\SiteView_JointSite_D_V_TpView',
            'Src\Views\JointSite\Design\View\SiteView_JointSite_D_V_WebView',
            'Src\Views\JointSite\Design\View\SiteView_JointSite_D_V_SiteView',

            'Src\Views\JointSite\Controller\SiteView_JointSite_Controller_About',

            'Src\Views\JointSite\User\SiteView_JointSite_User_About',

            'Src\Views\JointSite\Tests\SiteView_JointSite_Tests_About',
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
            'Src\Views\JointSite\TpView_JointSite_Menu',

            'Src\Views\JointSite\Deploy\TpView_JointSite_Deploy_Art',
            'Src\Views\JointSite\Deploy\TpView_JointSite_Deploy_OpenServer',
            'Src\Views\JointSite\Deploy\TpView_JointSite_Deploy_Hosting',
            'Src\Views\JointSite\Deploy\TpView_JointSite_Deploy_Migrations',

            'Src\Views\JointSite\Design\TpView_JointSite_Arch_Article',
            'Src\Views\JointSite\Design\TpView_JointSite_A_Dir_Article',
            'Src\Views\JointSite\Design\TpView_JointSite_A_Lc_Article',
            'Src\Views\JointSite\Design\TpView_JointSite_A_App_Article',
            'Src\Views\JointSite\Design\TpView_JointSite_A_Mvc_Article',

            'Src\Views\JointSite\Lang\TpView_JointSite_Lang_About_Art',

            'Src\Views\JointSite\Model\TpView_JointSite_Model_About_Art',

            'Src\Views\JointSite\Design\View\TpView_JointSite_D_V_About_Article',
            'Src\Views\JointSite\Design\View\TpView_JointSite_D_V_TpView',
            'Src\Views\JointSite\Design\View\TpView_JointSite_D_V_WebView',
            'Src\Views\JointSite\Design\View\TpView_JointSite_D_V_SiteView',
            'Src\Views\JointSite\TpView_JointSite_About',

            'Src\Views\JointSite\Controller\TpView_JointSite_Controller_About_Art',

            'Src\Views\JointSite\User\TpView_JointSite_User_About_Art',

            'Src\Views\JointSite\Tests\TpView_JointSite_Tests_About_Art',
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