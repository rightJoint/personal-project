<?php


namespace Src\Views\Blog;


use JointApp\SettingsEnv;
use JointApp\Views\Records\TpView_Pagination;
use JointApp\Views\TpView;

class TpView_Blog_Art_Comments extends TpView
{
    public string $artRef = '';
    public array $artRow = [];
    public int $countComments = 0;
    public int $onPage = 10;
    public int $curPage = 1;
    public string $sortField = 'by-date';
    public string $viewType = 'list';

    public string $commentP_id = 'new';
    public array $listComments = [];

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


    public $css = ['blog-art-comments' => '/css/blog/blog-art-comments.css',
        'blog-comments-options' => '/css/blog/blog-comments-options.css'];

    public function getResponseHtml(): string
    {
        $return = '<div class="art-comments">';
        if($this->artRow['commentsFlag']){
            $return.='<h3>'.$this->langFile::BLOG_COMMENTS_H3.'</h3>'.
                '<input type="hidden" id="blog-art-ref" value="'.$this->artRef.'">'.
                $this->printArtCommentsOptions().
                $this->printArtComments();
        }else{
            $return.= $this->printArtNoCommentsOptions();
        }
        $return.=
            '</div>';

        return $return;
    }


    public function printArtCommentsOptions():string
    {
        $pagination = new TpView_Pagination();
        $pagination->setUpCustomLang($pagination->getDefaultLang());
        $pagination->userLang = $this->userLang;
        $pagination->count = $this->countComments;
        $pagination->curPage = $this->curPage;
        $pagination->onPage = $this->onPage;


        $return = '<div class="blog-options">'.
            '<div class="blog-count">'.
            '<label>'.$this->langFile::BLOG_COMMENTS_FOUND.'</label><span id="blog-count-comments">'.$this->countComments.'</span>'.
            '</div>'.
            '<div class="blog-pagination">'.
            $pagination->getResponseHtml().
            '</div>'.

            '<div class="blog-sort">'.
            '<label for="art-comments-options-sort">'.$this->langFile::BLOG_COMMENTS_SORT_FIELD.'</label>'.
            '<select id="art-comments-options-sort">';
        $selected='';
        if($this->sortField == 'by-date'){
            $selected = " selected";
        }
        $return .= '<option value="by-date"'.$selected.'>'.$this->langFile::BLOG_COMMENTS_SORT_BY_DATE.'</option>';
        $selected='';
        if($this->sortField == 'new-first'){
            $selected = " selected";
        }
        $return .= '<option value="new-first"'.$selected.'>'.$this->langFile::BLOG_COMMENTS_SORT_NEW_FIRST.'</option>';
        $selected='';
        if($this->sortField == 'like-count'){
            $selected = " selected";
        }
        $return .= '<option value="like-count"'.$selected.' disabled>'.$this->langFile::BLOG_COMMENTS_SORT_LIKES_MORE.'</option>';
        $selected='';
        if($this->sortField == 'dislike-count'){
            $selected = " selected";
        }
        $return .= '<option value="dislike-count"'.$selected.' disabled>'.$this->langFile::BLOG_COMMENTS_SORT_LIKES_LESS.'</option>'.
            '</select>'.
            '<label for="art-comments-options-onPage">'.$this->langFile::BLOG_COMMENTS_ON_PAGE.'</label>'.
            '<select id="art-comments-options-onPage">';
        $selected='';
        if($this->onPage == 5){
            $selected = " selected";
        }
        $return .= '<option value=5'.$selected.'>5</option>';
        $selected='';
        if($this->onPage == 10){
            $selected = " selected";
        }
        $return .= '<option value=10'.$selected.'>10</option>';
        $selected='';
        if($this->onPage == 20){
            $selected = " selected";
        }
        $return .= '<option value=20'.$selected.'>20</option>'.
            '</select>'.
            '</div>'.
            '<div class="blog-view-options">'.
            '<label for="art-comments-options-type">'.$this->langFile::BLOG_COMMENTS_VIEW_TYPE.'</label>'.
            '<select id="art-comments-options-type">';
        $selected='';
        if($this->viewType == 'list'){
            $selected = " selected";
        }
        $return .= '<option value="list"'.$selected.'>'.$this->langFile::BLOG_COMMENTS_VIEW_TYPE_LIST.'</option>';
        $selected='';
        if($this->viewType == "tree"){
            $selected = " selected";
        }
        $return .= '<option value="tree"'.$selected.'>'.$this->langFile::BLOG_COMMENTS_VIEW_TYPE_TREE.'</option>'.
            '</select>'.
            '</div>'.
            '</div>';
        return $return;
    }

