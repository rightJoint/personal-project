<?php


namespace Src\Views\Blog\Others;


use JointApp\Views\TpView;

class TpView_Blog_Others_CasioMts extends TpView
{
    public $css = ['watches' =>'/css/blog/articles/watches.css'];

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\Others\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_CasioMts';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        return
            '<section>'.
            '<p>'.$this->langFile::S1_P1.'</p>'.
            '</section>'.
            '<section>'.
            '<p>'.$this->langFile::S2_P1.
            '<ul>'.
            '<li>'.$this->langFile::S2_P1_LI1.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI2.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI3.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI4.'</li>'.
            '<li>'.$this->langFile::S2_P1_LI5.'</li>'.
            '</ul>'.
            '</p>'.
            '<div class="art-gallery">'.
            '<a href="/img/blog/watches/img-01.jpg"><img src="/img/blog/watches/img-01.jpg"></a>'.
            '<a href="/img/blog/watches/img-02.jpg"><img src="/img/blog/watches/img-02.jpg"></a>'.
            '<a href="/img/blog/watches/img-03.jpg"><img src="/img/blog/watches/img-03.jpg"></a>'.
            '<a href="/img/blog/watches/img-04.jpg"><img src="/img/blog/watches/img-04.jpg"></a>'.
            '<a href="/img/blog/watches/img-05.jpg"><img src="/img/blog/watches/img-05.jpg"></a>'.
            '<a href="/img/blog/watches/img-06.jpg"><img src="/img/blog/watches/img-06.jpg"></a>'.
            '<a href="/img/blog/watches/img-07.jpg"><img src="/img/blog/watches/img-07.jpg"></a>'.
            '<a href="/img/blog/watches/img-08.jpg"><img src="/img/blog/watches/img-08.jpg"></a>'.
            '<a href="/img/blog/watches/img-09.jpg"><img src="/img/blog/watches/img-09.jpg"></a>'.
            '</div>'.
            '<p>'.$this->langFile::S2_P2.'</p>'.
            '<p>'.$this->langFile::S2_P3.'</p>'.
            '<div class="art-video">'.
            '<video width="400" height="300" controls="controls" poster="/img/blog/watches/video-1-poster.jpg">'.
            '<source src="/img/blog/watches/video-1.mp4">'.
            'Тег video не поддерживается вашим браузером.'.
            '<a href="/img/blog/watches/video-1.mp4">Скачайте видео</a>'.
            '</video>'.
            '</div>'.
            '<div class="art-video">'.
            '<video width="400" height="300" controls="controls" poster="/img/blog/watches/video-2-poster.jpg">'.
            '<source src="/img/blog/watches/video-2.mp4">'.
            'Тег video не поддерживается вашим браузером.'.
            '<a href="/img/blog/watches/video-2.mp4">Скачайте видео</a>'.
            '</video>'.
            '</div>'.
            '<div class="art-video">'.
            '<video width="400" height="300" controls="controls" poster="/img/blog/watches/video-3-poster.jpg">'.
            '<source src="/img/blog/watches/video-3.mp4">'.
            'Тег video не поддерживается вашим браузером.'.
            '<a href="/img/blog/watches/video-3.mp4">Скачайте видео</a>'.
            '</video>'.
            '</div>'.
            '<p>'.$this->langFile::S2_P4.'</p>'.
            '<p>'.$this->langFile::S2_P5.'</p>'.
            '<p>'.$this->langFile::S2_P6.'</p>'.
            '</section>'.
            '<section>'.
            '<p>'.$this->langFile::S3_P1.'</p>'.
            '<p>'.$this->langFile::S3_P2.'</p>'.
            '<p>'.$this->langFile::S3_P3.'</p>'.
            '<p>'.
            '<ul>'.
            '<li>'.$this->langFile::S3_P3_LI1.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI2.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI3.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI4.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI5.'</li>'.
            '<li>'.$this->langFile::S3_P3_LI6.'</li>'.
            '</ul>'.
            '</p>'.
            '<p>'.$this->langFile::S3_P4.
            '<ul>'.
            '<li>'.$this->langFile::S3_P4_LI1.'</li>'.
            '<li>'.$this->langFile::S3_P4_LI2.'</li>'.
            '<li>'.$this->langFile::S3_P4_LI3.'</li>'.
            '</ul>'.
            '</p>'.
            '<p>'.$this->langFile::S3_P5.
            '<ul>'.
            '<li>'.$this->langFile::S3_P5_LI1.'</li>'.
            '<li>'.$this->langFile::S3_P5_LI2.'</li>'.
            '<li>'.$this->langFile::S3_P5_LI3.'</li>'.
            '<li>'.$this->langFile::S3_P5_LI4.'</li>'.
            '<li>'.$this->langFile::S3_P5_LI5.'</li>'.
            '</ul>'.
            '</p>'.
            '</section>'.
            '<section>'.
            '<p>'.$this->langFile::S4_P1.'</p>'.
            '<div class="art-gallery">'.
            '<a href="/img/blog/watches/img-10.jpg"><img src="/img/blog/watches/img-10.jpg"></a>'.
            '<a href="/img/blog/watches/img-11.jpg"><img src="/img/blog/watches/img-11.jpg"></a>'.
            '<a href="/img/blog/watches/img-12.jpg"><img src="/img/blog/watches/img-12.jpg"></a>'.
            '</div>'.
            '<p>'.$this->langFile::S4_P2.'</p>'.
            '</section>';
    }
}