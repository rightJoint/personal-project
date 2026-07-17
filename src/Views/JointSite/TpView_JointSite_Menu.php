<?php


namespace Src\Views\JointSite;



use JointApp\Interfaces\LangFileInterface;

use JointApp\Views\TpView;


class TpView_JointSite_Menu extends TpView
{
    public static function renderView(\stdClass $viewLang, \stdClass $viewData, string $langSl = ''):string
    {

        $httpLinks = static::getHttpLinks();

        return "<div class='joint-site-menu'>".
            '<ul>'.
            '<li><a href="'.$langSl.$httpLinks['setup'].'" title="'.$viewLang->httpLinks['setup']['title'].'">'.$viewLang->httpLinks['setup']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$langSl.$httpLinks['setup_os'].'" title="'.$viewLang->httpLinks['setup_os']['title'].'">'.$viewLang->httpLinks['setup_os']['text'].'</a></li>'.
            '</ul>'.
            '</li>'.
            '<li><a href="'.$langSl.$httpLinks['architecture'].'" title="'.$viewLang->httpLinks['architecture']['title'].'">'.$viewLang->httpLinks['architecture']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$langSl.$httpLinks['architecture_view'].'" title="'.$viewLang->httpLinks['architecture_view']['title'].'">'.$viewLang->httpLinks['architecture_view']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$langSl.$httpLinks['architecture_view_tp'].'" title="'.$viewLang->httpLinks['architecture_view_tp']['title'].'">'.$viewLang->httpLinks['architecture_view_tp']['text'].'</a></li>'.
            '<li><a href="'.$langSl.$httpLinks['architecture_view_web'].'" title="'.$viewLang->httpLinks['architecture_view_web']['title'].'">'.$viewLang->httpLinks['architecture_view_web']['text'].'</a></li>'.
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
            'pageContentJointSite' => '/css/jointSite/jointSiteMenu.css',
        ];
    }

    public static function getJS():array
    {
        return [
            'googleapis' => '/js/googleapis.js',
            'jointSiteMenu' => '/js/jointSite/jointSiteMenu.js',
        ];
    }

    public static function loadViewLang(string $lang = 'ru'):LangFileInterface
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JointSite_MenuTp';
        $langFile = new $class_Name();
        return $langFile;
    }
}