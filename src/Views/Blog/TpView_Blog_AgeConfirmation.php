<?php


namespace Src\Views\Blog;


use JointApp\Views\TpView;

class TpView_Blog_AgeConfirmation extends TpView
{
    public bool $confirmAgeFlag = false;

    public $css=['age-confirm-dialog' => '/css/blog/age-confirm-dialog.css'];
    public $js=['cookie'=>'/js/cookie.js',
        'age-confirm' => '/js/blog/age-confirm.js',
        ];

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\AgeConfirmation\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Blog_AC_AgeConfirmation';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        if(!$this->confirmAgeFlag){
            return '';
        }

        $active_modal_menu_style='style="opacity: 1; visibility: visible"';
        return '<div class="modal-age-dialog" '.$active_modal_menu_style.'>'.
            '<div class="overlay" '.$active_modal_menu_style.'></div>'.
            '<div class="contentBlock-frame">'.
            '<div class="contentBlock-center">'.
            '<div class="modal-age-confirm">'.
            '<div class="confirm-age-question">'.
            $this->langFile::AGE_CONFIRM_QUESTION.
            '</div>'.
            '<div class="confirm-buttons">'.
            '<div class="confirm-buttons-yes"><input type="button" value="'.$this->langFile::AGE_CONFIRM_BTN_YES.'" onclick="imAdult(true)"></div>'.
            '<div class="confirm-buttons-no"><input type="button" value="'.$this->langFile::AGE_CONFIRM_BTN_NO.'" onclick="imAdult(false)"></div>'.
            '</div>'.
            '</div>'.
            '</div></div></div>';
    }
}