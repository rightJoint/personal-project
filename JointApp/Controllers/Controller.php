<?php

namespace JointApp\Controllers;


use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;
use Psr\Log\LoggerAwareTrait;

class Controller
{
    use LoggerAwareTrait;

    public $model;
    public $view;

    protected $context = ['controller' => __CLASS__];

    protected $langFile;

    public string $userLang = 'ru';

    protected JointSiteUser $user;

    public $requestParams = [];

    function __construct(JointSiteUser $user, JointSiteLogger &$logger, $controller_params = [])
    {
        $this->setLogger($logger);
        $this->user = $user;
        $this->userLang = $user->userLang;
        $this->setUpLangFile();
        if(!$this->checkAccessController()){
            $this->logger->warning('denied in checkAccessController', $this->context);
        }
        $this->controllerFromParams($controller_params);
    }

    protected function checkAccessController():bool
    {
        return true;
    }

    protected function setUpLangFile()
    {
        $this->langFile = new \stdClass();
    }

    public function actionIndex()
    {
        $this->model->getData();
    }

    protected function updateViewParams(&$view)
    {
        foreach ($view as $prop => $value){
            if(isset($this->$prop)){
                $view->$prop = $this->$prop;
            }
        }
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
}