<?php


namespace Src\Views\Blog;


use JointApp\Views\Records\TpView_Pagination;
use JointApp\Views\TpView;

class TpView_Blog_Options extends TpView
{
    public int $blogCountArts = 0;
    public int $onPage = 4;
    public int $curPage = 1;

    public $css = ['blog-main-options' => '/css/blog/blog-main-options.css'];

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Options\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_Blog_Options';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        $pagination = new TpView_Pagination();
        $pagination->userLang = $this->userLang;
        $pagination->setUpCustomLang($pagination->getDefaultLang());
        $pagination->count = $this->blogCountArts;
        $pagination->curPage = $this->curPage;
        $pagination->onPage = $this->onPage;

        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
        '<div class="contentBlock-wrap">'.
        '<div class="blog-options">'.
        $this->printCountArts().
        '<div class="blog-pagination">'.
            $pagination->getResponseHtml().
        '</div>'.
        $this->printSortBlock().
        $this->printViewOptionsBlock().
        '</div></div></div></div>';
    }

    private function printCountArts():string
    {
        $return =
            '<div class="blog-count"><label>'.$this->langFile::FOUND_LABEL.'</label>'.
            '<span id="blog-count-arts">'.$this->blogCountArts.'</span></div>';

        return $return;
    }

    private function printSortBlock():string
    {
        $return =
            '<div class="blog-sort">'.
            '<label for="blog-sort-field">'.$this->langFile::BLOG_MAIN_SORT_FIELD.'</label>'.
            '<select id="blog-sort-field">'.
            '<option value="pubDate">'.$this->langFile::BLOG_MAIN_SF_DP.'</option>'.
            '<option value="refreshDate">'.$this->langFile::BLOG_MAIN_SF_DU.'</option>'.
            '<option value="artName">'.$this->langFile::BLOG_MAIN_SF_NAME.'</option>'.
            '</select>'.
            '<label for="blog-sort-order">'.$this->langFile::BLOG_MAIN_SORT_ORDER.'</label>'.
            '<select id="blog-sort-order">'.
            '<option value="DESC">'.$this->langFile::BLOG_MAIN_SO_ASC.'</option>'.
            '<option value="ASC">'.$this->langFile::BLOG_MAIN_SO_DESC.'</option>'.
            '</select>'.
            "</div>";
        return $return;
    }

    private function printViewOptionsBlock()
    {
        $return ='<div class="blog-view-options">'.
            '<label for="blog-on-page">'.$this->langFile::ON_PAGE_LABEL.'</label>'.
            '<select id="blog-on-page">'.
            '<option value="2">2</option>'.
            '<option value="3">3</option>'.
            '<option value="4" selected>4</option>'.
            '<option value="10">10</option>'.
            '</select>'.
            '<label for="blog-in-row">'.$this->langFile::IN_ROW_LABEL.'</label>'.
            '<select id="blog-in-row">'.
            '<option value="1">1</option>'.
            '<option value="2" selected>2</option>'.
            '<option value="3">3</option>'.
            '<option value="4">4</option>'.
            '</select>'.
            '</div>';
        return $return;
    }
}