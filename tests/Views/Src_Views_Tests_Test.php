<?php
//php ./vendor/bin/phpunit tests/Views/Src_Views_Tests_Test.php



class Src_Views_Tests_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'Src\Views\Test\SiteView_Test_Home',
            'Src\Views\Test\Connection\SiteView_Test_Conn_Home',
            'Src\Views\Test\Migrations\SiteView_Test_Migrations_DetailView',
            'Src\Views\Test\Migrations\SiteView_Test_Migrations_EditView',
            'Src\Views\Test\Migrations\SiteView_Test_Migrations_List',
            'Src\Views\Test\Migrations\SiteView_Test_Migrations_Log',
            'Src\Views\Test\Migrations\SiteView_Test_Migrations_Log_DetailView',
            'Src\Views\Test\Migrations\SiteView_Test_Migrations_Log_EditView',
            'Src\Views\Test\Records\SiteView_Test_Records_DetailView',
            'Src\Views\Test\Records\SiteView_Test_Records_EditView',
            'Src\Views\Test\Records\SiteView_Test_Records_ListView',
            'Src\Views\Test\Records\SiteView_Test_Records_TblSelector',
            'Src\Views\Test\Tables\SiteView_Test_Tables',
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
            'Src\Views\Test\TpView_Test_Menu',
            'Src\Views\Test\TpView_Test_Home',

            'Src\Views\Test\Connection\TpView_Test_Conn_Home',
            'Src\Views\Test\Migrations\TpView_Detail_Migrations',
            'Src\Views\Test\Migrations\TpView_Test_MigrationsPanel',
            'Src\Views\Test\Records\TpView_Test_Records_TblSelector',
            'Src\Views\Test\Tables\TpView_Test_Tables',
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