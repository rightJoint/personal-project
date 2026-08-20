<?php


namespace JointApp\Controllers\User;


use JointApp\Controllers\Controller;
use JointApp\Controllers\ControllerWeb;

class Controller_User_SignIn extends ControllerWeb
{
    public string $http_referer = '';

    public bool $modalUserActive = false;
    public bool $signInFlag = true;
    public bool $signUpFlag = false;

    public string $signInUserLogin = '';
    public string $signInUserPassword = '';
    public bool $signInErrNotFound = false;
    public bool $signInErrBlackList = false;
    public bool $signInErrLogin = false;
    public bool $signInErrPass = false;
    public bool $signInErrWrongPass = false;

    public function actionIndex()
    {
        $this->modalUserActive = true;

    }

    public function actionSignIn()
    {
        if(isset($this->requestParams['auth_signIn'])){
            $err = false;
            if(isset($this->requestParams['signInLogin'])){
                $this->signInUserLogin = $this->requestParams['signInLogin'];
                if(!$this->user->withLogin($this->signInUserLogin)){
                    $this->signInErrLogin = true;
                    $err = true;
                }
            }else{
                $this->signInErrLogin = true;
                $err = true;
            }
            if(isset($this->requestParams['signInPassword'])){
                $this->signInUserPassword = $this->requestParams['signInPassword'];
                if(!$this->user::checkUserPassword($this->signInUserPassword)){
                    $this->signInErrPass = true;
                    $err = true;
                }
            }else{
                $this->signInErrPass = true;
                $err = true;
            }

            if(!$err) {
                $this->user->withPassword($this->signInUserPassword);
                if ($this->user->isAuth()) {
                    $this->logger->redirect($this->http_referer);
                } else {
                    if ($this->user->isBanned()) {
                        $this->signInErrBlackList = true;
                    } else {
                        $this->signInErrWrongPass = true;
                    }
                }
            }
        }
        $this->modalUserActive = true;
    }

    private function createUser(string $login, string $password):bool
    {
        $qry = 'insert into users (user_id, login, alias, pw_hash, regDate, blackList, pref_lang) '.
            'values ("'.$this->user->createGUID().'", "'.$login.'", "'.$login.'", '.
            '"'.password_hash($password, PASSWORD_DEFAULT).'", "'.date("Y-m-d H:i:s").'", '.
            'false, "'.$this->userLang.'")';
        if($this->user->pdoQuery($qry)){
           return true;
        }else{
            return false;
        }

    }

    public function userQuit()
    {
        $this->user->quitUser();
        $this->logger->redirect($this->http_referer);
    }
}