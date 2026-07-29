<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;

class TpView_ModalUser extends TpView
{
    public bool $userUserActive = false;

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_ModalUser';
        return new $class_Name();
    }

    public function renderView():string
    {
        $active_modal_menu_style = null;

        if ($this->userUserActive ==  true) {
            $active_modal_menu_style = 'style="opacity: 1; visibility: visible"';
        }

        $modalMenu = '<div class="modal user" '.$active_modal_menu_style.'>'.
            '<div class="overlay" '.$active_modal_menu_style.'></div><div class="contentBlock-frame">'.
            '<div class="contentBlock-center"><div class="modal-right"><div class="modal-close"></div>'.
            '</div><div class="modal-left">'.
            'modal-user'.
            '</div>'.
            '</div>';

        $modalMenu.= '</div></div></div></div>';
        return $modalMenu;
    }

    public static function getCss(): array
    {
        return array(
            'modals' => '/css/WebView/modals.css',
        );
    }

    public static function getJS(): array
    {
        return array(
            'modals' => '/js/modals.js',
        );
    }
}