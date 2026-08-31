<?php

namespace JointApp\LangFiles\Views\Siteman;



class LangFiles_Ru_Views_Siteman_ModulesMenu
{
    public static function getLinks():array
    {
        return array(
            'home' => array(
                'title' => 'Управление сайтом',
                'text' => 'Управление',
            ),
            'users' => array(
                'title' => 'Управление пользователями',
                'text' => 'Пользователи',
            ),
            'sitemap' => array(
                'title' => 'Создать карту сайта',
                'text' => 'Карта сайта',
            ),
            'robots' => array(
                'title' => 'Не индексировать страницы',
                'text' => 'Роботс',
            ),
            'blog' => array(
                'title' => 'Управление блогом',
                'text' => 'Блог',
            ),
        );
    }
}