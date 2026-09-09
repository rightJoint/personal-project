<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\Siteman\TpView_Siteman_ModulesMenu;
use JointApp\Views\TpView;
use JointApp\Views\Test\TpView_Test_Menu;

class TpView_ModalMenu extends TpView
{

    public bool $modalMenuActive = false;
    public string $uri_pq = '';
    public array $routes_ns = [];

    //blog pop articles menu
    public array $popArticles = [];

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
            $this->modalMenuSitenam().
            $this->modalMenuBlog();

        $modalMenu.= '</div></div></div></div>';
        return $modalMenu;
    }

    private function modalMenuTests():string
    {
        $menu_style = ' folded';
        $list_style = ' style="display: none"';
        if(isset($this->routes_ns[1]) and strtolower($this->routes_ns[1]) == 'test'){
            $menu_style = '';
            $list_style = '';
        }

        $testMenu = new TpView_Test_Menu();
        $testMenu->userLang = $this->userLang;

        $menu_lang = $testMenu->getDefaultLang();
        $httpLinks = $testMenu::getHttpLinks();
        $linksLang = $menu_lang::getLinks();

        $return = "<div class='modal-line test-menu'>".
            '<div class="modal-line-img"><img src="/img/popimg/test-logo.png"></div>'.
            '<div class="modal-line-text">'.
            '<a href="'.$this->langSl.'/test">Tests</a>'.
            '<sup>web tests</sup>'.
            '<span class="opnSubMenu'.$menu_style.'">'.$this->langFile::MODAL_MENU_SU_TEXT.'</span>'.
            '<ul'.$list_style.' >';
        foreach ($httpLinks as $key=>$val){
            if($key!='TestHome' and $key!='migrationslog'){
                $href_style = '';
                if(isset($this->routes_ns[2]) and strtolower($this->routes_ns[2]) == strtolower($key)){
                    $href_style = ' class="selected"';
                }
                $return .= '<li><a href="'.$this->langSl.$httpLinks[$key].'" title="'.$linksLang[$key]['title'].'"'.$href_style.'>'.$linksLang[$key]['text'].'</a></li>';
            }
        }
        $return .= '</ul>'.
            '</div>'.
            '</div>';

        return $return;
    }

    private function modalMenuSitenam():string
    {
        $menu_style = ' folded';
        $list_style = ' style="display: none"';
        if(isset($this->routes_ns[1]) and strtolower($this->routes_ns[1]) == 'siteman'){
            $menu_style = '';
            $list_style = '';
        }

        $sitemanMenu = new TpView_Siteman_ModulesMenu();
        $sitemanMenu->userLang = $this->userLang;

        $menu_lang = $sitemanMenu->getDefaultLang();
        $httpLinks = $sitemanMenu::getHttpLinks();
        $linksLang = $menu_lang::getLinks();

        $return = "<div class='modal-line siteman-menu'>".
            '<div class="modal-line-img"><img src="/img/popimg/module-logo.png"></div>'.
            '<div class="modal-line-text">'.
            '<a href="'.$this->langSl.$httpLinks['home'].'" title="'.$linksLang['home']['title'].'">'.$linksLang['home']['text'].'</a>'.
            '<sup>siteman</sup>'.
            '<span class="opnSubMenu'.$menu_style.'">'.$this->langFile::MODAL_MENU_SU_TEXT.'</span>'.
            '<ul'.$list_style.'>';
        foreach ($httpLinks as $key=>$val){
            if($key!='home'){
                $href_style = '';
                if(isset($this->routes_ns[2]) and strtolower($this->routes_ns[2]) == strtolower($key)){
                    $href_style = ' class="selected"';
                }
                $return .= '<li><a href="'.$this->langSl.$httpLinks[$key].'" title="'.$linksLang[$key]['title'].'"'.$href_style.'>'.$linksLang[$key]['text'].'</a></li>';
            }
        }
        $return .= '</ul>'.
            '</div>'.
            '</div>';

        return $return;
    }

    private function modalMenuBlog():string
    {
        $menu_style = ' folded';
        $list_style = ' style="display: none"';
        if(isset($this->routes_ns[1]) and strtolower($this->routes_ns[1]) == 'blog'){
            $menu_style = '';
            $list_style = '';
        }

        $return = "<div class='modal-line siteman-menu'>".
            '<div class="modal-line-img"><img src="/img/popimg/blog-logo.png"></div>'.
            '<div class="modal-line-text">'.
            '<a href="'.$this->langSl.'/blog" title="'.$this->langFile::MODAL_MENU_BLOG_TITLE.'">'.$this->langFile::MODAL_MENU_BLOG_TEXT.'</a>'.
            '<sup>'.$this->langFile::MODAL_MENU_BLOG_SUP.'</sup>'.
            '<span class="opnSubMenu'.$menu_style.'">'.$this->langFile::MODAL_MENU_SU_TEXT.'</span>'.
            '<ul'.$list_style.'>';
        foreach ($this->popArticles as $num=>$row){
            $href_style = '';
            if(isset($this->routes_ns[3]) and strtolower($this->routes_ns[3]) == strtolower($row['artRef'])){
                $href_style = ' class="selected"';
            }
            $return .= '<li><a href="'.$this->langSl.'/blog/article/'.$row['artRef'].'" title="'.$row['artMeta'].'"'.$href_style.'>'.$row['artName'].'</a></li>';
        }
        $return .= '</ul>'.
            '</div>'.
            '</div>';

        return $return;
    }

}