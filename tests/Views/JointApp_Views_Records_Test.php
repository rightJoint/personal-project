<?php
//php ./vendor/bin/phpunit tests/Views/JointApp_Views_Records_Test.php



class JointApp_Views_Records_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'JointApp\Views\Records\RecordListView',
            'JointApp\Views\Records\RecordDetailView',
            'JointApp\Views\Records\RecordEditView',
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
            'JointApp\Views\Records\TpView_Detail',

            'JointApp\Views\Records\TpView_Edit',
            'JointApp\Views\Records\TpView_FilterPanel',
            'JointApp\Views\Records\TpView_Grid',
            'JointApp\Views\Records\TpView_NavBar',
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