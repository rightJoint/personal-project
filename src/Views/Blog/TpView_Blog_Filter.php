<?php


namespace Src\Views\Blog;


use JointApp\Views\TpView;

class TpView_Blog_Filter extends TpView
{
    public $filterCats = [];

    public $css = ['blog-main-filter' => '/css/blog/blog-main-filter.css'];

    public function getResponseHtml(): string
    {
        $return =
            '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<div class="blog-filter">'.
            '<div class="blog-filter-cat">'.
            '<label for="blog-filter-cat">'.$this->langFile::SEARCH_IN_CAT.'</label>'.
            '<select id="blog-filter-cat">';

        $catCounter = 0;
        foreach ($this->filterCats as $cat_id => $catName){
            $selected = '';
            if($catCounter == 0){
                $selected = ' selected';
            }
            $return .= '<option value="'.$cat_id.'"'.$selected.'>'.$catName.'</option>';

            $catCounter++;
        }
        $return .='</select>'.
            '</div>'.
            '<div class="blog-filter-artName">'.
            '<input type="text" id="blog-filter-artName" value="" placeholder="'.$this->langFile::SEARCH_ART_PS.'">'.
            '<button onclick="filterBlog()"><img src="/img/popimg/search-icon.png">'.$this->langFile::SEARCH_ART_BTN.'</button>'.
            '</div>'.
            /*'<div class="blog-filter-tags">'.
            '<span>Тэги:</span>'.
            '<span>php</span>'.
            '<span>job</span>'.
            '<span>xxx</span>'.
            '</div>'.*/
            '</div></div></div></div>';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Filter\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_Blog_Filter';
        return new $class_Name();
    }
}