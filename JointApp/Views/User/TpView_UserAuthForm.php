<?php


namespace JointApp\Views\User;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;
use JointApp\Views\Captcha;

class TpView_UserAuthForm extends TpView
{
    public bool $signUpFlag = false;
    public string $signUpUserLogin = '';
    public string $signUpUserPassword = '';
    public string $signUpPasswordRepeat = '';
    public bool $signUpErrLoginAccept = false;
    public bool $signUpErrLoginReserved = false;
    public bool $signUpErrPassAccept = false;
    public bool $signUpErrPassMatch = false;
    public bool $signUpErrCaptchaEmpty = false;
    public bool $signUpErrCaptchaWrong = false;
    public bool $useSignUpCaptcha = true;//optional
    public bool $signUpErrUnknown = true;

    public bool $signInFlag = true;
    public string $signInUserLogin = '';
    public string $signInUserPassword = '';
    public bool $signInErrNotFound = false;
    public bool $signInErrBlackList = false;
    public bool $signInErrLogin = false;
    public bool $signInErrPass = false;
    public bool $signInErrWrongPass = false;


    protected $css = ['user-menu-auth-form' => '/css/user/authform.css'];

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\SiteView\AuthForm\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_AuthForm';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {
        return $this->htmlSignInForm().$this->htmlSignUpForm();
    }

    private function htmlSignUpForm():string
    {
        $add_form_class = '';
        if(!$this->signUpFlag){
            $add_form_class = 'disp-none';
        }

        $return = '<form class="auth-form signUp '.$add_form_class.'" method="post" action="'.$this->langSl.'/user/signUp">'.
            '<div class="modal-line">'.
            '<div class="modal-line-img"><img src="/img/popimg/checkInNow.png"></div>' .
            '<div class="modal-line-text">';
        $return.= '<a href="#" id="siteSignUp">'.
            $this->langFile::AUTH_SU_TITLE.
            '</a>'.
            '</div>'.
            '</div>'.
            '<div class="modal-line">'.
            '<div class="modal-line-text"><input type="text" name="signUpLogin" value="'.
            $this->signUpUserLogin.'" placeholder="'.$this->langFile::AUTH_SU_LOGIN_PS.'"></div>'.
            '<div class="modal-line-img"><img src="/img/popimg/avatar-default.png"></div>';
        if($this->signUpErrLoginAccept){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SU_ERR_LOGIN_ACCEPT.'</div>';
        }
        if($this->signUpErrLoginReserved){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SU_ERR_LOGIN_RESERVED.'</div>';
        }
        $return.= '</div>'.
            '<div class="modal-line">'.
            '<div class="modal-line-text">'.
            '<input type="password" name="signUpPassword" value="'.
            $this->signUpUserPassword.
            '" placeholder="'.$this->langFile::AUTH_SU_PASS_PS.'">'.
            '</div>'.
            '<div class="modal-line-img"><img src="/img/popimg/pass-2-icon.png"></div>';
        if($this->signUpErrPassAccept){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SU_ERR_PASS_ACCEPT.
                '</div>';
        }
        $return.= '</div>'.
            '<div class="modal-line">'.
            '<div class="modal-line-text">'.
            '<input type="password" name="signUpPasswordRepeat" value="'.
            $this->signUpPasswordRepeat.
            '" placeholder="'.$this->langFile::AUTH_SU_PASSRP_PS.'">'.
            '</div>'.
            '<div class="modal-line-img"><img src="/img/popimg/pass-2-icon.png"></div>';
        if($this->signUpErrPassMatch){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SU_ERR_PASS_MATCH.
                '</div>';
        }
        $return.= '</div>';


        if($this->useSignUpCaptcha){

            $captcha = Captcha::create(SettingsEnv::DOC_ROOT.'/fonts');

            $_SESSION['SignUpCaptchaCode'] = $captcha['code'];

            $return.= '<div class="modal-line">'.
                '<div class="modal-line-text"><input type="text" name="signUpCaptchaCode" value="" '.
                'placeholder="'.$this->langFile::AUTH_SU_CAP.'"></div>'.
                '<div class="modal-line-img captcha">'.
                '<img src="data:image/png;base64, '.base64_encode($captcha['image']).'" title="проверочный код">'.
                '</div>';
            if($this->signUpErrCaptchaEmpty){
                $return.= '<div class="modal-line-err">'.
                    $this->langFile::AUTH_SU_ERR_CAPTCHA_EMPTY.
                    '</div>';
            }
            if($this->signUpErrCaptchaWrong){
                $return.= '<div class="modal-line-err">'.
                    $this->langFile::AUTH_SU_ERR_CAPTCHA_WRONG.
                    '</div>';
            }
            $return.='</div>';
        }

        if($this->signUpErrUnknown){
            $return.= '<div class="modal-line"><div class="modal-line-err">'.
                $this->langFile::AUTH_SU_ERR_UNKNOWN.
                '</div></div>';
        }

        $return.=
            '<div class="modal-line">'.
            '<div class="modal-line-text">'.
            '<a class="title" href="#siteSignIn">'.
            $this->langFile::AUTH_SU_SIL.
            '</a>'.
            '<input type="submit" name="auth_signUp" value="'.$this->langFile::AUTH_SU_SUBMIT. '"></div>'.
            '<div class="modal-line-img"></div>'.
            '</div>'.
            '</form>';

        return $return;
    }

    public function htmlSignInForm():string
    {
        $add_form_class = '';
        if(!$this->signInFlag){
            $add_form_class = 'disp-none';
        }

        $return = '<form class="auth-form signIn '.$add_form_class.'" method="post" action="'.$this->langSl.'/user/signIn">'.
            '<div class="modal-line">'.
            '<div class="modal-line-img"><img src="/img/popimg/pass-img.png"></div>' .
            '<div class="modal-line-text">';
        $return.= '<a class="m-l-blue title decnone" id="siteSignIn" href="#">'.
            $this->langFile::AUTH_SI_TITLE.
            '</a>'.
            '</div>'.
            '</div><br>'.
            '<div class="modal-line">'.
            '<div class="modal-line-text"><input type="text" name="signInLogin" value="'.$this->signInUserLogin.'"'.
            ' placeholder="'.$this->langFile::AUTH_SI_LOGIN_PS.'">'.
            '</div>'.
            '<div class="modal-line-img"><img src="/img/popimg/avatar-default.png"></div>';
        if($this->signInErrNotFound){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SI_ERR_LOGIN_NOTFOUND.
                '</div>';
        }
        if($this->signInErrBlackList){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SI_ERR_LOGIN_BLL.
                '</div>';
        }
        if($this->signInErrLogin){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SI_ERR_LOGIN_ACCEPT.
                '</div>';
        }

        $return.= '</div>';
        $return.='<div class="modal-line">'.
            '<div class="modal-line-text">'.
            '<input type="password" name="signInPassword" value="'.$this->signInUserPassword.'"'.
            ' placeholder="'.$this->langFile::AUTH_SI_PASS_PS.'">'.
            '</div>'.
            '<div class="modal-line-img"><img src="/img/popimg/pass-2-icon.png">'.
            '</div>';

        if($this->signInErrPass){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SI_ERR_PASS_ACCEPT.'</div>';
        }

        if($this->signInErrWrongPass){
            $return.= '<div class="modal-line-err">'.
                $this->langFile::AUTH_SI_ERR_WRONG_LP.'</div>';
        }
        $return.= '</div>';
        $return.= '<div class="modal-line">'.
            '<div class="modal-line-text">'.
            '<a class="m-l-blue title" href="#siteSignUp">'.
            $this->langFile::AUTH_SI_SIL.
            '</a>'.
            '<input type="submit" name="auth_signIn" value="'.$this->langFile::AUTH_SI_SUBMIT.'"></div>'.
            '<div class="modal-line-img"></div>'.
            '</div>'.
            '</form>';

        return $return;
    }


    public function htmlUserLine():string
    {
        $return = '';
        $return .='<div class="modal-line user-status">'.
            '<div class="modal-line-img">'.
            '<img src="/img/popimg/user-logo.png">'.
            '</div>'.
            '<div class="modal-line-text"><span class="guest">Вы гость</span><small>Вам могут быть недоступны некоторые ресурсы этого сайта</small></div>'.
            '</div>';

        return $return;
    }
}