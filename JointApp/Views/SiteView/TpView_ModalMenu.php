<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;
use Src\Views\Test\TpView_Test_Menu;

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
            $this->modalMenuTests();

        $modalMenu.= '</div></div></div></div>';
        return $modalMenu;
    }

    public function modalMenuTests():string
    {
        $testMenu = new TpView_Test_Menu();
        $testMenu->userLang = $this->userLang;

        $menu_lang = $testMenu->getDefaultLang();
        $httpLinks = $testMenu::getHttpLinks();
        $linksLang = $menu_lang::getLinks();

        return "<div class='joint-site-menu'>".
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['TestHome'].'" title="'.$linksLang['TestHome']['title'].'"><img src="/img/siteLogo/favicon.png"></a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['connection'].'" title="'.$linksLang['connection']['title'].'">'.$linksLang['connection']['text'].'</a><li>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrations'].'" title="'.$linksLang['migrations']['title'].'">'.$linksLang['migrations']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['createmigrationstables'].'" title="'.$linksLang['createmigrationstables']['title'].'">'.$linksLang['createmigrationstables']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['execnewmigrations'].'" title="'.$linksLang['execnewmigrations']['title'].'">'.$linksLang['execnewmigrations']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrationslist'].'" title="'.$linksLang['migrationslist']['title'].'">'.$linksLang['migrationslist']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrationslog'].'" title="'.$linksLang['migrationslog']['title'].'">'.$linksLang['migrationslog']['text'].'</a></li>'.
            '</ul>'.
            '</li>'.
            '</li>'.
            '<li><a href="'.$this->langSl.$httpLinks['records'].'" title="'.$linksLang['records']['title'].'">'.$linksLang['records']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['tables'].'" title="'.$linksLang['tables']['title'].'">'.$linksLang['tables']['text'].'</a></li>'.
            '</ul>'.
            '</div>';
    }
}