<?php


namespace JointApp\Views\Test;



use JointApp\Views\TpView;


class TpView_Test_Home extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        $menu = new TpView_Test_Menu();
        $menu->userLang = $this->userLang;

        $httpLinks = $menu->getHttpLinks();
        $testMenuLang = $menu->getDefaultLang();
        $linksLang = $testMenuLang::getLinks();



        return '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['connection'].'" title="'.$linksLang['connection']['title'].'">'.$linksLang['connection']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrations'].'" title="'.$linksLang['migrations']['title'].'">'.$linksLang['migrations']['text'].'</a>'.
            '<ul>'.
            '<li><a href="'.$this->langSl.$httpLinks['migrationslog'].'" title="'.$linksLang['migrationslog']['title'].'">'.$linksLang['migrationslog']['text'].'</a></li>'.
            '</ul>'.
            //'</li>'.
            '</li>'.
            '<li><a href="'.$this->langSl.$httpLinks['records'].'" title="'.$linksLang['records']['title'].'">'.$linksLang['records']['text'].'</a></li>'.
            '<li><a href="'.$this->langSl.$httpLinks['tables'].'" title="'.$linksLang['tables']['title'].'">'.$linksLang['tables']['text'].'</a></li>'.
            '</ul>'.
            '</section>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Home\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Test_Home';
        $langFile = new $class_Name();
        return $langFile;
    }
}