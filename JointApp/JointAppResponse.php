<?php


namespace JointApp;


use JointFramework\Http\Response;

class JointAppResponse extends Response
{
    //log err included response status codes 200: DEBUG, NOTICE, INFO
    public $customLog = [];

    //where logger stored run time of JointApp, Actions, Views
    public $stopwatch = [];

    //defined in JointSiteRoute RoutesCollection traits
    //text format, or json
    public $responseFormat = 'text';

    /*
     * there are three format types of response
     * router decide which type to use $responseText or $responseJson
     * logger->redirect to change users location
     */
    //1. $responseText is use to output solid web-page with header, js, css. it get from WebView
    public string $responseText = '';
    //2. $responseJson is use to encoding and output array. it gets from any view when api or ajax queries
    public $responseJson = [];
    //3. redirect location after some actions (new or delete)
    public $redirect = [];

    //list of redirects
    public function redirect(string $location):void
    {
        $this->redirect[] = $location;
    }

    public function calcRunTime(int $firstEvent = 0, int $lastEvent = 0):float
    {
        $count = count($this->stopwatch);
        if($count > 1){
            $fk = key($this->stopwatch[0]);
            $lk = key($this->stopwatch[$count-1]);
            return $this->stopwatch[$count-1][$lk] - $this->stopwatch[0][$fk];
        }
        return 0;
    }
}