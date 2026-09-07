<?php


namespace Src\Views\Blog\HomePage;


use JointApp\Views\TpView;

class TpView_Blog_Top extends TpView
{
    public $css=['blog-home-top' => '/css/blog/blog-home-top.css'];

    public function getResponseHtml(): string
    {
        return '<div class="blog-home-top"><h2 class="">Блог</h2></div>';
    }
}