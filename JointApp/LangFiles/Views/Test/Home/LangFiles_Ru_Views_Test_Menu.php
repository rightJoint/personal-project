<?php

namespace JointApp\LangFiles\Views\Test\Home;



class LangFiles_Ru_Views_Test_Menu
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
                'title' => 'создание, контроль проведения миграций',
            ),
            'connection' => array(
                'text' => 'Статус Sql-сервера',
                'title' => 'Создать БД, cтатус SQL-сервера',
            ),
            'migrationslog' => array(
                'text' => 'migrationsLog',
                'title' => 'Лог миграций, результаты проведения миграция',
            ),
            'records' => array(
                'text' => 'Записи',
                'title' => 'CRUD записей',
            ),
            'tables' => array(
                'text' => 'Таблицы',
                'title' => 'CRUD таблиц',
            ),
        );
        return $links;
    }
}