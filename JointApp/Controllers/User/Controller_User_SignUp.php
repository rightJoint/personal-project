<?php


namespace JointApp\Controllers\User;


use JointApp\Controllers\Controller;
use JointApp\Controllers\ControllerWeb;

class Controller_User_SignUp extends ControllerWeb
{
    public bool $signInFlag = false;
    public bool $signUpFlag = true;

    public string $signUpUserLogin = '';
    public string $signUpUserPassword = '';
    public string $signUpPasswordRepeat = '';
    public bool $signUpErrLoginAccept = false;
    public bool $signUpErrLoginReserved = false;
    public bool $signUpErrPassAccept = false;
    public bool $signUpErrPassMatch = false;
    public bool $signUpErrCaptchaEmpty = false;
    public bool $signUpErrCaptchaWrong = false;
    public bool $signUpErrUnknown = false;

    public bool $hasSignUpErrors = false;

    public function actionSignUp()
    {
        if(isset($this->requestParams['auth_signUp'])){

            if(isset($this->requestParams['signUpLogin'])){
                $this->signUpUserLogin = $this->requestParams['signUpLogin'];
                if(!$this->user::checkUserLogin($this->signUpUserLogin)){
                    $this->signUpErrLoginAccept = true;
                    $this->hasSignUpErrors = true;
                }else{
                    if(!$this->user->checkDoubleLogin($this->signUpUserLogin)){
                        $this->signUpErrLoginReserved = true;
                        $this->hasSignUpErrors = true;
                    }
                }
            }else{
                $this->hasSignUpErrors = true;
                $this->signUpErrLoginAccept = true;
            }

            if(isset($this->requestParams['signUpPassword'])){
                $this->signUpUserPassword = $this->requestParams['signUpPassword'];
                if(!$this->user::checkUserPassword($this->signUpUserPassword)){
                    $this->signUpErrPassAccept = true;
                    $this->hasSignUpErrors = true;
                }
            }else{
                $this->hasSignUpErrors = true;
                $this->signUpErrPassAccept = true;
            }

            if(isset($this->requestParams['signUpPasswordRepeat'])){
                $this->signUpPasswordRepeat = $this->requestParams['signUpPasswordRepeat'];
                if($this->signUpUserPassword != $this->signUpPasswordRepeat){
                    $this->signUpErrPassMatch = true;
                    $this->hasSignUpErrors = true;
                }
            }
            if(isset($this->requestParams['signUpCaptchaCode'])){
                if(isset($_SESSION['SignUpCaptchaCode'])){
                    if($_SESSION['SignUpCaptchaCode'] != $this->requestParams['signUpCaptchaCode']){
                        $this->signUpErrCaptchaWrong = true;
                        $this->hasSignUpErrors = true;
                    }
                }else{
                    $this->signUpErrCaptchaEmpty = true;
                    $this->hasSignUpErrors = true;
                }
            }else{
                $this->signUpErrCaptchaEmpty = true;
                $this->hasSignUpErrors = true;
            }

            if(!$this->hasSignUpErrors){
                if($this->createUser($this->signUpUserLogin, $this->signUpUserPassword)) {
                    $this->user->withLogin($this->signUpUserLogin);
                    $this->user->withPassword($this->signUpUserPassword);
                }else{
                    $this->hasSignUpErrors = true;
                    $this->signUpErrUnknown = true;
                }
            }
        }
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
}