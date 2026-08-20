<?php


namespace JointApp\Views\JointSite\Design;



use JointApp\Views\TpView;


class TpView_JointSite_A_Lc_Article extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        return '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.'</section>'.
            '<h3>htaccess</h3>'.
            '<p>The .htaccess file has standart commands to redirect all request to the site to the index.php. '.
            'So src/index.php is the only one program entry point of the app</p>'.
            '<h3>index.php</h3>'.
            '<p>index doing next sequeqnse of actions'.
            '<ul>'.
            '<li>Make uri</li>'.
            '<li>Make request</li>'.
            '<li>Make midelware</li>'.
            '<li>Make handler</li>'.
            '<li>Make middelware and process, make responce</li>'.
            '<li>Handle response</li>'.
            '</ul></p>'.
            '<h3>uri</h3>'.
            '<h3>request</h3>'.
            '<h3>midelware</h3>'.
            '<h3>handler</h3>'.
            '<h3>responce</h3>'.
            '<h3>Handle response</h3>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_JointSite_A_Lc_Article';
        return new $class_Name();
    }
}