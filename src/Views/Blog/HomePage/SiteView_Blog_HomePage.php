<?php


namespace Src\Views\Blog\HomePage;



use JointApp\Views\SiteView\SiteView;
use Src\Views\Blog\TpView_Blog_Table;

class SiteView_Blog_HomePage extends SiteView
{
    public array $artsList = [];
    public array $filterCats = [];
    public int $blogCountArts = 0;
    public int $curPage = 1;
    public int $onPage = 4;
    public int $inRow = 2;

    const ART_COVERS = '/userdata/blog/covers';
    //public string $logo = '/img/popimg/blog-logo.png';
    //public string $shortcutIcon = '/img/popimg/blog-icon.png';


    public function putCustomTemplates(): void
    {
        $this->tpSet->BlogTop = new TpView_Blog_Top();
        $this->tpSet->BlogTable = new TpView_Blog_Table();
        $this->tpSet->BlogBottom = new TpView_Blog_Bottom();
    }

    public function handleTpBlogTop():string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap" id="blog-home-page">'.
            $this->tpSet->BlogTop->getResponseHtml();
    }

    public function handleTpBlogTable():string
    {
        return '<div class="blog-art-list">'.$this->tpSet->BlogTable->getResponseHtml().'</div>';
    }

    public function handleTpBlogBottom():string
    {
        return $this->tpSet->BlogBottom->getResponseHtml().
            '</div></div></div>';
    }

    public function setUpJs():void
    {
        $this->js['preloader'] = '/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js';
        $this->js['blog-main'] = '/js/blog/blog-main.js';
        parent::setUpJs();
    }

    public function setUpCss():void
    {
        $this->css['preloader'] = '/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css';
        parent::setUpCss();
    }
}