<?php


namespace Src\Views\JointSite;



use JointApp\Views\TpView;


class TpView_JointSite_Menu extends TpView
{
    public $css = [
        'jointSiteMenu' => '/css/jointSite/jointSiteMenu.css',
    ];

    public $js = [
        'googleapis' => '/js/googleapis.js',
        'jointSiteMenu' => '/js/jointSite/jointSiteMenu.js',
    ];

    public function getResponseHtml():string
    {

        $httpLinks = static::getHttpLinks();
        $linksLang = $this->langFile::getLinks();

        return "<div class='joint-site-menu'>".
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['JsHome'].'" title="'.$linksLang['JsHome']['title'].'"><img src="/img/siteLogo/favicon.png"></a>'.
            '<li><a href="'.$this->langSl.$httpLinks['setup'].'" title="'.$linksLang['setup']['title'].'">'.$linksLang['setup']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['setup_os'].'" title="'.$linksLang['setup_os']['title'].'">'.$linksLang['setup_os']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['setup_hosting'].'" title="'.$linksLang['setup_hosting']['title'].'">'.$linksLang['setup_hosting']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['setup_migrations'].'" title="'.$linksLang['setup_migrations']['title'].'">'.$linksLang['setup_migrations']['text'].'</a></li>'.
            '</ul>'.
            '</li>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture'].'" title="'.$linksLang['architecture']['title'].'">'.$linksLang['architecture']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['directories'].'" title="'.$linksLang['directories']['title'].'">'.$linksLang['directories']['text'].'</a>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_lc'].'" title="'.$linksLang['architecture_lc']['title'].'">'.$linksLang['architecture_lc']['text'].'</a>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_app'].'" title="'.$linksLang['architecture_app']['title'].'">'.$linksLang['architecture_app']['text'].'</a>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_mvc'].'" title="'.$linksLang['architecture_mvc']['title'].'">'.$linksLang['architecture_mvc']['text'].'</a>'.
            '</ul>'.
            '</li>'.
            '<li><a href="'.$this->langSl.$httpLinks['lang'].'" title="'.$linksLang['lang']['title'].'">'.$linksLang['lang']['text'].'</a>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_model'].'" title="'.$linksLang['architecture_model']['title'].'">'.$linksLang['architecture_model']['text'].'</a>'.
            '<li>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_view'].'" title="'.$linksLang['architecture_view']['title'].'">'.$linksLang['architecture_view']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_view_tp'].'" title="'.$linksLang['architecture_view_tp']['title'].'">'.$linksLang['architecture_view_tp']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_view_web'].'" title="'.$linksLang['architecture_view_web']['title'].'">'.$linksLang['architecture_view_web']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['siteview'].'" title="'.$linksLang['siteview']['title'].'">'.$linksLang['siteview']['text'].'</a></li>'.
            '</ul>'.
            '</li>'.
            '</li>'.
            '<li><a href="'.$this->langSl.$httpLinks['controller'].'" title="'.$linksLang['controller']['title'].'">'.$linksLang['controller']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['user'].'" title="'.$linksLang['user']['title'].'">'.$linksLang['user']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['tests'].'" title="'.$linksLang['tests']['title'].'">'.$linksLang['tests']['text'].'</a></li>'.
            '</ul>'.
            '</div>';
    }

    public static function getHttpLinks():array
    {
        $httpLinks = array(
            'setup' => '/jointsite/deploy',
            'architecture' => '/jointsite/architecture',
            'setup_os' => '/jointsite/deploy/openserver',
            'architecture_view' => '/jointsite/view',
            'architecture_view_tp' => '/jointsite/view/tpview',
            'architecture_view_web' => '/jointsite/view/webview',
            'architecture_lc' => '/jointsite/architecture/life-circle',
            'architecture_app' => '/jointsite/architecture/app',
            'architecture_mvc' => '/jointsite/architecture/mvc',
            'architecture_model' => '/jointsite/model',
            'controller' => '/jointsite/controller',
            'user' => '/jointsite/user',
            'tests' => '/jointsite/tests',
            'setup_hosting' => '/jointsite/deploy/hosting',
            'setup_migrations' => '/jointsite/deploy/migrations',
            'directories' => '/jointsite/architecture/directories',
            'siteview' => '/jointsite/view/siteview',
            'lang' => '/jointsite/lang',
            'JsHome' => '/jointsite',
        );

        return $httpLinks;
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JointSite_Menu';
        return new $class_Name();
    }
}