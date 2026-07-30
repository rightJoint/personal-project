<?php
namespace Src\LangFiles\Views\JointSite\Design\View;

class LangFiles_En_V_JS_D_V_WV_Article
{
    const H3 = 'Design - Web-view';
    const P1 = 'Web view meant to gather tp-views into solid web-page and realized a few public methods for that, '.
    'automate customization and copying data.';
    const P2 = 'Firstly, on construct, private function setUpTemplates():void is calling. This function setup main '.
    'tp-views sequence in protected variable \stdClass $tpSet.';
    const P3 = 'To put custom templates into $tpSet the function putCustomTemplates() is.';
    const P4 = 'function <b>setUpLangFiles</b> collects default langFiles throughout $tpSet into $langFile variable to put them '.
    'after into tp-views while making html.';
    const P5 = 'To set up custom lang-file into $tpSet create new protected method using template replaceDefault".$key."Lang"() '.
    'where $key is wildcard for the custom tp-view and it will called automatically.';
    const P6 = 'After that, public params must be set before they are copied into tp-views. Its typically controllers work in the app.';
    const P7 = 'function <b>setUpJs()</b> collects  js into $js_set throughout tp-views in $tpSet';
    const P8 = 'function <b>setUpCss()</b> collects css into $css_set throughout tp-views in $tpSet';
    const P9 = 'Calling these functions automatically preparing data for Head tp-view.';
    const P10 = 'Next, public params of each tp-view into $tpSet needs to be updated and '.
    'there is <b>updateTpData()</b> function for that.';
    const P11 = 'Finally, to wrap html of template view into tags create new protected method using template handleTp".$key."() '.
    'where $key is wildcard for the custom tp-view and it will called automatically';
    const P12 = 'At the end, <b>mkWebPage()</b> returns html of the web-page.';
    const H4 = 'Example';
    const P13 = 'There are five method, described above, to get success.';
}