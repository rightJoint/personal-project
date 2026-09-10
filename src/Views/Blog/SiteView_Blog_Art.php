<?php


namespace Src\Views\Blog;


use JointApp\Views\SiteView\SiteView;

class SiteView_Blog_Art extends SiteView
{
    public string $artRef = '';

    public string $h1 = '';

    public string $logo = '/img/popimg/blog-logo.png';
    public string $shortcutIcon = '/img/popimg/blog-icon.png';


    public $artRow = ['artMeta' => '', 'artImg' => '', 'commentsFlag' => false, 'pubDate' => '', 'refreshDate' => ''];

    public $artTags = [];

    public string $commentP_id = '';
    public string $formCommentsContent = '';
    public string $formCommentsErr = '';
    public array $listComments = [];
    public int $countComments = 0;

    public int $curPage = 1;
    public int $onPage = 10;

    public string $sort = 'new-first';
    public string $viewType = 'tree';


    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_Blog_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_Blog_Header';
        return new $class_Name();
    }


    protected function putCustomTemplates(): void
    {
        $this->tpSet->ArtHeader = new TpView_Blog_Art_Header();
        $this->tpSet->ArtInfoBar = new TpView_Blog_Art_InfoBar();
        $this->putArticleTemplate();
        $this->tpSet->ArtComments = new TpView_Blog_Art_Comments();
    }

    public function putArticleTemplate():void
    {

    }

    public function handleTpArtHeader():string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<div class="blog-container">'.
            $this->tpSet->ArtHeader->getResponseHtml();
    }

    public function handleTpArticle():string
    {
        return '<div class="art-content">'.$this->tpSet->Article->getResponseHtml().'</div>';
    }

    public function handleTpArtComments():string
    {
        return $this->tpSet->ArtComments->getResponseHtml().
            '</div>'.
            '</div>'.
            '</div>'.
            '</div>';
    }

    public function setUpCss():void
    {
        $this->css['blog-art-content'] = '/css/blog/blog-art-content.css';
        $this->css['blog-art-comments'] = '/css/blog/blog-art-comments.css';
        parent::setUpCss();;
    }

    public function setUpJs():void
    {
        $this->js['preloader'] = '/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js';
        $this->js['tinymce'] = '/js/tinymce/js/tinymce/tinymce.min.js';
        $this->js['blog-comments'] = '/js/blog/blog-comments.js';
        parent::setUpJs();
    }
}