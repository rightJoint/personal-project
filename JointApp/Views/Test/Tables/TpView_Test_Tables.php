<?php


namespace JointApp\Views\Test\Tables;


use JointApp\Views\TpView;

class TpView_Test_Tables extends TpView
{

    public $tablesList = [];

    protected $css = [
        'test-tables' => '/css/test/tables.css',
    ];

    protected $js = [
        'test-tables' => '/js/test/tables.js',
    ];

    public function getResponseHtml():string
    {
        $return = '<div class="contentBlock-frame admin"><div class="contentBlock-center"><div class="contentBlock-wrap">'.
            '<div class="optionsPanel"><div class="uploadOptions">'.
            '<label for="prefixTag">'.$this->langFile::TABLES_OPT_PREFIX.'</label><input type="text" id="prefixTag" name="prefixTag">'.
            '<label for="dateTag">'.$this->langFile::TABLES_OPT_DTTG.'</label>'.
            '<input type="checkbox" id="dateTag" name="dateTag" checked>'.
            '</div>'.
            '<div class="btnPanel">'.
            '<input type="button" class="uploadAll" value="'.$this->langFile::TABLES_BTN_UPLOADALL.'" onclick="upLoadAll()">'.
            '<input type="button" class="refresh" value="'.$this->langFile::TABLES_BTN_REFRESH.'" onclick="refreshTables()">'.
            '<input type="button" class="showLog" value="'.$this->langFile::TABLES_BTN_LOG.'" onclick="showLog()">'.
            '</div></div>'.
            '</div></div></div>'.
            '<div class="contentBlock-frame"><div class="contentBlock-center"><div class="contentBlock-wrap">'.
            '<div class="tablesList">'.
            $this->printTablesList().
            '</div></div></div></div>'.
            '<div class="modal tablesLog"><div class="overlay"></div><div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="modal-right"><img src="/img/popimg/closeModal.png" title="закрыть"></div>'.
            '<div class="logPanel"><h3>'.$this->langFile::TABLES_H3.':</h3></div>'.
            '</div></div></div>';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Test\Tables\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_T_T_Tp';
        return new $class_Name();
    }

    public function printTablesList():string
    {
        $return = '<div class="table-line caption"><div class="table-cell tblName">'.
            $this->langFile::TABLES_CELL_TABLE.
            '</div>'.
            '<div class="table-cell tblLst">'.
            $this->langFile::TABLES_CELL_LIST.
            '</div>'.
            '<div class="table-cell tblExt">'.
            $this->langFile::TABLES_CELL_EXT.
            '</div>'.
            '<div class="table-cell tblAct">'.
            $this->langFile::TABLES_CELL_ACT.
            '</div><div class="table-cell tblDwlTag">'.
            $this->langFile::TABLES_CELL_BU.
            '</div></div>';

        if(count($this->tablesList)){
            foreach ($this->tablesList as $table_name=>$table_data) {
                $return.= '<div class="table-line">';
                $return.= self::tableCell($table_name, $table_data);
                $return.= '</div>';
            }
        }

        return $return;
    }

    public static function tableCell($table_name, $table_data):string
    {
        $return = '<div class="table-cell tblName"><a href="';
        if (isset($table_data['exist'])) {
            $return .= '/test/records/'.$table_name;
        }else{
            $return .= '#';
        }
        $return .= '">' . $table_name . '</a></div>';
        $td_list = '<div class="table-cell tblLst">';
        $td_exist = '<div class="table-cell tblExt">';
        $td_create = '<div class="table-cell action-icon">';
        $td_drop = '<div class="table-cell action-icon">';
        $td_clear = '<div class="table-cell action-icon a-clear">';
        $td_upload = '<div class="table-cell action-icon">';
        $td_download = '<div class="table-cell action-icon">';
        $td_select = '<div class="table-cell tblDwlTag">';
        $option_text = null;
        $countArchives = 0;
        if(isset($table_data['load'])){
            foreach ($table_data['load'] as $tableToLoad) {
                $option_text .= '<option value="' . $tableToLoad . '">' .
                    basename($tableToLoad);
                '</option>';
                $countArchives++;
            }
        }
        if ($countArchives == 0) {
            $td_select .= ' - ';
        } else {
            $td_select .= '<select>' . $option_text . '</select>';
        }
        $td_list .= '<input type="checkbox" ';
        $td_exist .= '<input type="checkbox" ';
        if (isset($table_data['exist'])) {
            $td_exist .= 'checked';
            $td_drop .= '<img src="/img/popimg/drop-icon.png" action="drop" onclick="tables(this)">';
            if ($table_data['qty'] > 0) {
                $td_clear.='<img src="/img/popimg/clear-icon.png" action="clear" onclick="tables(this)">';
                $td_clear .= '<span>' .
                    ' (' . $table_data['qty'] . ')</span>';
                $td_upload .= '<img src="/img/popimg/upLoad-icon.png" action="upLoad" onclick="tables(this)">';
            } else {
                $td_clear .= ' 0 ';
                $td_upload .= ' - ';
            }
            if ($countArchives > 0) {
                $td_download .= '<img src="/img/popimg/downLoad-icon.png" action="download"  onclick="tables(this)">';
            } else {
                $td_download .= ' - ';
            }
            if (isset($table_data['list'])) {
                $td_list .= 'checked';
            }
            $td_create .= ' - ';
        } else {
            $td_clear .= ' - ';
            $td_upload .= ' - ';
            $td_drop .= ' - ';
            $td_download .= " - ";
            if (isset($table_data['list']) and $table_data['list'] == true) {
                $td_create .= '<img src="/img/popimg/create-icon.png" action="create" onclick="tables(this)">';
                $td_list .= 'checked';
            }
        }
        $td_exist .= ' disabled>';
        $td_list .= ' disabled>';
        $td_list .= '</div>';
        $td_exist .= '</div>';
        $td_create .= '</div>';
        $td_drop .= '</div>';
        $td_clear .= '</div>';
        $td_upload .= '</div>';
        $td_download .= '</div>';
        $td_select .= '</div>';
        return $return. $td_list . $td_exist . $td_create . $td_drop . $td_clear . $td_upload . $td_download . $td_select;

    }
}