<?php

namespace JointApp\LangFiles\Views\JointSite\Design\View;



class LangFiles_En_V_JS_D_V_TV_Article
{
    const H3 = 'Template view';
    const P1 = 'Template view intended for making html-code of some blocks of web-page, ex. '.
    'footer, header, auth-form etc.';
    const P2 = 'How view looks like, depends on:';
    const P2_LI1 = 'dynamic data, that handled and output';
    const P2_LI2 = 'static texts in different languages';
    const P2_LI3 = 'outlook and behavior on clients side depends on css and java-scripts';

    const H4_0 = 'TemplateViewInterface';
    const P_0_1 = 'Methods for working with template view are declared in TemplateViewInterface.';
    const P_0_LI1 = 'returns default lang-file';
    const P_0_LI2 = 'set up custom lang-file';
    const P_0_LI3 = 'returns html of the block';
    const P_0_LI4 = 'returns js';
    const P_0_LI5 = 'returns css';

    const H4_1 = 'Lang-files';
    const P3_1 = 'Land files with texts - are any classes, which put into files apart from app data and html code. '.
    'Method loadViewLang is for load them.';
    const CM_1 = 'Rewrite string $class_Name following template above for yours lang-files.';
    const P3_2 = 'Method loadViewLang is for overwriting, it accepts users lang.';

    const H4_2 = 'Dynamic data';
    const P4 = 'Dynamic data are generally public params of template view, they are results of app controllers and models works.';


    const H4_3 = 'http-links';
    const P5 = 'If uri hasn"t users lang, your will get html code in default language, '.
    'also this page will be origin, and the page with wildcard will be canonical. So wildcard $langSl should '.
    'be added to http-refs depending on you want to follow canonical everywhere.';

    const H4_4 = 'js and css';
    const P6_1 = 'To use js and css-files, are needed to be set in array of id->ref format in '.
    'getJS() and getСss() functions';
    const P6_2 = 'To scripts get folded into html-tags are intended functions printJs() и printCss()';

    const H4_5 = 'Example of usage the template view';
    const CM_2 = 'This snippet displays the block with this text on the page in browser.';
}