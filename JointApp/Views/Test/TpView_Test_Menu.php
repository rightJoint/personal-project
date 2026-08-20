<?php


namespace JointApp\Views\Test;



use JointApp\Views\TpView;


class TpView_Test_Menu extends TpView
{
    protected $css = [
        'jointSiteMenu' => '/css/jointSite/jointSiteMenu.css',
    ];

    protected $js = [
        'googleapis' => '/js/googleapis.js',
        'jointSiteMenu' => '/js/jointSite/jointSiteMenu.js',
    ];


    public function getResponseHtml():string
    {

        $httpLinks = static::getHttpLinks();
        $linksLang = $this->langFile::getLinks();

        return "<div class='joint-site-menu'>".
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['TestHome'].'" title="'.$linksLang['TestHome']['title'].'"><img src="/img/siteLogo/favicon.png"></a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['connection'].'" title="'.$linksLang['connection']['title'].'">'.$linksLang['connection']['text'].'</a><li>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrations'].'" title="'.$linksLang['migrations']['title'].'">'.$linksLang['migrations']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrationslog'].'" title="'.$linksLang['migrationslog']['title'].'">'.$linksLang['migrationslog']['text'].'</a></li>'.
            '</ul>'.
            '</li>'.
            '</li>'.
            '<li><a href="'.$this->langSl.$httpLinks['records'].'" title="'.$linksLang['records']['title'].'">'.$linksLang['records']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['tables'].'" title="'.$linksLang['tables']['title'].'">'.$linksLang['tables']['text'].'</a></li>'.
            '</ul>'.
            '</div>';
    }

    public static function getHttpLinks():array
    {
        $httpLinks = array(
            'TestHome' => '/test',
            'connection' => '/test/connection',
            'migrations' => '/test/migrations',
            'migrationslog' => '/test/migrations/log',
            'records' => '/test/records',
            'tables' => '/test/tables',
        );

        return $httpLinks;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Home\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Test_Menu';
        return new $class_Name();
    }
}