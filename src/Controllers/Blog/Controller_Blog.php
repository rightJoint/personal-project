<?php
namespace Src\Controllers\Blog;


use JointApp\Controllers\Controller;
use JointApp\Controllers\ControllerWeb;
use JointApp\JointAppQueryBuilder;
use JointApp\Views\Records\TpView_Pagination;
use Src\Views\Blog\TpView_Blog_Options;
use Src\Views\Blog\TpView_Blog_Table;

class Controller_Blog extends ControllerWeb
{

    public array $artsList = [];
    public int $blogCountArts = 0;
    public string $filterArtName = '';
    public int $curPage = 1;
    public string $sortField = 'pubDate';
    public string $sortOrder = 'DESC';
    public int $onPage = 4;
    public int $inRow = 2;
    public string $filterCat = '';

    public array $filterCats = [];

    private function modelAdultQuery():bool
    {
        if($this->user->isAuth()){
            if(!$this->user->isAdult()){
                return true;
            }
        }elseif(isset($this->cookieParams['isAdult']) and $this->cookieParams['isAdult']=='false'){
            return true;
        }
        return false;
    }

    public function actionIndex()
    {
        $this->model->adultQuery = $this->modelAdultQuery();

        $qBuilder = $this->blogSearchQuery();

        $this->artsList = $this->model->listRecords($qBuilder);

        $qBuilderCount = clone $qBuilder;
        $qBuilderCount
            ->limit('')
            ->order('');

        $this->blogCountArts = $this->model->countRecords($qBuilderCount);
        $this->filterCats = $this->fillFilterCats();
    }

    public function blogSearchQuery():JointAppQueryBuilder
    {
        $qBuilder = new JointAppQueryBuilder();

        if(!empty($this->filterCat) and $this->filterCat!='all'){
            $qBuilder->where('artCat="'.$this->filterCat.'"');
        }

        if(!empty($qBuilder->where)){
            $qBuilder->where .= ' and activeFlag is true';
        }else{
            $qBuilder->where .= 'activeFlag is true';
        }

        if(!empty($this->filterArtName) and !empty($this->filterArtName)){
            $qBuilder->having('artName like("%'.$this->filterArtName.'%")');
        }
        $limit = (($this->curPage-1)*$this->onPage).", ".$this->onPage;
        $qBuilder->limit($limit);

        $qBuilder->order($this->sortField.' '.$this->sortOrder);

        return $qBuilder;
    }

    public function actionFilter()
    {
        $this->model->adultQuery = $this->modelAdultQuery();

        $qBuilder = $this->actionFilterHome();



        $tpView_options = new TpView_Blog_Options();
        $tpView_options->setUpCustomLang($tpView_options->getDefaultLang());


        $qBuilderCount = clone $qBuilder;
        $qBuilderCount
            ->limit('')
            ->order('');


        $this->blogCountArts = $this->model->countRecords($qBuilderCount);

        $this->setUpViewParams($tpView_options);

        $this->responseJson['blogCountArts'] = $tpView_options->blogCountArts;

        $pagination = new TpView_Pagination();
        $pagination->userLang = $this->userLang;
        $pagination->setUpCustomLang($pagination->getDefaultLang());

        $pagination->count = $this->blogCountArts;
        $pagination->curPage = $this->curPage;
        $pagination->onPage = $this->onPage;

        $this->responseJson['pg'] = $pagination->getResponseHtml();
    }

    public function actionFilterHome():JointAppQueryBuilder
    {
        $qBuilder = $this->blogSearchQuery();

        $this->model->adultQuery = $this->modelAdultQuery();

        $tpView_table = new TpView_Blog_Table();
        $this->artsList = $this->model->listRecords($qBuilder);
        $this->setUpViewParams($tpView_table);
        $tpView_table->setUpCustomLang($tpView_table->getDefaultLang());

        $this->responseJson['listView'] = $tpView_table->getResponseHtml();

        return $qBuilder;
    }

    public function fillFilterCats():array
    {
        $return = ['all' => 'all categories'];
        $qBuilder = new JointAppQueryBuilder();
        $qBuilder->select('cat_id, catName_'.$this->userLang.' AS catName')
            ->from('blogCats')
            ->order('catName');
        if($res = $this->model->pdoQuery($qBuilder->buildQuery())){
            while ($row = $res->fetch(\PDO::FETCH_ASSOC)){
                $return[$row['cat_id']] = $row['catName'];
            }
        }

        return $return;
    }
}