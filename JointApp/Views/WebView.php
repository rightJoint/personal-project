<?php


namespace JointApp\Views;



use JointApp\Interfaces\WebViewInterface;
use JointApp\Views\SiteView\TpView_Footer;
use JointApp\Views\SiteView\TpView_Head;
use JointApp\Views\SiteView\TpView_Header;
use JointApp\Views\SiteView\TpView_ModalMenu;
use JointApp\Views\SiteView\TpView_ModalUser;

class WebView extends View
{
    public string $userLang = 'ru';
    public string $langSl = '';
    public string $uri_pq = '';

    protected \stdClass $tpSet;

    protected $js = ['googleapis' => '/js/googleapis.js',];
    protected $css = ['webview' => '/css/WebView/webview.css',];

    public $js_set = [];
    public $css_set = [];

    public string $h1 = '';
    public string $metaDescription = '';

    public function __construct()
    {
        $this->setUpTemplates();
    }

    public function handleViewParams():void
    {
        $this->setUpCss();
        $this->setUpJs();
        $this->updateTpData();
    }

    private function setUpTemplates():void
    {
        $this->tpSet = new \stdClass();
        $this->tpSet->Head = new TpView_Head();
        $this->tpSet->Header = new TpView_Header();
        $this->putCustomTemplates();
        $this->tpSet->Footer = new TpView_Footer();
        $this->tpSet->ModalUser = new TpView_ModalUser();
        $this->tpSet->ModalMenu = new TpView_ModalMenu();
    }

    //put custom templates view
    protected function putCustomTemplates():void
    {

    }

    //get all langFiles from each tp-view
    public function getDefaultLang()
    {
        $langFile = new \stdClass();
        foreach (get_object_vars($this->tpSet) as $key => $val){
            $replace = 'replaceDefault'.$key.'Lang';
            //put custom langFile into template view
            if(method_exists($this, $replace)){
                $tpLang = $this->$replace();
            }else{
                $tpLang = $this->tpSet->$key->getDefaultLang();
            }
            $langFile->$key = $tpLang;
        }
        return $langFile;
    }

    //get all js from each tp-view
    protected function setUpJs():void
    {
        $this->js_set = $this->js;
        foreach ($this->tpSet as $key => $val){
            $this->js_set =array_merge($this->js_set, $this->tpSet->$key->getJs());
        }
        $this->tpSet->Head->js_set = $this->js_set;
    }

    //get all css from each tp-view
    protected function setUpCss():void
    {
        $this->css_set = $this->css;
        foreach ($this->tpSet as $key => $val){
            $this->css_set =array_merge($this->css_set, $this->tpSet->$key->getCss());
        }
        $this->tpSet->Head->css_set = $this->css_set;
    }

    //copy public params from this to template view params
    protected function updateTpData():void
    {
        foreach ($this->tpSet as $key => $val){
            foreach ($this->tpSet->$key as $tPkey => $tPval){
                if(isset($this->$tPkey)){
                    $this->tpSet->$key->$tPkey = $this->$tPkey;
                }
            }
        }
    }

    //glue html of each tp-view
    public function getResponseHtml():string
    {
        $html = '<script>var langSl="'.$this->langSl.'"</script>';
        foreach ($this->tpSet as $key => $val){
            $this->tpSet->$key->handleViewParams();
            $this->tpSet->$key->setUpCustomLang($this->langFile->$key);
            $method = 'handleTp'.$key;
            //handle custom tp-view
            if(method_exists($this, $method)){
                $html .= $this->$method();
            }else{
                $html .= $this->tpSet->$key->getResponseHtml();
            }
        }
        return $html;
    }

    protected static function ucfirstLang(string $lang = ''):string
    {
        if(!empty($lang)){
            return  ucfirst(strtolower($lang));
        }
        //default lang "ru"
        else{
            return  'Ru';
        }
    }
}