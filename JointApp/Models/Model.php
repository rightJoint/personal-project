<?php

namespace JointApp\Models;


use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;
use Psr\Log\LoggerAwareTrait;

class Model
{
    use LoggerAwareTrait;

    private $context = ['model' => __CLASS__];

    protected $langFile;

    public string $userLang = 'ru';

    protected JointSiteUser $user;

    function __construct(JointSiteUser $user, JointSiteLogger &$logger)
    {
        $this->setLogger($logger);
        $this->user = $user;
        $this->userLang = $user->userLang;
        $this->setUpLangFile();
        if(!$this->checkAccessModel()){
            $this->logger->warning('denied in checkAccessModel', $this->context);
        }
    }

    protected function checkAccessModel():bool
    {
        return true;
    }

    protected function setUpLangFile()
    {
        $this->langFile = new \stdClass();
    }

    public function getData()
    {

    }
}