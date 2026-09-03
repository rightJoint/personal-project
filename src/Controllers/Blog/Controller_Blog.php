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

    public array $filterCats = [];

    private function blogFilterRequest()
    {
        if(isset($this->requestParams['blog-in-row']) and !empty($this->requestParams['blog-in-row'])){
            $this->inRow = $this->requestParams['blog-in-row'];
        }
        if(isset($this->requestParams['blog-on-page']) and !empty($this->requestParams['blog-on-page'])){
            $this->onPage = $this->requestParams['blog-on-page'];
        }
        if(isset($this->requestParams['blog-sort-order']) and !empty($this->requestParams['blog-sort-order'])){
            $this->sortOrder = $this->requestParams['blog-sort-order'];
        }
        if(isset($this->requestParams['blog-sort-field']) and !empty($this->requestParams['blog-sort-field'])){
            $this->sortField = $this->requestParams['blog-sort-field'];
        }
        if(isset($this->requestParams['blog-cur-page']) and !empty($this->requestParams['blog-cur-page'])){
            $this->curPage = $this->requestParams['blog-cur-page'];
        }
        if(isset($this->requestParams['blog-filter-artName']) and !empty($this->requestParams['blog-filter-artName'])){
            $this->filterArtName = $this->requestParams['blog-filter-artName'];
        }
        if(isset($this->requestParams['blog-filter-cat']) and !empty($this->requestParams['blog-filter-cat'])){
            $this->filterCat = $this->requestParams['blog-filter-cat'];
        }
    }

    public function actionIndex()
    {
        $this->blogFilterRequest();

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
        $arr = [];
        $this->blogFilterRequest();

        $qBuilder = $this->blogSearchQuery();
        $tpView_table = new TpView_Blog_Table();
        $tpView_table->setUpCustomLang($tpView_table->getDefaultLang());
        $tpView_table->artsList = $this->model->listRecords($qBuilder);
        $tpView_table->inRow = $this->inRow;

        $arr['listView'] = $tpView_table->getResponseHtml();

        $tpView_options = new TpView_Blog_Options();
        $tpView_options->setUpCustomLang($tpView_options->getDefaultLang());


        $qBuilderCount = clone $qBuilder;
        $qBuilderCount
            ->limit('')
            ->order('');


        $this->blogCountArts = $this->model->countRecords($qBuilderCount);

        $tpView_options->blogCountArts = $this->model->countRecords($qBuilderCount);
        $tpView_options->onPage = $this->onPage;
        $tpView_options->curPage = $this->curPage;

        $arr['blogCountArts'] = $tpView_options->blogCountArts;

        $pagination = new TpView_Pagination();
        $pagination->setUpCustomLang($pagination->getDefaultLang());
        $pagination->userLang = $this->userLang;
        $pagination->count = $this->blogCountArts;
        $pagination->curPage = $this->curPage;
        $pagination->onPage = $this->onPage;

        $arr['pg'] = $pagination->getResponseHtml();

        $this->responseJson = $arr;
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