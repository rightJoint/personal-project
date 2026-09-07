<?php


namespace Src\Views\Blog\IT;


use Src\Views\Blog\SiteView_Blog_Art;

class SiteView_Blog_IT_FiftySqlQuestions extends SiteView_Blog_Art
{
    public function putArticleTemplate(): void
    {
        $this->tpSet->Article = new TpView_Blog_IT_FiftySqlQuestions();
    }

    public function handleTpArticle():string
    {
        return '<div class="art-content">'.$this->tpSet->Article->getResponseHtml().'</div>';
    }
}