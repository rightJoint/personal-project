<?php


namespace JointApp\Interfaces;


interface WebViewInterface
{
    //collect langFiles throughout tp-views in $tpSet
    public function setUpLangFiles():void;

    //collect js throughout tp-views in $tpSet
    public function setUpJs():void;

    //collect css throughout tp-views in $tpSet
    public function setUpCss():void;

    //update public params throughout tp-views in $tpSet from this
    public function updateTpData():void;

    //return html of solid web page
    public function mkWebPage():string;
}