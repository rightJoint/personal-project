<?php

namespace JointApp\LangFiles\Views\Siteman\Sitemap;



class LangFiles_Ru_Views_Sm_Sitemap_SubMenu
{
    public static function getLinks():array
    {
        return array(
            'home' => array(
                'title' => 'Создать карту сайта',
                'text' => 'Карта сайта',
            ),
            'create' => array(
                'title' => 'Обновить карту сайта',
                'text' => 'Обновить',
            ),
        );
    }
}