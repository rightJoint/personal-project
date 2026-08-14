<?php

namespace Src\Views\Test\Records;


use JointApp\Views\TpView;

class TpView_Test_Records_TblSelector extends TpView
{
    public array $tblList = [];
    public string $selectedTbl = '';

    protected $css = [
        'tableselector' => '/css/test/table-selector.css',
    ];

    public function getResponseHtml():string
    {
        $return = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<div class="table-selector"><label for="table-selector">'.$this->langFile::TABLE_SELECTOR_LABEL.': </label>'.
            '<select name="table-selector" id="table-selector" '.
            'onchange="let new_loc_table=&quot;'.$this->langSl.'/test/records/&quot;+this.options[this.selectedIndex].text; 
           window.location.href = new_loc_table">';
        if(count($this->tblList)){
            foreach ($this->tblList as $table_row){
                $tr_key = key($table_row);
                $return .= "<option value='".$table_row[$tr_key]."'";
                if($this->selectedTbl == $table_row[$tr_key]){
                    $return .= " selected";
                }
                $return .= ">".$table_row[$tr_key]."</option>";
            }
        }
        $return .= '</select>'.
            '</div>'.
            '</div></div></div>'.
            '<link rel="stylesheet" href="/css/test/test-rec.css">';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Test\Records\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_T_R_TS_Tp';
        return new $class_Name();
    }
}