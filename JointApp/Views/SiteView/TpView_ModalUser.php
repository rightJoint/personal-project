<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;
use JointApp\Views\User\TpView_UserAuthForm;
use JointApp\Views\User\TpView_UserMenu;

class TpView_ModalUser extends TpView
{
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


    public bool $modalUserActive = false;

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

    public bool $signInFlag = true;
    public string $signInUserLogin = '';
    public string $signInUserPassword = '';
    public bool $signInErrNotFound = false;
    public bool $signInErrBlackList = false;
    public bool $signInErrLogin = false;
    public bool $signInErrPass = false;
    public bool $signInErrWrongPass = false;

    protected $css = array(
        'modals' => '/css/WebView/modals.css',
    );

    protected $js = array(
        'modals' => '/js/modals.js',
    );

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_ModalUser';
        return new $class_Name();
    }


    private TpView_UserAuthForm $tpAuthForm;
    private TpView_UserMenu $tpUserMenu;

    public function __construct()
    {
        $this->tpUserMenu = new TpView_UserMenu();
        $this->tpAuthForm = new TpView_UserAuthForm();
    }

    public function handleViewParams(): void
    {
        if($this->u_isAuth){
            //update user menu
            foreach ($this->tpUserMenu as $key => $val){
                if(isset($this->$key)){
                    $this->tpUserMenu->$key = $this->$key;
                }
            }
            $this->tpUserMenu->handleViewParams();
        }else{
            //update auth forms
            foreach ($this->tpAuthForm as $key => $val){
                if(isset($this->$key)){
                    $this->tpAuthForm->$key = $this->$key;
                }
            }
            $this->tpAuthForm->handleViewParams();
        }
    }

    public function getCss(): array
    {
        return array_merge($this->css, $this->tpAuthForm->getCss());
    }

    public function getResponseHtml():string
    {
        $active_modal_menu_style = null;

        if ($this->modalUserActive ==  true) {
            $active_modal_menu_style = 'style="opacity: 1; visibility: visible"';
        }

        $return = '<div class="modal user" '.$active_modal_menu_style.'>'.
            '<div class="overlay" '.$active_modal_menu_style.'></div><div class="contentBlock-frame">'.
            '<div class="contentBlock-center"><div class="modal-right"><div class="modal-close"></div>'.
            '</div><div class="modal-left">';
        if($this->u_isAuth){
            $return.=$this->htmlUserMenu();
        }else{
            $return.=$this->htmlUserAuthForm();
        }
        $return.='</div>'.
            '</div>'.
            '</div></div></div></div>';
        return $return;
    }

    protected function htmlUserMenu():string
    {
        $this->tpUserMenu->handleViewParams();
        $this->tpUserMenu->userLang = $this->userLang;
        $this->tpUserMenu->setUpCustomLang($this->tpUserMenu->getDefaultLang());

        return $this->tpUserMenu->getResponseHtml();
    }

    protected function htmlUserAuthForm():string
    {
        $this->tpAuthForm->handleViewParams();
        $this->tpAuthForm->userLang = $this->userLang;
        $this->tpAuthForm->setUpCustomLang($this->tpAuthForm->getDefaultLang());

        return $this->tpAuthForm->htmlUserLine().$this->tpAuthForm->getResponseHtml();
    }
}