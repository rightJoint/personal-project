<?php

namespace JointApp\LangFiles\Views\Siteman\Robots;



class LangFiles_Ru_Views_Sm_Robots_SubMenu
{
    public static function getLinks():array
    {
        return array(
            'home' => array(
                'title' => 'Редактировать robots.txt',
                'text' => 'Роботс',
            ),
            'create' => array(
                'title' => 'Обновить robots.txt',
                'text' => 'Обновить',
            ),
        );
    }
}