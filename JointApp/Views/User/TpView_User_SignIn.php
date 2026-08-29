<?php


namespace JointApp\Views\User;


use JointApp\Views\TpView;

class TpView_User_SignIn extends TpView
{
    public bool $hasSignInErrors = false;
    public bool $u_isAuth = false;

    public function getResponseHtml():string
    {
        $return = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
        '<div class="contentBlock-wrap">';

        if($this->u_isAuth){
            $return.= $this->langFile::SIGNIN_USER_VALID;
        }elseif ($this->hasSignInErrors){
            $return.= $this->langFile::SIGNIN_FAIL;
        }else{
            $return.= $this->langFile::SIGNIN_FILL_FORM;
        }

        $return .= '</div></div></div>';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\User\SignIn\LangFiles_'.self::ucfirstLang($this->userLang).'_V_U_SignIn_Tp';
        return new $class_Name();
    }
}