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

    function __construct(JointSiteUser $user, JointSiteLogger &$logger)
    {
        $this->setLogger($logger);
        $this->user = $user;
        $this->userLang = $user->userLang;
        $this->setUpLangFile();
        if(!$this->checkAccessController()){
            $this->logger->warning('denied in checkAccessController', $this->context);
        }
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

    protected function updateViewParams()
    {
        foreach ($this->view as $prop => $value){
            if(isset($this->$prop)){
                $this->view->$prop = $this->$prop;
            }
        }
    }
}