<?php


namespace Src\Views\Blog;


use JointApp\Views\TpView;

class TpView_Blog_Art_Header extends TpView
{
    public $artRow = [];

    const ART_COVERS = '/userdata/blog/covers';

    public function getResponseHtml(): string
    {
        return '<div class="blog-header">'.
        '<div class="blog-header-meta"><h2>'.$this->artRow['artMeta'].'</h2></div>'.
        '<div class="blog-header-img"><img src="'.self::ART_COVERS.'/'.$this->artRow['artImg'].'"></div>'.
        '</div>';
    }
}