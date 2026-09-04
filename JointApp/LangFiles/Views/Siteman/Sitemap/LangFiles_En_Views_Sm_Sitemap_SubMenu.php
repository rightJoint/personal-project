<?php

namespace JointApp\LangFiles\Views\Siteman\Sitemap;



class LangFiles_En_Views_Sm_Sitemap_SubMenu
{
    public static function getLinks():array
    {
        return array(
            'home' => array(
                'title' => 'Create site map',
                'text' => 'Sitemap',
            ),
            'create' => array(
                'title' => 'Update site map',
                'text' => 'Update',
            ),
        );
    }
}