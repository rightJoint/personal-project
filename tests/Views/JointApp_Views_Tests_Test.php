<?php
//php ./vendor/bin/phpunit tests/Views/JointApp_Views_Tests_Test.php



class JointApp_Views_Tests_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'JointApp\Views\Test\SiteView_Test_Home',
            'JointApp\Views\Test\Connection\SiteView_Test_Conn_Home',
            'JointApp\Views\Test\Migrations\SiteView_Test_Migrations_DetailView',
            'JointApp\Views\Test\Migrations\SiteView_Test_Migrations_EditView',
            'JointApp\Views\Test\Migrations\SiteView_Test_Migrations_List',
            'JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log',
            'JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_DetailView',
            'JointApp\Views\Test\Migrations\SiteView_Test_Migrations_Log_EditView',
            'JointApp\Views\Test\Records\SiteView_Test_Records_DetailView',
            'JointApp\Views\Test\Records\SiteView_Test_Records_EditView',
            'JointApp\Views\Test\Records\SiteView_Test_Records_ListView',
            'JointApp\Views\Test\Records\SiteView_Test_Records_TblSelector',
            'JointApp\Views\Test\Tables\SiteView_Test_Tables',
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
            'JointApp\Views\Test\TpView_Test_Menu',
            'JointApp\Views\Test\TpView_Test_Home',

            'JointApp\Views\Test\Connection\TpView_Test_Conn_Home',
            'JointApp\Views\Test\Migrations\TpView_Detail_Migrations',
            'JointApp\Views\Test\Migrations\TpView_Test_MigrationsPanel',
            'JointApp\Views\Test\Records\TpView_Test_Records_TblSelector',
            'JointApp\Views\Test\Tables\TpView_Test_Tables',
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