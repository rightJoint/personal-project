<?php
namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;


class TpView_Header extends TpView
{

    public string $canonical_ref = '';
    public string $logo = '/img/siteLogo/rightjoint-logo-150.png';


    public static function loadViewLang(string $userLang = 'ru')
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($userLang).'_'.'Views_Header';
        return new $class_Name();
    }

    public function renderView():string
    {
        $headerText= '<div class="contentBlock-frame dark"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<header><div class="headerCenter">';
        $headerText.= '<div class="lang-panel">'.
            '<a class="lang-cntrl ';
        if ($this->langFile::LANG_LW == 'ru') {
            $headerText.= 'active ';
        }
        $headerText.= 'rus" href="/ru'.$this->canonical_ref.'" title="'.$this->langFile::LANG_PANEL_TEXT_RU.'"><span>Рус</span></a>'.
            '<a class="lang-cntrl ';
        if ($this->langFile::LANG_LW == 'en') {
            $headerText.= 'active ';
        }
        $headerText.= 'en" href="/en'.$this->canonical_ref.'" title="'.$this->langFile::LANG_PANEL_TEXT_EN.'"><span>En</span></a>'.
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

        $headerText.= '"><span class="firmName">'.$this->langFile::SITE_NAME.'</span>'.
            '<h1>'.$this->langFile::H_1.'</h1></div></div>';
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

        $headerText.= '<div class="userBtn hi-icon-effect-1 hi-icon-effect-1a">'.
            '<span class="hi-icon hi-icon-mobile order ';
        if(isset($_SESSION['basket']['total']) and $_SESSION['basket']['total']>0){
            $headerText.= 'buy';
        }
        $headerText.= '"><span class="hi-text">'.
            $this->langFile::USER_BTN_TXT.
            '</span></span>'.
            '</div>';

        $header_user_styles = '<style>
            .hi-icon-mobile.order:before {
    background-image: url("/img/popimg/user-logo.png");
    z-index: 3;
    position: relative;
}
.hi-icon-mobile.order.buy:before {
    background-image: url("/img/Services/money.png");
}
            </style>';

        $headerText.='</div></header>'.'</div></div></div>'.$header_user_styles;

        return $headerText;
    }

    public static function getCss(): array
    {
        return array(
            'siteHeader' => '/css/WebView/site-header.css',
        );
    }
}