<?php


namespace JointApp\Views\JointSite\Design\View;



use JointApp\Views\TpView;

class TpView_JointSite_D_V_WebView extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public function getResponseHtml():string
    {
        return
            '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            '<p>'.$this->langFile::P1.'</p>'.
            '<p>'.$this->langFile::P2.'</p>'.
            '<p>'.$this->langFile::P3.'</p>'.
            '<p>'.$this->langFile::P4.'</p>'.
            '<p>'.$this->langFile::P5.'</p>'.
            '<p>'.$this->langFile::P6.'</p>'.
            '<p>$this->userLang = "en".</p>'.
            '<p>'.$this->langFile::P7.'</p>'.
            '<p>'.$this->langFile::P8.'</p>'.
            '<p>'.$this->langFile::P9.'</p>'.
            '<p>'.$this->langFile::P10.'</p>'.
            '<p>'.$this->langFile::P11.'</p>'.
            '<p>'.$this->langFile::P12.'</p>'.
            '<h4>'.$this->langFile::H4.'</h4>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>require __DIR__ . "/vendor/autoload.php";</li>'.
            '<li></li>'.
            '<li>use JointApp\Views\WebView;</li>'.
            '<li></li>'.
            '<li>$webView = new WebView();</li>'.
            '<li>$webView->userLang = "en";</li>'.
            '<li>$webView->setUpLangFiles();</li>'.
            '<li>$webView->setUpCss();</li>'.
            '<li>$webView->setUpJs();</li>'.
            '<li>$webView->updateTpData();</li>'.
            '<li>$html = $webView->mkWebPage();</li>'.
            '<li></li>'.
            '<li>echo $html;</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">This code displays web-view</div>'.
            '<h4>WebViewInterface</h4>'.
            '<p>'.$this->langFile::P13.
            '<ul>'.
            '<li>public function setUpLangFiles():void;</li>'.
            '<li>public function setUpJs():void;</li>'.
            '<li>public function setUpCss():void;</li>'.
            '<li>public function updateTpData():void;</li>'.
            '<li>public function mkWebPage():string;</li>'.
            '</ul>'.
            '</p>'.
            '</section>'.
            '</article>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\JointSite\Design\View\LangFiles_'.self::ucfirstLang($this->userLang).'_V_JS_D_V_WV_Article';
        return new $class_Name();
    }
}