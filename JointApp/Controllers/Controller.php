<?php

namespace JointApp\Controllers;


use JointApp\Interfaces\SiteViewInterface;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;
use Psr\Log\LoggerAwareTrait;

class Controller
{
    use LoggerAwareTrait;

    public $model;
    public SiteViewInterface $view;

    protected $responseJson = [];

    protected $context = ['controller' => __CLASS__];

    protected $langFile;

    public string $userLang = 'ru';

    protected JointSiteUser $user;

    public $requestParams = [];

    function __construct(JointSiteUser $user, JointSiteLogger &$logger, $controller_params = [])
    {
        $this->setLogger($logger);
        $this->user = $user;
        $this->setUpCustomLang($this->getDefaultLang());
        if(!$this->checkAccessController()){
            $this->logger->warning('denied in checkAccessController', $this->context);
        }
        $this->controllerFromParams($controller_params);
    }

    //check user to get admission
    protected function checkAccessController():bool
    {
        return true;
    }

    public function getDefaultLang()
    {
        return new \stdClass();
    }

    public function setUpCustomLang($langFile):void
    {
        $this->langFile = $langFile;
    }

    public function actionIndex()
    {
        $this->model->getData();
    }

    //automatically exec as final action when response format text
    public function updateViewParams()
    {
        $this->setUpViewParams($this->view);
    }

    //automatically exec as final action when response format json
    public function updateResponseJson()
    {
        $this->view->responseJson = $this->responseJson;
    }

    //pass some params on construct
    protected function controllerFromParams($model_params = []):void
    {
        foreach ($model_params as $key => $val){
            if(property_exists($this, $key)){
                $this->$key = $val;
            }
        }
    }

    //update some view params
    protected function setUpViewParams(&$view)
    {
        foreach ($view as $prop => $value){
            if(isset($this->$prop)){
                $view->$prop = $this->$prop;
            }
        }
    }

}