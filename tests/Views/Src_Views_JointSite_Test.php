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
          'Src\Views\JointSite\Design\View\SiteView_JointSite_D_V_TpView',
          'Src\Views\JointSite\Design\View\SiteView_JointSite_D_V_WebView',
          'Src\Views\JointSite\Design\View\SiteView_JointSite_D_V_SiteView',
        );

        for($i=1; $i<=count($langSet); $i++){
            foreach ($Ns as $class){
                $SiteView = new $class();
                $SiteView->userLang = $langSet[$i-1];
                $SiteView->setUpLangFiles();
                $SiteView->setUpCss();
                $SiteView->setUpJs();
                $SiteView->updateTpData();
                $SiteView->mkWebPage();
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
            'Src\Views\JointSite\Design\View\TpView_JointSite_D_V_TpView',
            'Src\Views\JointSite\Design\View\TpView_JointSite_D_V_WebView',
            'Src\Views\JointSite\Design\View\TpView_JointSite_D_V_SiteView',
            'Src\Views\JointSite\TpView_JointSite_About',
        );

        for($i=1; $i<=count($langSet); $i++){
            $userLang = $langSet[$i-1];
            foreach ($Ns as $class){
                $tpView = new $class();
                $tpView->setLangFile($tpView->loadViewLang($userLang));
                $tpView->renderView();
            }
        }
    }
}