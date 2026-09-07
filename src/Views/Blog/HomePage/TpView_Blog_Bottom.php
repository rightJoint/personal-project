<?php


namespace Src\Views\Blog\HomePage;


use JointApp\Views\TpView;

class TpView_Blog_Bottom extends TpView
{
    public int $curPage = 1;
    public int $blogCountArts = 0;
    public int $onPage = 4;

    public $css=['blog-home-bottom' => '/css/blog/blog-home-bottom.css'];
    public $js=['blog-next-page' => '/js/blog/blog-next-page.js'];

    public function getResponseHtml(): string
    {
        $return = '<div class="blog-home-bottom">';
        if($this->blogCountArts > $this->onPage){
            $return .= '<span onclick="blogNextPage()" id="blog-see-more">See more ('.
                '<span id="blog-see-left">'.($this->blogCountArts - $this->onPage).'</span>'.
                ')</span>'.
                '<input type="hidden" id="blog-count-arts" value="'.$this->blogCountArts.'">'.
                '<input type="hidden" id="blog-cur-page" value="'.$this->curPage.'">';
        }
        $return .= '</div>';

        return $return;
    }
}