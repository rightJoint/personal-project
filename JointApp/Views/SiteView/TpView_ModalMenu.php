<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\Siteman\TpView_Siteman_ModulesMenu;
use JointApp\Views\TpView;
use JointApp\Views\Test\TpView_Test_Menu;

class TpView_ModalMenu extends TpView
{

    public bool $modalMenuActive = false;
    public string $uri_pq = '';

    protected $css = array(
        'modals' => '/css/WebView/modals.css',
    );

    protected $js = array(
        'modals' => '/js/modals.js',
    );


    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_ModalMenu';
        return new $class_Name();
    }


    public function getResponseHtml():string
    {
        $active_modal_menu_style = null;
        if ($this->modalMenuActive) {
            $active_modal_menu_style = 'style="opacity: 1; visibility: visible"';
        }

        $modalMenu = '<div class="modal menu" '.$active_modal_menu_style.'>'.
            '<div class="overlay" '.$active_modal_menu_style.'></div><div class="contentBlock-frame">'.
            '<div class="contentBlock-center"><div class="modal-right"><div class="modal-close"></div>'.
            '</div><div class="modal-left">'.
            '<div class="modal-line" style="position: relative; min-height: 3.8em" >'.
            '<div class="lang-panel mp">'.
            '<a class="lang-cntrl ';
        if ($this->langFile::LANG_LW == 'ru') {
            $modalMenu.= 'active ';
        }
        $modalMenu.= 'rus" href="/ru'.$this->uri_pq.'" title="'.$this->langFile::LANG_PANEL_TEXT_RU.'"><span>Рус</span></a>'.
            '<a class="lang-cntrl ';
        if ($this->langFile::LANG_LW == 'en') {
            $modalMenu.= 'active ';
        }
        $modalMenu.= 'en" href="/en'.$this->uri_pq.'" title="'.$this->langFile::LANG_PANEL_TEXT_EN.'"><span>En</span></a>'.
            '</div>'.
            '<div class="mm-htl">';
        $mainPage_ref = '/';
        if($this->langSl){
            $mainPage_ref = $this->langSl;
        }

        if ($this->uri_pq == '') {
            $home_title = $this->langFile::DEFAULT_LINK_TITLE;
            $home_text = $this->langFile::DEFAULT_LINK_TEXT;
        } else {
            $home_title = $this->langFile::HOME_LINK_TITLE;
            $home_text = $this->langFile::HOME_LINK_TEXT;
        }

        $modalMenu.= '<a href="'.$mainPage_ref.'" title="'.$home_title.'">'.
            '<img src="/img/siteLogo/rightjoint-logo-150.png" alt="RJ-logo">' .
            $home_text.
            '</a>'.
            '<p>'.$home_title.'</p>'.
            '</div>'.
            '</div>'.
            $this->modalMenuTests().
            $this->modalMenuSitenam();

        $modalMenu.= '</div></div></div></div>';
        return $modalMenu;
    }

    private function modalMenuTests():string
    {
        $testMenu = new TpView_Test_Menu();
        $testMenu->userLang = $this->userLang;

        $menu_lang = $testMenu->getDefaultLang();
        $httpLinks = $testMenu::getHttpLinks();
        $linksLang = $menu_lang::getLinks();

        return "<div class='modal-line test-menu'>".
            '<div class="modal-line-img"><img src="/img/popimg/test-logo.png"></div>'.
            '<div class="modal-line-text">'.
            '<a href="/test">Tests</a>'.
            '<sup>web tests</sup>'.
            '<span class="opnSubMenu folded">показать</span>'.
            '<ul style="display: none">'.
            '<li><a href="'.$this->langSl.$httpLinks['connection'].'" title="'.$linksLang['connection']['title'].'">'.$linksLang['connection']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrations'].'" title="'.$linksLang['migrations']['title'].'">'.$linksLang['migrations']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['records'].'" title="'.$linksLang['records']['title'].'">'.$linksLang['records']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['tables'].'" title="'.$linksLang['tables']['title'].'">'.$linksLang['tables']['text'].'</a></li>'.
            '</ul>'.
            '</div>'.
            '</div>';
    }

    private function modalMenuSitenam():string
    {
        $sitemanMenu = new TpView_Siteman_ModulesMenu();
        $sitemanMenu->userLang = $this->userLang;

        $menu_lang = $sitemanMenu->getDefaultLang();
        $httpLinks = $sitemanMenu::getHttpLinks();
        $linksLang = $menu_lang::getLinks();

        return "<div class='modal-line'>".
            '<div class="modal-line-img"><img src="/img/popimg/test-logo.png"></div>'.
            '<div class="modal-line-text">'.
            '<a href="'.$httpLinks['home'].'" title="'.$linksLang['home']['title'].'">'.$linksLang['home']['text'].'</a>'.
            '<sup>siteman</sup>'.
            '<span class="opnSubMenu folded">показать</span>'.
            '<ul style="display: none">'.
            '<li><a href="'.$httpLinks['users'].'" title="'.$linksLang['users']['title'].'">'.$linksLang['users']['text'].'</a></li>'.
            '<li><a href="'.$httpLinks['sitemap'].'" title="'.$linksLang['sitemap']['title'].'">'.$linksLang['sitemap']['text'].'</a></li>'.
            '</ul>'.
            '</div>'.
            '</div>';

    }

}