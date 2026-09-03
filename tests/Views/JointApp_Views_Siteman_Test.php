<?php
//php ./vendor/bin/phpunit tests/Views/JointApp_Views_Siteman_Test.php



class JointApp_Views_Siteman_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testSiteViews():void
    {
        $langSet = ['ru', 'en'];

        $Ns = array(
            'JointApp\Views\Siteman\Robots\SiteView_Siteman_Robots_Update',
            'JointApp\Views\Siteman\Sitemap\SiteView_Siteman_Sitemap_Update',
            'JointApp\Views\Siteman\SitemanDetailView',
            'JointApp\Views\Siteman\SitemanEditView',
            'JointApp\Views\Siteman\SitemanListView',
            'JointApp\Views\Siteman\SiteView_Siteman_Main',
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
            'JointApp\Views\Siteman\Robots\TpView_Siteman_Robots_Update',
            'JointApp\Views\Siteman\Sitemap\TpView_Siteman_Sitemap_Update',
            'JointApp\Views\Siteman\TpView_Siteman_ModulesMenu',
            'JointApp\Views\Siteman\TpView_Siteman_SubMenu',
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