<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\WebView;

class SiteView extends WebView
{
    public bool $robotNoIndex = false;
    public string $siteName = 'http://personal-project.web';
    public string $shortcutIcon = '/img/siteLogo/favicon.png';
    public string $langSl = '';
    public string $canonical = '';
    public string $logo = '/img/siteLogo/rightjoint-logo-150.png';
    public bool $modalMenuActive = false;
    public bool $modalUserActive = false;

    protected function handleTpHeader():string
    {
        return '<!DOCTYPE html>'.
            '<html lang="'.$this->userLang.'">'.
            '<body>'.
            '<div class="page-wrap">'.
            $this->tpSet->Header->getResponseHtml();
    }

    protected function handleTpFooter():string
    {
        return $this->tpSet->Footer->getResponseHtml().'</div>';
    }

    protected function handleTpModalUser():string
    {
        return  $this->tpSet->ModalUser->getResponseHtml().
        '</body>'.
        '</html>';
    }
    //get all js from each tp-view
    protected function setUpJs():void
    {
        parent::setUpJs();
        $this->tpSet->Head->js_set = $this->js_set;
    }

    //get all css from each tp-view
    protected function setUpCss():void
    {
        parent::setUpCss();
        $this->tpSet->Head->css_set = $this->css_set;
    }
}