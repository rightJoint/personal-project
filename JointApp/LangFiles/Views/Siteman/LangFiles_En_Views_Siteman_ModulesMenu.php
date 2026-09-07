<?php

namespace JointApp\LangFiles\Views\Siteman;



class LangFiles_En_Views_Siteman_ModulesMenu
{
    public static function getLinks():array
    {
        return array(
            'home' => array(
                'title' => 'Website management',
                'text' => 'Management',
            ),
            'users' => array(
                'title' => 'Users management',
                'text' => 'Users',
            ),
            'sitemap' => array(
                'title' => 'Create sitemap',
                'text' => 'Sitemap',
            ),
            'robots' => array(
                'title' => 'No index pages',
                'text' => 'Robots',
            ),
            'blog' => array(
                'title' => 'Blog management',
                'text' => 'Blog',
            ),
        );
    }
}