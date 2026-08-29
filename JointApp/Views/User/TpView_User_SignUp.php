<?php


namespace JointApp\Views\User;


use JointApp\Views\TpView;

class TpView_User_SignUp extends TpView
{
    public bool $hasSignUpErrors = false;
    public bool $u_isAuth = false;

    public function getResponseHtml():string
    {
        $return = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
        '<div class="contentBlock-wrap">';

        if($this->u_isAuth){
            $return.= $this->langFile::SIGNUP_USER_VALID;
        }elseif ($this->hasSignUpErrors){
            $return.= $this->langFile::SIGNUP_FAIL;
        }else{
            $return.= $this->langFile::SIGNUP_FILL_FORM;
        }

        $return .= '</div></div></div>';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\User\SignUp\LangFiles_'.self::ucfirstLang($this->userLang).'_V_U_SignUp_Tp';
        return new $class_Name();
    }
}