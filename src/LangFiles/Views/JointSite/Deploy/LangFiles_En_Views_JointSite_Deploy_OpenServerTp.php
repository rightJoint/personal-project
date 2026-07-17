<?php

use JointApp\Interfaces\LangFileInterface;

class LangFiles_En_Views_JointSite_Deploy_OpenServerTp implements LangFileInterface
{
    public static function getLangFile():\stdClass
    {
        $langFile = new \stdClass();
        $langFile->h3 = 'Deploy on OpenServer (OS Windows)';
        $langFile->p1 = 'To Deploy this site locally on OpenServer follow next sequence of actions:';
        $langFile->h4_1 = 'Clone repository';
        $langFile->cm_1 = 'exec clone repository command';
        $langFile->h4_2 = 'Edit file hosts';
        $langFile->p2 = 'File hosts is located under directory C:\Windows\System32\drivers\etc';
        $langFile->cm_2 = 'Edit host add row with ip and domain name';
        $langFile->h4_3 = 'Open Server configuration';
        $langFile->p3_1 = 'This site tests locally on Open Server Panel version 5.4.3.0';
        $langFile->p3_2_1 = 'Set modules configuration like that:';
        $langFile->p3_2_2 = 'Other modules is not use to using.';
        $langFile->p3_3 = 'Don"t forget to add directory of your domain on the tab Domains of OS Panel.';
        $langFile->cm_3 = 'The link must refers to src folder.';
        $langFile->p4 = 'Setup and update php composer.';
        $langFile->cm_4 = 'Update command';
        $langFile->h4_5 = 'Make symbol links';
        $langFile->p5 = 'After completing all these steps, the site should be accessible at http://personal-project.web';
        return $langFile;
    }
}