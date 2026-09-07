<?php

namespace JointApp\Controllers\Test;


use JointApp\Controllers\ControllerWeb;
use JointApp\Models\Model_Pdo;
use JointApp\SettingsDb;


class Controller_Test_Connection extends ControllerWeb
{

    public bool $serverConnectStatus = true;
    public bool $dbConnectStatus = false;
    public string $reason = '';
    public string $result = '';
    public string $create_log = '';

    public function actionIndex()
    {
        $model_pdo = new Model_Pdo($this->user, $this->logger);
        $this->serverConnectStatus = $model_pdo->getServerStatus();
        $this->dbConnectStatus = $model_pdo->getDbStatus();
        $this->reason = $model_pdo->getLogMessage();

        $this->updateViewParams($this->view);
    }

    public function actionCreateDatabase()
    {
        $pdo = new \PDO('mysql:host=' . SettingsDb::DB_HOST. ';',
            SettingsDb::DB_USER, SettingsDb::DB_PW);
        try{
            $pdo->query('CREATE DATABASE '.SettingsDb::DB_NAME.' CHARACTER SET utf8 COLLATE utf8_general_ci', \PDO::FETCH_ASSOC);
        }catch (\Exception $e) {
            $this->create_log = $e->getMessage();
        }
        $model_pdo = new Model_Pdo($this->user, $this->logger);
        $this->serverConnectStatus = $model_pdo->getServerStatus();
        $this->dbConnectStatus = $model_pdo->getDbStatus();
        $this->reason = $model_pdo->getLogMessage();

        $this->updateViewParams($this->view);
    }

    protected function checkAccessController(): bool
    {
        return $this->user->isAdmin();
    }
}