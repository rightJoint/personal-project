<?php


namespace Src\Views\Blog;



use JointApp\Views\SiteView\SiteView;

class SiteView_Blog_Main extends SiteView
{
    public array $artsList = [];
    public array $filterCats = [];
    public int $blogCountArts = 0;
    public int $curPage = 1;
    public int $onPage = 4;
    public int $inRow = 2;

    const ART_COVERS = '/userdata/blog/covers';
    public string $logo = '/img/popimg/blog-logo.png';
    public string $shortcutIcon = '/img/popimg/blog-icon.png';


    public function putCustomTemplates(): void
    {
        $this->tpSet->BlogFilter = new TpView_Blog_Filter();
        $this->tpSet->BlogOptions = new TpView_Blog_Options();
        $this->tpSet->BlogTable = new TpView_Blog_Table();
    }

    public function handleTpBlogTable():string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.'<div class="blog-art-list">'.$this->tpSet->BlogTable->getResponseHtml().'</div>'.
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