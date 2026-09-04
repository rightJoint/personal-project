<?php


namespace JointApp\Views\Records;


use JointApp\Views\TpView;

class TpView_NavBar extends TpView
{
    public int $listCount = 0;
    public int $curPage = 1;
    public int $onPage = 10;
    protected $onPage_options = [10, 20, 50, 100];
    public string $langSl = '';
    public string $processUri = '';
    public string $newBtn_qry = '';

    public $searchFields = [];

    protected $css = [
        'navBar' => '/css/records/nav-bar.css',
    ];


    public function getResponseHtml():string
    {
        $return_ajax = '<div class="navBar">'.
            '<div class="pagination">'.
            $this->paginationPrint().
            '</div>'.
            '<div class="sort-block">'.
            '<span class="found_label">'.$this->langFile::LIST_BY.': </span>'.
            '<select name="onPage">';
        foreach ($this->onPage_options as $onPage){
            $return_ajax.= '<option value="'.$onPage.'"';
            if($onPage == $this->onPage){
                $return_ajax.= ' selected';
            }
            $return_ajax.= '>'.$onPage.'</option>';
        }


        $sortOrder_asc = 'selected';
        $sortOrder_desc = null;
        $count_of = 0;
        $sortFields_options = null;
        foreach ($this->searchFields as $fieldName=>$fieldData){
            if($fieldData['format'] != 'hidden' and $fieldData['sort'] == 1){
                $count_of++;
                if($count_of == 1){
                    if(isset($fieldData['sortOrder']) and $fieldData['sortOrder'] == 'DESC'){
                        $sortOrder_desc = 'selected';
                        $sortOrder_asc = null;
                    }
                }

                if(isset($viewParams->fieldAliases[$fieldName])){
                    $option_text = $viewParams->fieldAliases[$fieldName];
                }else{
                    $option_text = $fieldName;
                }

                $sortFields_options.='<option value="'.$fieldName.'">'.$option_text.'</option>';


            }
        }
        $return_ajax.= '</select>'.
            '<span class="sortField">'.$this->langFile::SORT_BY.': </span>'.
            '<select name="sortField">'.$sortFields_options.'</select>'.
            '<select name="sortOrder"><option value="ASC" '.$sortOrder_asc.'>ASC</option><option value="DESC" '.$sortOrder_desc.'>DESC</option></select>'.
            '</div>'.
            '<div class="new-block">';
        $return_ajax.='<a href="'.$this->langSl.$this->processUri.'/newview'.
            $this->newBtn_qry.'" class="newRecLink">'.$this->langFile::LINK_TO_CREATE.'</a>';

        $return_ajax.='</div>'.
            '</div>';
        return $return_ajax;

    }

    public function paginationPrint():string
    {
        $pagination = new TpView_Pagination();
        $pagination->setUpCustomLang($pagination->getDefaultLang());
        $pagination->userLang = $this->userLang;
        $pagination->count = $this->listCount;
        $pagination->curPage = $this->curPage;
        $pagination->onPage = $this->onPage;
        return '<span class="found_label">'.$this->langFile::PG_FOUND_LABEL.
            ': <span>'.$this->listCount.'</span></span>'.$pagination->getResponseHtml();
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\List\LangFiles_'.self::ucfirstLang($this->userLang).'_'. 'Views_R_L_NavBar';
        return new $class_Name();
    }
}