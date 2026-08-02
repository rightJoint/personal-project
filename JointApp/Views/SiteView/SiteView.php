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
    public bool $userUserActive = false;

    protected function handleTpHeader():string
    {
        return '<!DOCTYPE html>'.
            '<html lang="'.$this->userLang.'">'.
            '<body>'.
            '<div class="page-wrap">'.
            $this->tpSet->Header->renderView();
    }

    protected function handleTpFooter():string
    {
        return $this->tpSet->Footer->renderView().'</div>';
    }

    protected function handleTpModalUser():string
    {
        return  $this->tpSet->ModalUser->renderView().
        '</body>'.
        '</html>';
    }
}