<?php


namespace Src\Views\Blog\Others;


use Src\Views\Blog\Others\TpView_Blog_Others_RightJointUpdated;
use Src\Views\Blog\SiteView_Blog_Art;

class SiteView_Blog_Others_RightJointUpdated extends SiteView_Blog_Art
{
    public function putArticleTemplate(): void
    {
        $this->tpSet->Article = new TpView_Blog_Others_RightJointUpdated();
    }
}