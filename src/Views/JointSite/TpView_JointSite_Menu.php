<?php


namespace Src\Views\JointSite;



use JointApp\Views\TpView;


class TpView_JointSite_Menu extends TpView
{
    public string $langSl = '';


    public function renderView():string
    {

        $httpLinks = static::getHttpLinks();
        $linksLang = $this->langFile::getLinks();

        return "<div class='joint-site-menu'>".
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['setup'].'" title="'.$linksLang['setup']['title'].'">'.$linksLang['setup']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['setup_os'].'" title="'.$linksLang['setup_os']['title'].'">'.$linksLang['setup_os']['text'].'</a></li>'.
            '</ul>'.
            '</li>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture'].'" title="'.$linksLang['architecture']['title'].'">'.$linksLang['architecture']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_view'].'" title="'.$linksLang['architecture_view']['title'].'">'.$linksLang['architecture_view']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_view_tp'].'" title="'.$linksLang['architecture_view_tp']['title'].'">'.$linksLang['architecture_view_tp']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['architecture_view_web'].'" title="'.$linksLang['architecture_view_web']['title'].'">'.$linksLang['architecture_view_web']['text'].'</a></li>'.
            '</ul>'.
            '</li>'.
            '</ul>'.
            '</li>'.
            '</ul>'.
            '</div>';
    }

    public static function getHttpLinks():array
    {
        $httpLinks = array(
            'setup' => '/jointsite/deploy',
            'architecture' => '/jointsite/architecture',
            'setup_os' => '/jointsite/deploy/openserver',
            'architecture_view' => '/jointsite/architecture/view',
            'architecture_view_tp' => '/jointsite/architecture/view/tpview',
            'architecture_view_web' => '/jointsite/architecture/view/webview',
        );

        return $httpLinks;
    }

    public static function getCss():array
    {
        return [
            'jointSiteMenu' => '/css/jointSite/jointSiteMenu.css',
        ];
    }

    public static function getJS():array
    {
        return [
            'googleapis' => '/js/googleapis.js',
            'jointSiteMenu' => '/js/jointSite/jointSiteMenu.js',
        ];
    }

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JointSite_Menu';
        $langFile = new $class_Name();
        return $langFile;
    }
}