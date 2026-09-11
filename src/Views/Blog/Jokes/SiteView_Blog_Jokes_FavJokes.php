<?php

namespace Src\Views\Blog\Jokes;


use Src\Views\Blog\SiteView_Blog_Art;

class SiteView_Blog_Jokes_FavJokes extends SiteView_Blog_Art
{
    public function putArticleTemplate(): void
    {
        $this->tpSet->Article = new TpView_Blog_Jokes_FavJokes();
    }
}