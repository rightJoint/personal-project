<?php

namespace JointApp\Views\PersonalPage;


use JointApp\Views\TpView;

class TpView_PP_UserMenu extends TpView
{

    public $css = ['pp-user-menu' => '/css/pp/pp-user-menu.css'];

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Home\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Menu';
        return new $class_Name();
    }


    public function getResponseHtml():string
    {
        $httpLinks = self::getHttpLinks();

        $linksTexts = $this->langFile::getLinks();

        $return = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<div class="pp-user-menu">'.
            '<a href="'.$this->langSl.$httpLinks['info'].'" title="'.$linksTexts['info']['title'].'">'.$linksTexts['info']['text'].'</a>'.
            '<a href="'.$this->langSl.$httpLinks['edit'].'" title="'.$linksTexts['edit']['title'].'">'.$linksTexts['edit']['text'].'</a>'.
            '<a href="'.$this->langSl.$httpLinks['changepassword'].'" title="'.$linksTexts['changepassword']['title'].'">'.$linksTexts['changepassword']['text'].'</a>'.
            '</div>'.
            '</div></div></div>';

        return $return;
    }

    public static function getHttpLinks():array
    {
        return [
            'info' => '/pp',
            'edit' => '/pp/edit',
            'changepassword' => '/pp/changepassword',
        ];
    }
}