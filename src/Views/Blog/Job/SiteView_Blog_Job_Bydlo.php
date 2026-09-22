<?php


namespace Src\Views\Blog\Job;


use Src\Views\Blog\SiteView_Blog_Art;

class SiteView_Blog_Job_Bydlo extends SiteView_Blog_Art
{
    public function putArticleTemplate(): void
    {
        $this->tpSet->Article = new TpView_Blog_Job_Bydlo();
    }
}