<?php


namespace Src\Views\Blog;


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
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
        '<div class="contentBlock-wrap">'.
        '<div class="blog-options">'.
        $this->printCountArts().
        '<div class="blog-pagination">'.
        $this->paginationPrint().
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

    public function paginationPrint():string
    {
        $length = 2;        //optional: count cells in table row
        $pag_length = 2;    //optional:
        if(round($this->blogCountArts/$this->onPage) - $this->blogCountArts/$this->onPage < 0){
            $page_count = round($this->blogCountArts/$this->onPage) + 1;
        }else{
            $page_count =  round($this->blogCountArts/$this->onPage);
        }

        $p_add_num_start = 0;

        if($this->curPage - $pag_length < 1){
            $p_add_num_start = $pag_length - $this->curPage +1;
        }

        $end_p_num = $this->curPage + $pag_length + $p_add_num_start;
        if($end_p_num > $page_count){
            $end_p_num = $page_count;
        }

        $start_p_num = $this->curPage - $pag_length + $p_add_num_start;
        if($end_p_num - $pag_length*2  < $start_p_num){
            $start_p_num = $end_p_num - $pag_length*2;
        }
        if($start_p_num < 1){
            $start_p_num = 1;
        }
        $page_list = null;
        for ($i = $start_p_num; $i <= $end_p_num; $i++){
            if ($this->curPage == $i){
                $page_list .= '<span class = "p_num active" page="'.$i.'">'.$i.'</span>';
            }else{
                if($i == 1){
                    $page_list .= '<span class = "p_num" page="'.$i.'" '.
                        '>'.$i.'</span>';
                }else{
                    $page_list .= '<span class = "p_num" page="'.$i.'" '.
                        '>'.$i.'</span>';
                }
            }
        }

        if($this->curPage < $page_count){
            $btn_nex = '<span class="p_btn next" page="'.($this->curPage+1).'" '.
                '>'.$this->langFile::PG_NEXT.'</span>';
        }else {
            $btn_nex = '<span class="p_btn next active" page="'.$this->curPage.'">'.$this->langFile::PG_NEXT.'</span>';
        }

        if ($this->curPage > 1){
            $btn_pre = '<span class="p_btn prev" page="'.($this->curPage-1).'" '.
                '>'.$this->langFile::PG_BACK.'</span>';
        }else {
            $btn_pre = '<span class="p_btn prev active" page="'.$this->curPage.'">'.$this->langFile::PG_BACK.'</span>';
        }

        return $btn_pre.$page_list.$btn_nex;
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