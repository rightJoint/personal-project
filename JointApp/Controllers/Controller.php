<?php

namespace JointApp\Controllers;


use JointApp\Interfaces\LangInterface;
use JointApp\Interfaces\SiteViewInterface;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;
use Psr\Log\LoggerAwareTrait;

class Controller implements LangInterface
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
        $this->langFile = $this->getDefaultLang();
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