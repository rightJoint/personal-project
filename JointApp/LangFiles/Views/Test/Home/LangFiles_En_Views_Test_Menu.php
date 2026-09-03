<?php

namespace JointApp\LangFiles\Views\Test\Home;



class LangFiles_En_Views_Test_Menu
{
    public static function getLinks():array
    {
        $links = array(
            'TestHome' => array(
                'text' => 'Web-tests',
                'title' => 'Create database, make migrations, CRUD tables and records',
            ),
            'migrations' => array(
                'text' => 'Migrations',
                'title' => 'Create, make and log migrations',
            ),
            'connection' => array(
                'text' => 'Sql-status',
                'title' => 'Create database, sql-server status',
            ),
            'migrationslog' => array(
                'text' => 'migrationsLog',
                'title' => 'Logs migrations',
            ),
            'records' => array(
                'text' => 'Records',
                'title' => 'CRUD records',
            ),
            'tables' => array(
                'text' => 'Tables',
                'title' => 'CRUD tables',
            ),
        );

        return $links;
    }
}