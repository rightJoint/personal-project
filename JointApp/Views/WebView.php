<?php


namespace JointApp\Views;



use JointApp\Views\SiteView\TpView_Footer;
use JointApp\Views\SiteView\TpView_Head;
use JointApp\Views\SiteView\TpView_Header;
use JointApp\Views\SiteView\TpView_ModalMenu;
use JointApp\Views\SiteView\TpView_ModalUser;

class WebView
{
    public string $userLang = 'ru';

    protected \stdClass $tpSet;
    public \stdClass $langFile;

    protected $js = ['googleapis' => '/js/googleapis.js',];
    protected $css = ['webview' => '/css/WebView/webview.css',];

    public $js_set = [];
    public $css_set = [];

    public function __construct()
    {
        $this->setUpTemplates();
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
    public function setUpLangFiles():void
    {
        $this->langFile = new \stdClass();
        foreach (get_object_vars($this->tpSet) as $key => $val){
            $replace = 'replaceDefault'.$key.'Lang';
            //put custom langFile into template view
            if(method_exists($this, $replace)){
                $tpLang = $this->$replace();
            }else{
                $tpLang = $this->tpSet->$key->loadViewLang($this->userLang);
            }
            $this->langFile->$key = $tpLang;
        }
    }

    //get all js from each tp-view
    public function setUpJs()
    {
        $this->js_set = $this->js;
        foreach ($this->tpSet as $key => $val){
            $this->js_set =array_merge($this->js_set, $this->tpSet->$key->getJs());
        }
    }

    //get all css from each tp-view
    public function setUpCss()
    {
        $this->css_set = $this->css;
        foreach ($this->tpSet as $key => $val){
            $this->css_set =array_merge($this->css_set, $this->tpSet->$key->getCss());
        }
    }

    //copy public params from this to template view params
    public function updateTpData()
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
    public function mkWebPage():string
    {
        $html = '';
        foreach ($this->tpSet as $key => $val){
            $this->tpSet->$key->setLangFile($this->langFile->$key);
            $method = 'handleTp'.$key;
            //handle custom tp-view
            if(method_exists($this, $method)){
                $html .= $this->$method();
            }else{
                $html .= $this->tpSet->$key->renderView();
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