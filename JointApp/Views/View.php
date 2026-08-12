<?php

namespace JointApp\Views;


use JointApp\Interfaces\SiteViewInterface;

class View implements SiteViewInterface
{
    public $responseJson = [];
    protected $langFile;
    protected $js = [];
    protected $css = [];

    public function getResponseHtml():string
    {
        return 'test response example';
    }

    public function getResponseJson():array
    {
        return $this->responseJson;
    }

    public function handleViewParams():void
    {

    }

    public function getDefaultLang()
    {
        return new \stdClass();
    }

    public function setUpCustomLang($langFile):void
    {
        $this->langFile = $langFile;
    }

    public function getJS():array
    {
        return $this->js;
    }

    public function getCss():array
    {
        return $this->css;
    }
}