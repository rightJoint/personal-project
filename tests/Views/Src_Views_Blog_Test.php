<?php
//php ./vendor/bin/phpunit tests/Views/Src_Views_Blog_Test.php



class Src_Views_Blog_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'Src\Views\Blog\HomePage\SiteView_Blog_HomePage',
            'Src\Views\Blog\SiteView_Blog_Art',
            'Src\Views\Blog\SiteView_Blog_Main',
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
            'Src\Views\Blog\HomePage\TpView_Blog_Bottom',
            'Src\Views\Blog\HomePage\TpView_Blog_Top',
            'Src\Views\Blog\TpView_Blog_Art_Comments',
            'Src\Views\Blog\TpView_Blog_Art_Header',
            'Src\Views\Blog\TpView_Blog_Art_InfoBar',
            'Src\Views\Blog\TpView_Blog_Filter',
            'Src\Views\Blog\TpView_Blog_Options',
            'Src\Views\Blog\TpView_Blog_Table',
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