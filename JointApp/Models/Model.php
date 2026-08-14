<?php

namespace JointApp\Models;


use JointApp\Interfaces\LangInterface;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;
use Psr\Log\LoggerAwareTrait;

class Model implements LangInterface
{
    use LoggerAwareTrait;

    protected $context = ['model' => __CLASS__];

    protected $langFile;

    public string $userLang = 'ru';

    protected JointSiteUser $user;

    function __construct(JointSiteUser &$user, JointSiteLogger &$logger, $model_params = [])
    {
        $this->setLogger($logger);
        $this->user = $user;
        $this->userLang = $user->userLang;
        $this->langFile = $this->getDefaultLang();
        if(!$this->checkAccessModel()){
            $this->logger->warning('denied in checkAccessModel', $this->context);
        }

        $this->modelFromParams($model_params);
    }

    protected function checkAccessModel():bool
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

    public function getData()
    {

    }

    //pass some params on construct
    protected function modelFromParams($model_params = []):void
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