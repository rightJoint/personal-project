<?php

namespace Src\LangFiles\Views\JointSite\Design\View;


use JointApp\Interfaces\LangFileInterface;

class LangFiles_En_V_JS_D_V_TpViewTp implements LangFileInterface
{
    public static function getLangFile():\stdClass
    {
        $langFile = new \stdClass();
        $langFile->h3 = 'Template view';
        $langFile->p1 = 'Template view intended for making html-code of some blocks of web-page, ex. '.
            'footer, header, auth-form etc.';
        $langFile->p2 = 'How view looks like, depends on:';
        $langFile->p2_li1 = 'static texts in different languages';
        $langFile->p2_li2 = 'dynamic data, that handled and output';
        $langFile->p2_li3 = 'links references depends on canonical pages';
        $langFile->p2_li4 = 'Outlook and behavior on clients side depends on css and java-scripts';

        $langFile->h4_0 = 'TemplateViewInterface';
        $langFile->p_0_1 = 'Methods for working with template view are declared in TemplateViewInterface.';
        $langFile->p_0_2 = 'Method renderView generate http code, it accepts next variables:';
        $langFile->p_0_li1 = '\stdClass $lanFile - lang file';
        $langFile->p_0_li2 = '\stdClass $viewData - handled and displayed data';
        $langFile->p_0_li3 = 'string $langSl = "" - lang wildcard for http refs';

        $langFile->h4_1 = 'Lang-files';
        $langFile->p3_1 = 'Land files with texts - are std-classes, which put into specific files apart from app data and html code. '.
            'Method loadViewLang is for load them.';
        $langFile->cm_1 = 'Rewrite string $class_Name following template above for yours lang-files.';
        $langFile->p3_2 = 'Method loadViewLang is for overwriting, it accepts users lang.';

        $langFile->h4_2 = 'Dynamic data';
        $langFile->p4 = 'Dynamic data as well as are std-classes, they are results of app controllers and models works.';


        $langFile->h4_3 = 'http-links';
        $langFile->p5 = 'If uri hasn"t users lang, your will get html code in default language, '.
            'also this page will be origin, and the page with wildcard will be canonical. So wildcard $langSl should '.
            'be added to http-refs depending on you want to follow canonical everywhere.';

        $langFile->h4_4 = 'js and css';
        $langFile->p6_1 = 'To use js and css-files, are needed to be set in array of id->ref format in '.
            'getJS() and getСss() functions';
        $langFile->p6_2 = 'To scripts get folded into html-tags are intended functions printJs() и printCss()';

        $langFile->h4_5 = 'Example of usage the template view';
        $langFile->cm_2 = 'This snippet displays the block with this text on the page in browser. It hasn"t '.
            'dynamic data, so it having empty std-class on its data input';

        return $langFile;
    }
}