<?php

namespace JointApp\LangFiles\Views\Test\Home;



class LangFiles_En_Views_Test_Menu
{
    public static function getLinks():array
    {
        $links = array(
            'TestHome' => array(
                'text' => 'Web-тесты',
                'title' => 'Создание базы данных, проведение миграция, CRUD таблицы и записи',
            ),
            'migrations' => array(
                'text' => 'миграции',
                'title' => 'создание, контроль проведения минраций',
            ),
            'connection' => array(
                'text' => 'Статус Sql-сервера',
                'title' => 'создание, контроль проведения минраций',
            ),
            'migrationslog' => array(
                'text' => 'migrationsLog',
                'title' => 'создание, контроль проведения минраций',
            ),
            'records' => array(
                'text' => 'записи в таблицах',
                'title' => 'структура записи берется из базы данных',
            ),
            'tables' => array(
                'text' => 'таблицы',
                'title' => 'работа с таблицами',
            ),
        );

        return $links;
    }
}