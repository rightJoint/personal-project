<?php
//php ./vendor/bin/phpunit tests/Views/JointApp_Views_UserInfo_Test.php



class JointApp_Views_UserInfo_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'JointApp\Views\UserInfo\SiteView_UserInfo',
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
        );

        for($i=1; $i<=count($langSet); $i++){
            $userLang = $langSet[$i-1];
            foreach ($Ns as $class){
                $tpView = new $class();
                $tpView->handleViewParams();
                $tpView->setUpCustomLang($tpView->getDefaultLang());
                $tpView->getResponseHtml();
            }
        }
    }
}