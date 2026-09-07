<?php


namespace Src\Views\Blog;


use JointApp\Views\TpView;

class TpView_Blog_Table extends TpView
{
    public $artsList = [];
    public int $inRow = 0;

    const ART_COVERS = '/userdata/blog/covers';

    public $css = ['blog-main-table' => '/css/blog/blog-main-table.css'];


    public function getResponseHtml(): string
    {
        $return = '';
        $len_cnt = 0;
        //$inRow optional: count cells in table row
        $pag_length = 2;    //optional:

        foreach ($this->artsList as $num => $row) {

            if ($len_cnt == $this->inRow) {
                $len_cnt = 0;
            }

            if ($len_cnt == 0) {
                $return .= "<div class='blog-wrap-" . $this->inRow . "'>";
            }


            if ($row['refreshDate']) {
                $printDate = $this->langFile::ART_REFRESH_DATE.": " . $row['refreshDate'];
            } else {
                $printDate = $this->langFile::ART_PUB_DATE.": " . $row['pubDate'];
            }

            $return .= '<div class="blog-art-container">'.
                '<img src="'.self::ART_COVERS.'/'.$row['artImg'].'" alt="art-img">'.
                '<div class="blog-art-header">' .
                '<a href="'.$this->langSl.'/blog/article/'.$row['artRef'].'" title="'.$this->langFile::ART_LOOK_ON.' rightjoint.ru">'.
                $row['artName'].'</a>'.
                '<hr>'.
                '</div>'.
                '<div class="blog-art-refresh">'.$printDate.'</div>'.
                '<div class="blog-art-meta">'.$row['artMeta'].'</div>'.
                '<a class="blog-art-button" href="'.$this->langSl.'/blog/article/'.$row['artRef'].'" title="'.$this->langFile::ART_LOOK_ON.' rightjoint.ru">'.
                $this->langFile::ART_REF_WATCH.'</a>'.
                '</div>';

            if (($len_cnt + 1) == $this->inRow) {
                $return .= "</div>";
            }

            $len_cnt++;
        }

        return $return;

    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Table\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_Blog_Table';
        return new $class_Name();
    }
}