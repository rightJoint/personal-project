<?php
namespace JointApp\Views\PersonalPage;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;


class TpView_PP_Edit extends TpView
{
    //user info
    public string $pp_user_id = '';
    public string $pp_login = '';
    public string $pp_alias = '';
    public string $pp_regDate = '';
    public string $pp_avatar = '';
    public bool $pp_blackList = false;
    public string $pp_followed_by_id = '';
    public string $pp_pref_lang = 'ru';
    public string $pp_birthDay = '';

    public $css = ['pp-user-edit' => '/css/pp/pp-user-edit.css'];

    public function getResponseHtml():string
    {
        if($this->pp_avatar){
            $avatar = SettingsEnv::USER_AVATARS_DIR.'/'.$this->pp_avatar;
        }else{
            $avatar = '/img/popimg/avatar-default.png';
        }

        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<form class="pp-user-edit" method="post" enctype="multipart/form-data">'.
            '<div class="input-line">'.
            '<label for="pp_newAlias">Alias: </label>'.
            '<input type="text" id="pp_newAlias" name="newAlias" value="'.$this->pp_alias.'" placeholder="new alias">'.
            '</div>'.
            '<div class="input-line">'.
            '<label for="pp_avatar">Avatar: </label>'.
            '<input type="file" id="pp_avatar" name="avatar" accept="image/png, image/jpeg">'.
            '<img class="avatar" src="'.$avatar.'">'.
            '</div>'.
            '<div class="input-line">'.
            '<label for="pp_birthDay">Birthday: </label>'.
            '<input type="date" id="pp_birthDay" name="birthDay" value="'.$this->pp_birthDay.'">'.
            '</div>'.
            '<div class="input-line">'.
            '<label for="pp_pref_lang">Pref lang: </label>'.
            '<select id="pp_pref_lang" name="pref_lang">'.
            '<option value="ru">ru</option>'.
            '<option value="en">en</option>'.
            '</select>'.
            '</div>'.
            '<div class="submit-line">'.
            '<input type="submit" value="Submit">'.
            '</div>'.
            '</form>'.
            '</div></div></div>';
    }
}