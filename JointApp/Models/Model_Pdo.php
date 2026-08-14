<?php

namespace JointApp\Models;

use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;
use Psr\Log;
use JointApp\SettingsDb;


class Model_Pdo extends Model
{
    use Log\LoggerAwareTrait;

    private \PDO $DB;

    protected $context = ['Model_Pdo' => __CLASS__];

    private bool $serverConnectStatus = false;
    private bool $dbConnectStatus = false;

    //any text to log
    protected string $log_message = '';

    function __construct(JointSiteUser &$user, JointSiteLogger &$logger, $model_params = [])
    {
        parent::__construct($user,$logger, $model_params);

        try {
            $this->DB = new \PDO('mysql:host=' . SettingsDb::DB_HOST. ';',
                SettingsDb::DB_USER, SettingsDb::DB_PW);
            $this->serverConnectStatus = true;

            if($this->selectDatabase()){
                return true;
            }
        } catch (\Exception $e) {
            $this->log_message = $e->getMessage();
        }
    }

    public function pdoQuery($statement, $mode = \PDO::FETCH_ASSOC, $arg3 = null, array $ctorargs = array())
    {
        if($this->dbConnectStatus){
            try{
                return $this->DB->query($statement, $mode);
            }catch (\Exception $e) {
                $this->log_message = $e->getMessage();
                if(SettingsDb::THROW_ERR_QUERY){
                    $this->logger->alert("query err: ".$this->log_message, $this->context);
                }else{
                    $this->logger->info("query err: ".$this->log_message, $this->context);
                }
            }
        }else{
            if(SettingsDb::THROW_ERR_NO_CONN){
                $this->logger->alert("Model_pdo thrown err: no-db-connection", $this->context);
            }
        }
        return false;
    }

    private function selectDatabase():bool
    {
        if ($this->DB->query("use " . SettingsDb::DB_NAME)) {
            $this->dbConnectStatus = true;
            return true;
        }

        return false;
    }

    protected function setUpLangFile():void
    {
        $class_Name = 'JointApp\LangFiles\Models\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'ModelPdo';
        $this->langFile = new $class_Name();
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

    public function createGUID():string
    {
        if (function_exists('com_create_guid') === true){
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535),
            mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535),
            mt_rand(0, 65535), mt_rand(0, 65535));
    }


    public function fetchToArray(string $selectQuery = ''):array
    {
        $return = array();
        if($res = $this->pdoQuery($selectQuery)){
            if($res->rowCount()){
                while ($row = $res->fetch(\PDO::FETCH_ASSOC)){
                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getLogMessage():string
    {
        return $this->log_message;
    }

    public function getServerStatus():bool
    {
        return $this->serverConnectStatus;
    }

    public function getDbStatus():bool
    {
        return $this->dbConnectStatus;
    }

    public function getDbName():string
    {
        return SettingsDb::DB_NAME;
    }
}