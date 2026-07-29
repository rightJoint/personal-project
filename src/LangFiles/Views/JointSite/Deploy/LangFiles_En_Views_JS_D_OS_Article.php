<?php

namespace Src\LangFiles\Views\JointSite\Deploy;



class LangFiles_En_Views_JS_D_OS_Article
{
    const H3 = 'Deploy on OpenServer (OS Windows)';
    const P1 = 'To Deploy this site locally on OpenServer follow next sequence of actions:';
    const H4_1 = 'Clone repository';
    const CM_1 = 'exec clone repository command';
    const H4_2 = 'Edit file hosts';
    const P2 = 'File hosts is located under directory C:\Windows\System32\drivers\etc';
    const CM_2 = 'Edit host add row with ip and domain name';
    const H4_3 = 'Open Server configuration';
    const P3_1 = 'This site tests locally on Open Server Panel version 5.4.3.0';
    const P3_2_1 = 'Set modules configuration like that:';
    const P3_2_2 = 'Other modules is not use to using.';
    const P3_3 = 'Don"t forget to add directory of your domain on the tab Domains of OS Panel.';
    const CM_3 = 'The link must refers to src folder.';
    const P4 = 'Setup and update php composer.';
    const CM_4 = 'Update command';
    const H4_5 = 'Make symbol links';
    const P5 = 'After completing all these steps, the site should be accessible at http://personal-project.web';
}