    public function printArtComments():string
    {
        $return = '<div class="art-comments-list">';
        if($this->viewType == 'tree'){
            $return .= $this->printArtCommentsTree($this->listComments);
        }elseif ($this->viewType == 'list'){
            $return .= $this->printArtCommentsList($this->listComments);
        }
        $return .= '</div>'.
            '<div class="art-comments-form">';

        $newActive = '';
        if($this->commentP_id != 'new'){
            $newActive = ' active';
        }else{
            $return .=$this->printArtCommentsForm();
        }

        $return .='<div class="art-comments-new'.$newActive.'">'.
            '<span class="respond-new" comment-id="new" id="art-comments-respond-new" onclick="commentRespond(this)">'.$this->langFile::BLOG_COMMENTS_NEW_COMMENT.'</span>'.
            '</div>'.
            '</div>';
        return $return;
    }

    public function printArtCommentsTree(array $listComments = []): string
    {
        $return = '';
        if(count($listComments)){
            foreach ($listComments as $cmN => $comment){
                $avatar = '';
                if(!empty($comment['photoLink'])){
                    if($comment['network'] == 'site'){
                        $avatar.= SettingsEnv::USER_AVATARS_DIR.'/'.$comment['photoLink'];
                    }else{
                        $avatar.= $comment['photoLink'];
                    }
                }else{
                    $avatar.= '/img/popimg/avatar-default.png';
                }

                $return .= '<div class="art-comment-container">'.
                    '<div class="art-comment-container-top">'.
                    '<div class="art-comment-container-user">'.
                    '<img src="'.$avatar.'">'.
                    '<span>'.$comment['alias'].'</span>'.
                    '</div>'.
                    '<div class="art-comment-container-like" style="visibility: hidden">'.
                    'like +/-'.
                    '</div>'.
                    '</div>'.
                    '<div class="art-comment-container-content">'.
                    $comment['content'].
                    '<div class="comment-date">'.$comment['addDate'].'</div>'.
                    '</div>'.
                    '<div class="art-comment-container-bottom">';
                if($this->u_isAuth){
                    $return .='<span class="respond" comment-id="'.$comment['comment_id'].'" onclick="commentRespond(this)">'.
                        'reply'.
                        '</span>';
                }


                if(count($comment['recCm'])){
                    $return .= '('.count($comment['recCm']).') '.'rep-testsss';
                }

                if($this->commentP_id == $comment['comment_id']){
                    $return .= $this->printArtCommentsForm();
                }

                $return .= '</div>';
                if(count($comment['recCm'])){
                    $return .= $this->printArtCommentsTree($comment['recCm']);
                }

                $return .='</div>';
            }
        }else{
            $return .= '<div class="add-first-comment">'.$this->langFile::BLOG_COMMENTS_WRITE_FIRST.'</div>';
        }
        return $return;
    }

    public function printArtCommentsForm(): string
    {
        $blogForm = new Blog_Comments_Form();
        foreach ($blogForm as $key=>$val){
            if($this->$key){
                $blogForm->$key = $this->$key;
            }
        }

        $blogForm->setUpCustomLang($blogForm->getDefaultLang());
        return $blogForm->getResponseHtml();
    }

    public function printArtCommentsList(array $listComments = []): string
    {
        $return = '';
        if(count($listComments)){
            foreach ($listComments as $cmN => $comment){
                $avatar = '';
                if(!empty($comment['avatar'])){
                    $avatar.= SettingsEnv::USER_AVATARS_DIR.'/'.$comment['avatar'];
                }else{
                    $avatar.= '/img/popimg/avatar-default.png';
                }

                $return .= '<div class="art-comment-container quote">'.
                    '<div class="art-comment-container-top">'.
                    '<div class="art-comment-container-user">'.
                    '<span class="quote-marker"><--quote--></span>'.
                    '<img src="'.$avatar.'">'.
                    '<span>'.$comment['alias'].'</span>'.
                    '</div>'.
                    '<div class="art-comment-container-like" style="visibility: hidden">'.
                    'like +/-'.
                    '</div>'.
                    '</div>';

                if(count($comment['recCm'])){
                    $return .= $this->printArtCommentsList($comment['recCm']);
                }

                $return .= '<div class="art-comment-container-content">'.
                    $comment['content'].
                    '<div class="comment-date">'.$comment['addDate'].'</div>'.
                    '</div>'.
                    '<div class="art-comment-container-bottom">';
                if($this->u_isAuth){
                    $return .='<span class="respond" comment-id="'.$comment['comment_id'].'" onclick="commentRespond(this)">'.
                        'reply'.
                        '</span>';
                }

                if($this->commentP_id == $comment['comment_id']){
                    $this->printArtCommentsForm();
                    $return .= $this->printArtCommentsForm();
                }

                $return .= '</div>';

                $return .='</div>';
            }
        }else{
            $return .= '<div class="add-first-comment">'.$this->langFile::BLOG_COMMENTS_WRITE_FIRST.'</div>';
        }

        return $return;
    }

    public function printArtNoCommentsOptions():string
    {
        return '<div class="no-comments">'.$this->langFile::BLOG_NO_COMMENTS.'</div>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Comments\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_Blog_Comments';
        return new $class_Name();
    }
}