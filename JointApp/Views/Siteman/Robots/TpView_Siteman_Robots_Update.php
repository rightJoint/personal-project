<?php


namespace JointApp\Views\Siteman\Robots;



use JointApp\Views\TpView;

class TpView_Siteman_Robots_Update extends TpView
{
    public function getResponseHtml(): string
    {
        return '<a href="/robots.txt" title="robots">robots</a>';
    }
}