<?php


namespace JointApp\Views\Siteman\SiteMap;



use JointApp\Views\TpView;

class TpView_Siteman_Sitemap_Update extends TpView
{
    public function getResponseHtml(): string
    {
        return '<a href="/sitemap.xml" title="sitemap">sitemap</a>';
    }
}