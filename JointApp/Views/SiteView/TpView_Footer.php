<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;


class TpView_Footer extends TpView
{
    public bool $robotNoIndex = false;

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_Footer';
        return new $class_Name();
    }

    public function renderView():string
    {
        $pageFooter = '<div class="contentBlock-frame dark ft"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<footer>'.
            '<div class="ft-service">';

        //no-index-image
        if($this->robotNoIndex){
            $pageFooter.='<img src="/img/popimg/no-index.png" style="height: 2em; width: auto; border:0; max-height: 31px; max-width: 88px;" '.
                'alt="'.$this->langFile::NO_INDEX_ALT.'" title="'.$this->langFile::NO_INDEX_TITLE.'"/>';
        }
        //metrika
        else{
            $pageFooter.='<img src="/img/y_metrika.png" style="height: 2em; width: auto; border:0; max-height: 31px; max-width: 88px;" '.
                'alt="'.$this->langFile::METRIC_ALT.'" title="'.$this->langFile::METRIC_TITLE.'" '.
                'class="ym-advanced-informer" data-cid="44136454" data-lang="'.$this->langFile::LANG_LW.'" />';
        }

        $buttons = '<img src="/img/footer-cats.png" style="height: 2em; width: auto; border:0; max-height: 31px; max-width: 88px;" '.
            'alt="'.$this->langFile::CATS_ALT.'" title="'.$this->langFile::CATS_TITLE.'"/>';

        $pageFooter.= '</div><div class="ft-center"><hr><span>by Right Joint</span></div>'.
            '<div class="ft-right">'.
            $buttons.
            '</div>'.
            '</footer>'.
            '</div></div></div>';
        return $pageFooter;
    }

    public static function getCss(): array
    {
        return array(
            'siteFooter' => '/css/WebView/site-footer.css',
        );
    }
}