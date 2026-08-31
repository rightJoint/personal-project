<?php
namespace JointApp\Views\PersonalPage;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;


class TpView_PP_Pass extends TpView
{
    public string $pp_cur_pass = '';
    public string $pp_new_pass = '';
    public string $pp_repeat_pass = '';
    public bool $pp_err_pass_unacceptable = false;
    public bool $pp_err_pass_doent_match = false;
    public bool $pp_changed_susses = false;
    public bool $pp_err_cur_pass_incorrect = false;

    public $css = ['pp-user-edit' => '/css/pp/pp-user-edit.css'];

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\PersonalPage\Pass\LangFiles_'.$this->ucfirstLang($this->userLang).'_Views_PP_Pass_Tp';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {
        $return= '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<form class="pp-user-edit" method="post">'.
            '<div class="input-line">'.
            '<label for="pp_cur_pass">'.$this->langFile::PP_CUR_PASS.': </label>'.
            '<input type="password" id="pp_cur_pass" name="pp_cur_pass" value="'.$this->pp_cur_pass.'" placeholder="'.$this->langFile::PP_CUR_PASS.'">';
        if($this->pp_err_cur_pass_incorrect){
            $return.='<div class="pp-err-line">'.$this->langFile::PP_ERR_CUR_PASS_INCORRECT.'</div>';
        }
        $return.='</div>'.
            '<div class="input-line">'.
            '<label for="pp_new_pass">'.$this->langFile::PP_NEW_PASS.': </label>'.
            '<input type="password" id="pp_new_pass" name="pp_new_pass" value="'.$this->pp_new_pass.'" placeholder="'.$this->langFile::PP_NEW_PASS.'">';
        if($this->pp_err_pass_unacceptable){
            $return.='<div class="pp-err-line">'.$this->langFile::PP_ERR_PASS_UNACCEPTABLE.'</div>';
        }
        $return.='</div>'.
            '<div class="input-line">'.
            '<label for="pp_repeat_pass">'.$this->langFile::PP_NEW_PASS_REPEAT.': </label>'.
            '<input type="password" id="pp_repeat_pass" name="pp_repeat_pass" value="'.$this->pp_repeat_pass.'" placeholder="'.$this->langFile::PP_NEW_PASS_REPEAT.'">';
        if($this->pp_err_pass_doent_match){
            $return.='<div class="pp-err-line">'.$this->langFile::PP_ERR_PASS_DOESNT_MATCH.'</div>';
        }
        $return.='</div>'.
            '<div class="submit-line">';
        if($this->pp_changed_susses){
            $return.= $this->langFile::PP_SUSS_PASS;
        }
        $return.='<input type="submit" value="Submit">'.
            '</div>'.
            '</form>'.
            '</div></div></div>';

        return $return;
    }
}