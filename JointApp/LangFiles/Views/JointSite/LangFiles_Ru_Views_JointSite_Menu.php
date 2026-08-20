<?php

namespace JointApp\LangFiles\Views\JointSite;



class LangFiles_Ru_Views_JointSite_Menu
{
    public static function getLinks():array
    {
        $links = array(
            'setup' => array(
                'title' => 'Развернуть проект',
                'text' => 'Установка',
            ),
            'architecture' => array(
                'title' => 'Устройство проекта',
                'text' => 'Архитектура',
            ),
            'setup_os' => array(
                'title' => 'Развернуть на OS-панели',
                'text' => 'Open server',
            ),
            'architecture_view' => array(
                'title' => 'Представления (Экраны)',
                'text' => 'Вью',
            ),
            'architecture_view_tp' => array(
                'title' => 'Шаблонное представление',
                'text' => 'Template вью',
            ),
            'architecture_view_web' => array(
                'title' => 'Вэб-страница',
                'text' => 'web вью',
            ),
            'architecture_lc' => array(
                'title' => 'Жизненный цикл запроса',
                'text' => 'Запрос',
            ),
            'architecture_app' => array(
                'title' => 'Приложение и компоненты',
                'text' => 'Приложение JointSite',
            ),
            'architecture_mvc' => array(
                'title' => 'Паттерн MVC',
                'text' => 'MVC',
            ),
            'architecture_model' => array(
                'title' => 'Модели приложения',
                'text' => 'Модель',
            ),
            'controller' => array(
                'title' => 'Контроллеры приложения',
                'text' => 'Контроллер',
            ),
            'user' => array(
                'title' => 'Пользователи приложения',
                'text' => 'Пользователь',
            ),
            'tests' => array(
                'title' => 'Тесты php-unit',
                'text' => 'Тесты',
            ),
            'setup_hosting' => array(
                'title' => 'установка на хостинг',
                'text' => 'Хостинг',
            ),
            'setup_migrations' => array(
                'title' => 'Проведение миграция',
                'text' => 'Миграции',
            ),
            'directories' => array(
                'title' => 'Основные папки проекта',
                'text' => 'Директории',
            ),
            'siteview' => array(
                'title' => 'Site-view',
                'text' => 'Вьюшка сайта',
            ),
            'lang' => array(
                'title' => 'Страницы на разных языках',
                'text' => 'Языковые файлы',
            ),
            'JsHome' => array(
                'title' => 'Приложение JointSite',
                'text' => '',
            ),
        );
        return $links;
    }
}