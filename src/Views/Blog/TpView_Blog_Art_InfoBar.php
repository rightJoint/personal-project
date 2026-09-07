<?php


namespace Src\Views\Blog;


use JointApp\Views\TpView;

class TpView_Blog_Art_InfoBar extends TpView
{
    public $artRow = ['pubDate' => '', 'refreshDate' => ''];
    public $artTags = [];

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\InfoBar\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_Blog_InfoBar';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        $artTags = '';

        for ($i=0; $i<count($this->artTags); $i++){
            $artTags.='<span class="tag-value">'.$this->artTags[$i].'</span>';
        }

        $return = '<div class="blog-info">'.
        '<div class="blog-info-dates">'.
        '<span class="b-em-container">'.$this->langFile::BIB_CREATED.':</span>'.
        '<span class="b-em-value">'.$this->artRow['pubDate'].'</span>';
        if(!empty($this->artRow['refreshDate'])){
            $return.='<span class="b-em-container">'.$this->langFile::BIB_REFRESHED.':</span>'.
                '<span class="b-em-value">'.$this->artRow['refreshDate'].'</span>';
        }
        $return.='</div>'.

            '<div class="blog-info-tags">'.
            '<span class="b-em-container">'.$this->langFile::BIB_TAGS.':</span>'.
            $artTags.'</div>'.

            '</div>';

        return $return;
    }
}