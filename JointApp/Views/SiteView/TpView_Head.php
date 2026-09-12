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

    public string $h1 = '';
    public string $metaDescription = '';

    public $js_set = [];
    public $css_set = [];


    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Head';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {
        if($this->metaDescription){
            if($this->langFile::META_DESCRIPTION){
                $metaDescription = $this->langFile::META_DESCRIPTION.' - '.$this->metaDescription;
            }else{
                $metaDescription =$this->metaDescription;
            }
        }else{
            $metaDescription = $this->langFile::META_DESCRIPTION;
        }

        $headText = '<head>'.
            '<meta http-equiv="content-type" content="text/html"; charset="utf-8"/>'.
            '<meta name="viewport" content="width=device-width, initial-scale=1.0">'.
            '<meta name="description" content="'.$metaDescription.'"/>';

        if (isset($viewData->robotNoIndex) and $viewData->robotNoIndex == true) {
            $headText.= '<meta name="robots" content="noindex">';
        }else{
            //seo link canonical
            if($this->langSl == ''){
                $headText .='<link rel="canonical" href="'.$this->siteName.$this->canonical.'" />';
            }

        }

        if($this->h1){
            if($this->langFile::PAGE_TITLE){
                $pageTitle = $this->langFile::PAGE_TITLE.' - '.$this->h1;
            }else{
                $pageTitle =$this->h1;
            }
        }else{
            $pageTitle = $this->langFile::PAGE_TITLE;
        }

        $headText.= '<title>'.$pageTitle.'</title>'.
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