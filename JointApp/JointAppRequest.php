<?php


namespace JointApp;


use JointFramework\Http\ServerRequest;


class JointAppRequest extends ServerRequest
{

    //default user lang
    private string $langDefault = 'ru';

    //app langs set
    private $acceptableLangs = ['en', 'ru',];

    //requested uri, userLang & path, no query
    private string $uri_lp = '';

    //requested uri, userLang, path & query
    public string $uri_lpq = '';

    //requested uri, path & query, no userLang
    public string $uri_pq = '';

    //exploded uri path, has user lang, no query
    public $routes = [];

    //exploded uri path without user lang and query
    public $routes_ns = [];

    //JointAppRequest define userLang by uri path or by default
    public string $userLang = 'ru';

    //wildcard for hrefs contains slash. if uri path has no $langSl, the page is canonical to page/userLang
    public string $langSl = '';

    //????canonical page, langDefault and uri_p or empty
    public string $canonical = '';


    function __construct(string $method, $uri, array $headers = [], $body = null, string $version = '1.1', array $serverParams = [])
    {
        parent::__construct($method, $uri, $headers, $body, $version, $serverParams);
        $this->prepareRequest();
    }

    private function prepareRequest()
    {
        $uri = $this->getUri();
        $this->uri_lp = $uri->getPath();
        $this->uri_lpq = $this->uri_lp;
        if($query = $uri->getQuery()){
            $this->uri_lpq.= '?'.$query;
        }
        $this->routes = explode('/', $uri->getPath());

        $this->langDetector();
    }

    public function langDetector()
    {
        $this->routes_ns = $this->routes;
        if(isset($this->routes[1]) and in_array(strtolower($this->routes[1]), $this->acceptableLangs)){
            $this->userLang = strtolower($this->routes[1]);
            $this->langSl = '/'.$this->userLang;

            $pos_lang = strpos($this->uri_lp, $this->langSl);
            $this->uri_pq = substr($this->uri_lpq, $pos_lang + strlen($this->langSl),
                strlen($this->uri_lpq));

            array_splice($this->routes_ns, 1,1);
        }else{
            //canonical page and default lang
            $this->userLang = $this->langDefault;
            $this->uri_pq = $this->uri_lpq;
            $this->canonical = '/'.$this->langDefault.$this->uri_lp;
        }
    }
}