<?php
namespace JointApp\Views\SiteView;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;


class TpView_Header extends TpView
{
    public string $userLang = '';
    public string $uri_pq = '';
    public string $logo = '/img/siteLogo/rightjoint-logo-150.png';
    public string $h1 = '';

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

    protected $css = array(
        'siteHeader' => '/css/WebView/site-header.css',
    );


    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Header';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {
        $headerText= '<div class="contentBlock-frame dark"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<header><div class="headerCenter">';
        $headerText.= '<div class="lang-panel">'.
            '<a class="lang-cntrl ';
        if ($this->userLang == 'ru') {
            $headerText.= 'active ';
        }
        $headerText.= 'rus" href="/ru'.$this->uri_pq.'" title="'.$this->langFile::LANG_PANEL_TEXT_RU.'"><span>Рус</span></a>'.
            '<a class="lang-cntrl ';
        if ($this->userLang == 'en') {
            $headerText.= 'active ';
        }
        $headerText.= 'en" href="/en'.$this->uri_pq.'" title="'.$this->langFile::LANG_PANEL_TEXT_EN.'"><span>En</span></a>'.
            '</div>';
        $headerText.= '<div class="menuBtn hi-icon-effect-1 hi-icon-effect-1a">'.
            '<span class="hi-icon hi-icon-mobile menu"><span class="hi-text">'.
            $this->langFile::MENU_BTN_TEXT.
            '</span></span></div>'.
            '<div class="h-caption">'.
            '<div class="textBlock ';

        if (empty($routes_ns[1])) {
            $headerText.= 'landing';
        }

        if($this->h1){
            if($this->langFile::H_1){
                $h1 = $this->langFile::H_1.' - '.$this->h1;
            }else{
                $h1 =$this->h1;
            }
        }else{
            $h1 = $this->langFile::H_1;
        }

        $headerText.= '"><span class="firmName">'.$this->langFile::SITE_NAME.'</span>'.
            '<h1>'.$h1.'</h1></div></div>';
        $header_add_styles = '<style>
        .hi-icon-mobile.menu:before {background-image: url('.$this->logo.');}
        .modal-right .modal-close{
                background-image: url("/img/popimg/closeModal.png");
            }
            @media only screen and (max-width : 1024px) and (orientation : portrait){
            .modal-right:not(.signIn) .modal-close:not(.signIn){
                    background-image: url("/img/popimg/closeModal-white.png");
            }
            }
            </style>';

        $headerText.= $header_add_styles;

        if($this->u_isAuth){
            $user_btn_text = $this->langFile::USER_PROF_TXT;
        }else{
            $user_btn_text = $this->langFile::USER_SIGN_TXT;
        }
        if($this->u_avatar){
            $user_btn_img = SettingsEnv::USER_AVATARS_DIR.'/'.$this->u_avatar;
        }else{
            $user_btn_img = '/img/popimg/user-logo.png';
        }


        $headerText.= '<div class="userBtn hi-icon-effect-1 hi-icon-effect-1a">'.
            '<span class="hi-icon hi-icon-mobile user"><span class="hi-text">'.
            $user_btn_text.
            '</span></span>'.
            '</div>';

        $header_user_styles = '<style>
            .hi-icon-mobile.user:before {
    background-image: url("'.$user_btn_img.'");
    z-index: 3;
    position: relative;
}
            </style>';

        $headerText.='</div></header>'.'</div></div></div>'.$header_user_styles;

        return $headerText;
    }
}