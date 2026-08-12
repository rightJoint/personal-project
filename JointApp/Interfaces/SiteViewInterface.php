<?php


namespace JointApp\Interfaces;



interface SiteViewInterface extends LangInterface
{
    //return html code
    public function getResponseHtml():string;

    //return array to encode
    public function getResponseJson():array;

    //call after controller set view params
    public function handleViewParams():void;

    public function getJS():array;

    public function getCss():array;
}