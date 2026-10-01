<?php


namespace Src\Views\Blog\Pets;


use JointApp\Views\TpView;

class TpView_Blog_Pets_BlondKitty11Y extends TpView
{
    public $css = ['pets-gallery' => '/css/blog/articles/pets-gallery.css'];

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\Pets\LangFiles_'.self::ucfirstLang($this->userLang).'_V_B_A_P_BlondKitty11Y';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        return '<p>'.$this->langFile::P1.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-02.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P2.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-03.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P3.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-04.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P4.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-05.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P5.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-06.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P6.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-07.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P7.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-08.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P8.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-09.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P9.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-10.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P10.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-11.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P11.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-12.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P12.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-13.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P13.'</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-14.jpg">'.
            '</div>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-15.jpg">'.
            '</div>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-16.jpg">'.
            '</div>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-01.jpg">'.
            '</div>'.
            '<div class="pets-video">'.
            '<video style="height: 20em; width: auto;" controls="controls" poster="/img/blog/blond-cat-11y/video-poster.jpg">'.
            '<source src="/img/blog/blond-cat-11y/cat-and-chinchilla.mp4">'.
            'Тег video не поддерживается вашим браузером.'.
            '<a href="/img/blog/blond-cat-11y/cat-and-chinchilla.mp4">Скачайте видео</a>'.
            '</video>'.
            '</div>'.
            '<p class="pet-gallery">'.$this->langFile::P14.'</p>';
    }
}