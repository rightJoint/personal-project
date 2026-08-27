<?php


namespace JointApp\Views\Siteman;


use http\Exception\BadUrlException;
use JointApp\Views\TpView;

class TpView_Siteman_ModulesMenu extends TpView
{

    public $css = ['sm-main-menu' => '/css/siteman/sm-main-menu.css'];

    public function getResponseHtml(): string
    {
        $links = self::getHttpLinks();
        $texts = $this->langFile::getLinks();



        $return = '<div class="sm-main-menu">'.
            '<a href="'.$links['home'].'" title="'.$texts['home']['title'].'">'.$texts['home']['text'].'</a>'.
            '<a href="'.$links['users'].'" title="'.$texts['users']['title'].'">'.$texts['users']['text'].'</a>'.
            '<a href="'.$links['sitemap'].'" title="'.$texts['sitemap']['title'].'">'.$texts['sitemap']['text'].'</a>'.
            '</div>';
        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Siteman\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Siteman_ModulesMenu';
        return new $class_Name();
    }

    public static function getHttpLinks():array
    {
        return [
            'home' => '/siteman',
            'users' => '/siteman/users',
            'sitemap' => '/siteman/sitemap',
        ];
    }
}