<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;

class TpView_Head extends TpView
{
    public bool $robotNoIndex = false;
    public string $siteName = 'http://personal-project.web';
    public string $shortcutIcon = '/img/siteLogo/favicon.png';

    public string $userLang = 'ru';
    public string $langSl = '';

    public string $canonical = '';

    public $js_set = [];
    public $css_set = [];


    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Head';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {
        $headText = '<head>'.
            '<meta http-equiv="content-type" content="text/html"; charset="utf-8"/>'.
            '<meta name="viewport" content="width=device-width, initial-scale=1.0">'.
            '<meta name="description" content="'.$this->langFile::META_DESCRIPTION.'"/>';

        if (isset($viewData->robotNoIndex) and $viewData->robotNoIndex == true) {
            $headText.= '<meta name="robots" content="noindex">';
        }else{
            //yandex metrika
            $headText.='<meta name="yandex-verification" content="xxx" />';

            //seo link canonical
            if($this->langSl == ''){
                $headText .='<link rel="canonical" href="'.$this->siteName.$this->canonical.'" />';
            }

        }

        $headText.= '<title>'.$this->langFile::PAGE_TITLE.'</title>'.
            '<link rel="SHORTCUT ICON" href="'.$this->shortcutIcon.'" type="image/png">';

        foreach ($this->css_set as $style) {
            $headText.= '<link rel="stylesheet" href="'.$style.'" type="text/css" media="screen, projection"/>';
        }

        foreach ($this->js_set as $script) {
            $headText.= '<script src="'.$script.'"></script>';
        }

        $headText.= '</head>';

        return $headText;
    }
}