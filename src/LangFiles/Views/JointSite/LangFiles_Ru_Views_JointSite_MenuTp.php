<?php

use JointApp\LangFiles\LangFiles_Ru_BaseLangFileTp;


class LangFiles_Ru_Views_JointSite_MenuTp extends LangFiles_Ru_BaseLangFileTp
{
    public static function getLangFile(): \stdClass
    {
        $langFile = new stdClass();

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
        );

        $langFile->httpLinks = $links;

        return $langFile;
    }
}