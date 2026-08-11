<?php

namespace JointApp\Views\Records;



use JointApp\Views\SiteView\SiteView;


class RecordListView extends SiteView
{
    public $listRecords = [];
    public $listFields = [];
    public string $processUri = '';
    public $searchFields = [];

    public int $listCount = 0;
    public int $curPage = 1;
    public int $onPage = 10;
    protected $onPage_options = [10, 20, 50, 100];
    public string $langSl = '';
    public string $newBtn_qry = '';
    public string $list_frame_id = '';
    public string $slave_req = '';
    public string $h2 = 'test';

    public bool $robotNoIndex = true;
    public string $logo = '/img/popimg/search-icon.png';


    protected function putCustomTemplates():void
    {
        $this->tpSet->Filter = new TpView_FilterPanel();
        $this->tpSet->NavBar = new TpView_NavBar();
        $this->tpSet->Grid = new TpView_Grid();
    }

    protected function handleTpFilter(): string
    {
        $return =
            //open contentBlock
            '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            //open list_frame
            '<div class="list_frame" id="'.$this->list_frame_id.'">';
        if($this->h2){
            $return.= '<h2>'.$this->h2.'</h2>';
        }
        $return.=$this->tpSet->Filter->renderView();
        return $return;
    }

    protected function handleTpGrid(): string
    {
        return '<div class="list-view-grid">'.
            $this->tpSet->Grid->renderView().
            '</div>'.
            static::scriptListViewCrtlPannel($this->list_frame_id, $this->processUri, $this->slave_req).
            self::scriptSortBlock($this->list_frame_id).
            //close list_frame
            '</div>'.
            //close contentBlock
            '</div></div></div>';
    }

    protected function handleTpNavBar(): string
    {
        return $this->tpSet->NavBar->renderView();
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\List\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_L_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\List\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_R_L_Header';
        return new $class_Name();
    }

    public function setUpCss():void
    {
        $this->css['preloader'] = '/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css';
        parent::setUpCss();;
    }

    public function setUpJs():void
    {
        $this->js['preloader'] = '/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js';
        parent::setUpJs();
    }

    private static function scriptSortBlock(string $list_frame_id = ''):string
    {
        return '<script>$("#'.$list_frame_id.'").recordsSortBlock();</script>';
    }

    public static function scriptListViewCrtlPannel(string $list_frame_id = '', string $process_url = '', string $slave_req = '')
    {
        return '<script>$("#'.$list_frame_id.'").recordsPgBlock("'.$process_url.'", "'.$slave_req.'");</script>';
    }
}