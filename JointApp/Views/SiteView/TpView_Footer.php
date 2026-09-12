<?php


namespace JointApp\Views\SiteView;


use JointApp\Views\TpView;


class TpView_Footer extends TpView
{
    public bool $robotNoIndex = false;

    protected $css = array(
        'siteFooter' => '/css/WebView/site-footer.css',
    );

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Footer';
        return new $class_Name();
    }

    public function getResponseHtml():string
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
            $pageFooter.='<a href="https://metrika.yandex.ru/stat/?id=44136454&amp;from=informer" target="_blank" rel="nofollow">'.
                '<img src="https://informer.yandex.ru/informer/44136454/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" '.
                'style="width:auto; height:2em; border:0; max-height: 31px; max-width: 88px;" '.
                'alt="'.$this->langFile::METRIC_ALT.'" title="'.$this->langFile::METRIC_TITLE.'" '.
                'class="ym-advanced-informer" data-cid="44136454" data-lang="'.$this->langFile::LANG_LW.'" /></a>'.
                '<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(44136454, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>'.
                '<noscript><div><img src="https://mc.yandex.ru/watch/44136454" style="position:absolute; left:-9999px;" alt="" /></div></noscript>';
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
}