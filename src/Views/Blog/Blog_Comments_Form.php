<?php


namespace Src\Views\Blog;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;

class Blog_Comments_Form extends TpView
{
    public string $commentP_id = '';
    public string $artRef = '';
    public int $curPage = 1;
    public int $onPage = 10;
    public string $sortField = '';
    public string $viewType = '';

    //user info
    public string $u_user_id = '';
    public string $u_alias = '';
    public bool $u_blackList = false;
    public string $u_followed_by = '';
    public string $u_avatar = '';
    public string $u_login = '';
    public bool $u_isAuth = false;
    public bool $u_isValid = false;
    public bool $u_isAdmin = false;

    public string $formCommentsContent = '';
    public string $formCommentsErr = '';

    public function getResponseHtml():string
    {
        if($this->u_isAuth){
            $avatar = '';
            if(!empty($this->u_avatar)){
                $avatar.= SettingsEnv::USER_AVATARS_DIR.'/'.$this->u_avatar;
            }else{
                $avatar.= '/img/popimg/avatar-default.png';
            }

            $return =
                '<form class="form-comments" method="post">'.
                '<input type="hidden" name="addCommentFlag" value="y">'.
                '<input type="hidden" name="commentP_id" value="'.$this->commentP_id.'">'.
                '<input type="hidden" name="artRef" value="'.$this->artRef.'">'.
                '<input type="hidden" name="curPage" value="'.$this->curPage.'">'.
                '<input type="hidden" name="onPage" value="'.$this->onPage.'">'.
                '<input type="hidden" name="sort" value="'.$this->sortField.'">'.
                '<input type="hidden" name="viewType" value="'.$this->viewType.'">'.
                '<div class="form-comments-user">'.
                '<img src="'.$avatar.'">'.
                '<span>'.
                $this->u_alias.
                '</span>'.
                '</div>'.
                '<div class="form-comments-content">'.
                '<textarea id="form-comments-content" name="formCommentsContent">'.
                $this->formCommentsContent.
                '</textarea>'.
                '</div>';
            if(!empty($this->formCommentsErr)){
                $return .= '<div class="form-comments-err">'.
                    '<b>'.$this->langFile::BLOG_COMMENTS_ERR.': </b>'.
                    $this->formCommentsErr.
                    '</div>';
            }

            if($this->commentP_id == 'new'){
                $newClass = 'inherit';
                $respClass = 'none';
            }else{
                $newClass = 'none';
                $respClass = 'inherit';
            }

            $return .= '<div class="form-comments-buttons">'.
                '<button id="form-comments-submit"><span id="form-comments-submit-new" style="display: '.$newClass.'">'.
                $this->langFile::BLOG_COMMENTS_NEW.'</span>'.
                '<span id="form-comments-submit-answer" style="display: '.$respClass.'">'.
                $this->langFile::BLOG_COMMENTS_REPLY.
                '</span>'.
                '</button>'.
                '</div>'.
                '</form>';
        }else{
            $return = '<div class="form-comments-check-in">'.
                '<span onclick="$(\'.modal.menu, .modal.menu .overlay\').css({\'opacity\': 1, \'visibility\': \'visible\'})">'.
                '<img src="/img/popimg/checkInNow-footer.png" title="xxxxxxxxxxx" '.
                'alt="xxxxxxxxx">'.
                '</span>'.
                '<span class="check-in" onclick="$(\'.modal.user, .modal.user .overlay\').css({\'opacity\': 1, \'visibility\': \'visible\'})">'.
                'auth'.
                '</span>'.
                '</div>';
        }
        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Comments\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_Blog_CmForm';
        return new $class_Name();
    }
}