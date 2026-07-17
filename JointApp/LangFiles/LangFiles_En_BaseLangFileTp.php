<?php
namespace JointApp\LangFiles;


use JointApp\Interfaces\LangFileInterface;

class LangFiles_En_BaseLangFileTp implements LangFileInterface
{
    public static function getLangFile():\stdClass
    {
        $langFile = new \stdClass();
        $langFile->testPhrase = 'Base-Lang-File-test-text';
        return $langFile;
    }
}