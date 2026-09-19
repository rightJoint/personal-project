<?php


namespace Src\Views\Blog\Pets;


use Src\Views\Blog\SiteView_Blog_Art;

class SiteView_Blog_Pets_BlondKitty11Y extends SiteView_Blog_Art
{
    public function putArticleTemplate(): void
    {
        $this->tpSet->Article = new TpView_Blog_Pets_BlondKitty11Y();
    }
}