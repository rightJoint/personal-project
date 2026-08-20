<?php


namespace JointApp\Views\Test\Connection;



use JointApp\SettingsDb;
use JointApp\Views\TpView;


class TpView_Test_Conn_Home extends TpView
{
    protected $css = [
        'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
        'codesnippet' => '/css/code-snippet.css',
    ];

    public bool $serverConnectStatus = false;
    public bool $dbConnectStatus = false;
    public string $reason = '';
    public string $create_log = '';


    public function getResponseHtml():string
    {

        if($this->serverConnectStatus){
            $server_status = 'Ok';
        }else{
            $server_status = 'Fail';
        }

        if($this->dbConnectStatus){
            $db_status = 'Ok';
        }else{
            $db_status = 'Fail';
        }


        $return = '<article class="pageContentJointSite">'.
            '<section>'.
            '<h2>'.$this->langFile::H2.'</h2>'.
            '</section>'.
            '<section>'.
            '<h3>Status</h3>'.
            '<ul>'.
            '<li>Connect server status: '.$server_status.'</li>';
        if($this->serverConnectStatus){
            $return .= '<li>Connect DB status: '.$db_status;
            if(!$this->dbConnectStatus){
                $return .= '<p>Reason: '.$this->reason.'</p>';
            }
            $return .= '</li></ul>';
        }else{
            $return .= '<p>Cant check Connect DB status or create database cause of Connect server status Fail</p>';
            $return .= '<p>Reason: '.$this->reason.'</p>';
        }

        $return .= '</section>'.
            '<section>'.
            '<ul>'.
            '<li>DB_NAME: '.SettingsDb::DB_NAME.'</li>'.
            '<li>DB_HOST: '.SettingsDb::DB_HOST.'</li>'.
            '<li>DB_USER: '.SettingsDb::DB_USER.'</li>'.
            '<li>ConnDB: ***</li>'.
            '</ul>'.
            '</section>'.
            '<section>';
        if($this->serverConnectStatus and !$this->dbConnectStatus){

            $return .='<h3>Create database</h3>'.
                '<form method="post">'.
                '<input type="submit" value="Create">'.
                '</form>';
            if($this->create_log != ''){
                $return .= '<p>log message: '.$this->create_log.'</p>';
            }
            $return .='</section>';
        }
        $return .= '</article>';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Connection\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Test_Conn';
        return new $class_Name();
    }
}