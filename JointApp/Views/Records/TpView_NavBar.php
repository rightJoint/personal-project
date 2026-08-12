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
            self::paginationPrint();

        $return_ajax.= '</div>'.
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
            if($fieldData['format'] != 'hidden'){
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

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\List\LangFiles_'.self::ucfirstLang($this->userLang).'_'. 'Views_R_L_NavBar';
        return new $class_Name();
    }

    //public static function paginationPrint(\stdClass $langPg, $recordsCount, $curPage, $onPage, $length=2, $pag_length=2):string
    public function paginationPrint():string
    {
        $length = 2;        //optional: count cells in table row
        $pag_length = 2;    //optional:
        if(round($this->listCount/$this->onPage) - $this->listCount/$this->onPage < 0){
            $page_count = round($this->listCount/$this->onPage) + 1;
        }else{
            $page_count =  round($this->listCount/$this->onPage);
        }

        $p_add_num_start = 0;

        if($this->curPage - $pag_length < 1){
            $p_add_num_start = $pag_length - $this->curPage +1;
        }

        $end_p_num = $this->curPage + $pag_length + $p_add_num_start;
        if($end_p_num > $page_count){
            $end_p_num = $page_count;
        }

        $start_p_num = $this->curPage - $pag_length + $p_add_num_start;
        if($end_p_num - $pag_length*2  < $start_p_num){
            $start_p_num = $end_p_num - $pag_length*2;
        }
        if($start_p_num < 1){
            $start_p_num = 1;
        }
        $page_list = null;
        for ($i = $start_p_num; $i <= $end_p_num; $i++){
            if ($this->curPage == $i){
                $page_list .= '<span class = "p_num active" page="'.$i.'">'.$i.'</span>';
            }else{
                if($i == 1){
                    $page_list .= '<span class = "p_num" page="'.$i.'" '.
                        '>'.$i.'</span>';
                }else{
                    $page_list .= '<span class = "p_num" page="'.$i.'" '.
                        '>'.$i.'</span>';
                }
            }
        }

        if($this->curPage < $page_count){
            $btn_nex = '<span class="p_btn next" page="'.($this->curPage+1).'" '.
                '>'.$this->langFile::PG_NEXT.'</span>';
        }else {
            $btn_nex = '<span class="p_btn next active" page="'.$this->curPage.'">'.$this->langFile::PG_NEXT.'</span>';
        }

        if ($this->curPage > 1){
            $btn_pre = '<span class="p_btn prev" page="'.($this->curPage-1).'" '.
                '>'.$this->langFile::PG_BACK.'</span>';
        }else {
            $btn_pre = '<span class="p_btn prev active" page="'.$this->curPage.'">'.$this->langFile::PG_BACK.'</span>';
        }

        return '<span class="found_label">'.$this->langFile::FOUND_LABEL.
            ': <span>'.$this->listCount.'</span></span>'.$btn_pre.$page_list.$btn_nex;
    }
}