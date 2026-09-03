<?php


namespace JointApp\Views\Records;


use JointApp\Views\TpView;

class TpView_Pagination extends TpView
{
    public int $count = 0;
    public int $onPage = 4;
    public int $curPage = 1;


    public function getResponseHtml(): string
    {
        $length = 2;        //optional: count cells in table row
        $pag_length = 2;    //optional:
        if(round($this->count/$this->onPage) - $this->count/$this->onPage < 0){
            $page_count = round($this->count/$this->onPage) + 1;
        }else{
            $page_count =  round($this->count/$this->onPage);
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

        return $btn_pre.$page_list.$btn_nex;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\List\LangFiles_'.self::ucfirstLang($this->userLang).'_'. 'Views_Pagination';
        return new $class_Name();
    }
}