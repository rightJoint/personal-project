<?php


namespace Src\Controllers\Blog;


use JointApp\Controllers\ControllerWeb;
use JointApp\JointAppQueryBuilder;
use JointApp\Views\Records\TpView_Pagination;
use Src\Models\Blog\Model_Blog_Comments;

class Controller_Blog_Arts extends ControllerWeb
{
    public string $h1 = '';
    public string $metaDescription = '';

    public string $artRef = '';

    public array $artRow = [];
    public array $artTags = [];
    public array $listComments = [];

    public string $formCommentsContent = '';
    public string $commentP_id = 'new';
    public string $formCommentsErr = '';
    public string $addCommentFlag = '';
    public int $countComments = 0;

    public int $curPage = 1;
    public int $onPage = 5;
    public string $sort = 'by-date';
    public string $viewType = 'tree';

    public bool $filterComments = false;

    public bool $robotNoIndex = false;

    public bool $confirmAgeFlag = false;

    function actionIndex()
    {
        $this->artRow = $this->model->getBlogArt($this->artRef);
        if(isset($this->artRow['art_id'])){
            if($this->artRow['activeFlag']){
                $adultErr = false;
                if($this->artRow['adultFlag'] == true){
                    if($this->user->isAuth()){
                        if(!$this->user->isAdult()){
                            $adultErr = true;
                        }
                    }elseif(isset($this->cookieParams['isAdult']) and $this->cookieParams['isAdult']=='false'){
                        $adultErr = true;
                    }elseif (!isset($this->cookieParams['isAdult'])){
                        $this->confirmAgeFlag = true;
                    }
                }

                if(!$adultErr){
                    $this->robotNoIndex = !$this->artRow['indexFlag'];
                    $this->h1 = $this->artRow['artName'];
                    $this->metaDescription = $this->artRow['artName'].'. '.$this->artRow['artMeta'];
                    $this->artTags = $this->model->getArtTags($this->artRow['art_id']);
                    $this->listComments = $this->listComments();
                    $this->countComments = $this->countComments();
                }else{
                    $this->logger->alert('denied cause of user age', $this->context);
                }
            }else{
                $this->logger->error('The article is temporarily unavailable', $this->context);
            }
        }else{
            $this->logger->error('article not found on actionIndex', $this->context);
        }
    }

    public function postComment()
    {
        if($this->user->isAuth()){
            if($this->commentP_id != 'new' and !empty($this->commentP_id)){
                $insertParId = '"'.$this->commentP_id.'"';
            }else{
                $insertParId = 'NULL';
            }

            $insertContent = str_replace('"', '', $this->formCommentsContent);

            if(strlen($insertContent) > 10){
                $this->artRow = $this->model->getBlogArt($this->artRef);
                if(isset($this->artRow['art_id'])){
                    if($this->artRow['activeFlag']) {
                        if ($this->artRow['commentsFlag']) {
                            $insertComment = 'insert into blogComments ' .
                                '(comment_id, commentP_id, art_id, content, created_by, activeFlag, addDate) ' .
                                'values ' .
                                '("' . $this->model->createGUID() . '", ' . $insertParId . ', "' . $this->artRow['art_id'] . '", "' . $insertContent . '", ' .
                                '"' . $this->user->getId() . '", true, "' . date('Y-m-d H:i:s') . '")';

                            if ($this->model->pdoQuery($insertComment)) {
                                $this->commentP_id = 'new';
                                $this->formCommentsContent = '';
                                $this->logger->redirect($this->langSl . '/blog/article/' . $this->artRef .
                                    '?curPage=' . $this->curPage . '&onPage=' . $this->onPage . '&sort=' . $this->sort .
                                    '&viewType=' . $this->viewType);
                            }
                        }else{
                            $this->logger->notice('comments not allowed', $this->context);
                        }
                    }else{
                        $this->logger->error('The article is temporarily unavailable', $this->context);
                    }
                }else{
                    $this->logger->notice('wrong comment artRef', $this->context);
                }
            }else{
                $this->formCommentsErr = 'too few content';
            }
        }else{
            $this->logger->notice('unknown user to post comment', $this->context);
        }
    }

    public function commentsSearchQuery():JointAppQueryBuilder
    {


        $qBuilder = new JointAppQueryBuilder();
        $qBuilder->where('blogArts.art_id = "'.$this->artRow['art_id'].'"');// $artRef

        $limit = (($this->curPage-1)*$this->onPage).", ".$this->onPage;

        if($this->sort == 'by-date'){
            $qBuilder->order('blogComments.addDate');
        }elseif ($this->sort == 'new-first'){
            $qBuilder->order('blogComments.addDate DESC');
        }

        $qBuilder->limit($limit);

        return $qBuilder;
    }

    public function listComments():array
    {
        $comments = new Model_Blog_Comments($this->user, $this->logger);

        $qBuilder = $this->commentsSearchQuery();
        if($this->viewType == 'tree'){

            $list = $comments->treeRecordsRecursive($qBuilder);
        }elseif($this->viewType == 'list'){
            $list = $comments->listRecordsRecursive($qBuilder);
        }

        return $list;
    }

    public function countComments():int
    {
        $comments = new Model_Blog_Comments($this->user, $this->logger);

        $qBuilder = new JointAppQueryBuilder();
        $qBuilder->where('blogArts.art_id = "'.$this->artRow['art_id'].'"');

        if($this->viewType == 'tree'){
            $count = $comments->countTreeRecords($qBuilder);
        }elseif($this->viewType == 'list'){
            $count = $comments->countListRecords($qBuilder);
        }

        return $count;
    }

    public function filterComments()
    {

        $this->view->userLang = $this->userLang;
        $this->view->setUpCustomLang($this->view->getDefaultLang());

        $this->artRow = $this->model->getBlogArt($this->artRef);

        $qBuilder = $this->commentsSearchQuery();
        $qBuilder_count = clone($qBuilder);

        $comments = new Model_Blog_Comments($this->user, $this->logger);

        if($this->viewType == 'tree'){
            $listComments = $comments->treeRecordsRecursive($qBuilder);
        }elseif ($this->viewType == 'list'){
            $listComments = $comments->listRecordsRecursive($qBuilder);
        }

        $this->updateViewParams();

        if($this->viewType == 'tree'){
            $listView = $this->view->printArtCommentsTree($listComments);

        }elseif ($this->viewType == 'list'){
            $listView = $this->view->printArtCommentsList($listComments);
        }

        $qBuilder_count->limit = '';
        $qBuilder_count->order = '';

        if($this->viewType == 'tree'){
            $this->countComments = $comments->countTreeRecords($qBuilder_count);
        }elseif ($this->viewType == 'list'){
            $this->countComments = $comments->countListRecords($qBuilder_count);
        }

        $pagination = new TpView_Pagination();
        $pagination->setUpCustomLang($pagination->getDefaultLang());
        $pagination->userLang = $this->userLang;
        $pagination->count = $this->countComments;
        $pagination->curPage = $this->curPage;
        $pagination->onPage = $this->onPage;


        $pg = $pagination->getResponseHtml();

        $this->responseJson = array('listView' => $listView, 'count' => $this->countComments(), 'pg' => $pg);
    }
}