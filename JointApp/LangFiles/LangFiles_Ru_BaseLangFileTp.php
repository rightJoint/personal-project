<?php

namespace JointApp\LangFiles;


use JointApp\Interfaces\LangFileInterface;

class LangFiles_Ru_BaseLangFileTp implements LangFileInterface
{
    public static function getLangFile():\stdClass
    {
        $langFile = new \stdClass();
        $langFile->testPhrase = 'Базовый-Языковой-Файл-Тестовый-Текст';
        return $langFile;
    }
}