<?php

namespace Src\LangFiles\Views\JointSite\Deploy;

use JointApp\Interfaces\LangFileInterface;

class LangFiles_Ru_Views_JointSite_Deploy_OpenServerTp implements LangFileInterface
{
    public static function getLangFile():\stdClass
    {
        $langFile = new \stdClass();
        $langFile->h3 = 'Установка на OpenServer (OS Windows)';
        $langFile->p1 = 'Для настройки сайта локально на OpenServer выполните следующую последовательность действий:';
        $langFile->h4_1 = 'Клонируйте репозиторий';
        $langFile->cm_1 = 'выполните команду для клонирования репозитория';
        $langFile->h4_2 = 'Редактирование файла hosts';
        $langFile->p2 = 'Файл hosts находится в папке C:\Windows\System32\drivers\etc';
        $langFile->cm_2 = 'Отредактируйте host добавив строку с именем вашего домена';
        $langFile->h4_3 = 'Конфигурация Open Server';
        $langFile->p3_1 = 'Сайт тестировался локально на Open Server Panel версия 5.4.3.0';
        $langFile->p3_2_1 = 'Установите следующую конфигурацию модулей:';
        $langFile->p3_2_2 = 'Другие модули не используются.';
        $langFile->p3_3 = 'Не забудте задать папку вашего домена на вкладке "Домены" OS панели.';
        $langFile->cm_3 = 'Ссылка должна указывать на папку src.';
        $langFile->p4 = 'Установите php composer и обновите файлы из репозиториев.';
        $langFile->cm_4 = 'Команда обновления';
        $langFile->h4_5 = 'Создайте символьные ссылки';
        $langFile->p5 = 'После выполнения всех этих действий сайт должен быть доступен в браузере по адресу http://personal-project.web';
        return $langFile;
    }
}