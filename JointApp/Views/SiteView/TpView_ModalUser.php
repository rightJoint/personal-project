<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;
use JointApp\Views\User\TpView_UserAuthForm;

class TpView_ModalUser extends TpView
{
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

    public function __construct()
    {
        $this->tpAuthForm = new TpView_UserAuthForm();
    }

    public function handleViewParams(): void
    {
        foreach ($this->tpAuthForm as $key => $val){
            if(isset($this->$key)){
                $this->tpAuthForm->$key = $this->$key;
            }
        }
        $this->tpAuthForm->handleViewParams();
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

        $modalMenu = '<div class="modal user" '.$active_modal_menu_style.'>'.
            '<div class="overlay" '.$active_modal_menu_style.'></div><div class="contentBlock-frame">'.
            '<div class="contentBlock-center"><div class="modal-right"><div class="modal-close"></div>'.
            '</div><div class="modal-left">'.
            $this->htmlUserAuthForm().
            '</div>'.
            '</div>';

        $modalMenu.= '</div></div></div></div>';
        return $modalMenu;
    }

    protected function htmlUserAuthForm():string
    {
        $this->tpAuthForm->handleViewParams();
        $this->tpAuthForm->userLang = $this->userLang;
        $this->tpAuthForm->setUpCustomLang($this->tpAuthForm->getDefaultLang());

        return $this->tpAuthForm->htmlUserLine().$this->tpAuthForm->getResponseHtml();
    }
}