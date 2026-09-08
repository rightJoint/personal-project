<?php


namespace Src\Views\Blog\IT;


use Src\Views\Blog\SiteView_Blog_Art;

class SiteView_Blog_IT_PhpStormResetTrial extends SiteView_Blog_Art
{
    public function putArticleTemplate(): void
    {
        $this->tpSet->Article = new TpView_Blog_IT_PhpStormResetTrial();
    }
}