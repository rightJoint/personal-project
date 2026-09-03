<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\WebView;

class SiteView extends WebView
{
    public bool $robotNoIndex = false;
    public string $siteName = 'http://personal-project.web';
    public string $shortcutIcon = '/img/siteLogo/favicon.png';
    public string $canonical = '';
    public string $logo = '/img/siteLogo/rightjoint-logo-150.png';
    public bool $modalMenuActive = false;
    public bool $modalUserActive = false;

    //user info
    public string $u_user_id = '';
    public string $u_alias = '';
    public bool $u_blackList = false;
    public string $u_followed_by = '';
    public string $u_avatar = '';
    public string $u_login = '';
    public bool $u_isAuth = false;
    public bool $u_isValid = false;
    public bool $u_isAdmin = false;

    //signUp form
    public bool $signUpFlag = false;
    public string $signUpUserLogin = '';
    public string $signUpUserPassword = '';
    public string $signUpPasswordRepeat = '';
    public bool $signUpErrLoginAccept = false;
    public bool $signUpErrLoginReserved = false;
    public bool $signUpErrPassAccept = false;
    public bool $signUpErrPassMatch = false;
    public bool $signUpErrCaptchaEmpty = false;
    public bool $signUpErrCaptchaWrong = false;
    public bool $signUpErrUnknown = false;
    //signIn form
    public bool $signInFlag = true;
    public string $signInUserLogin = '';
    public string $signInUserPassword = '';
    public bool $signInErrNotFound = false;
    public bool $signInErrBlackList = false;
    public bool $signInErrLogin = false;
    public bool $signInErrPass = false;
    public bool $signInErrWrongPass = false;


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