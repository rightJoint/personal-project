<?php


namespace JointApp\Views\Records;


use JointApp\Views\TpView;

class TpView_Grid extends TpView
{
    public $listRecords = [];
    public $listFields = [];
    public string $langSl = '';
    public string $processUri = '';

    public function renderView():string
    {
        $return = '';

        if(count($this->listRecords)){
            $return .= '<table>'.
                '<tr class="fCaption">';
            foreach ($this->listFields as $fieldName => $fieldInfo){

                $return.= '<td';
                if(isset($fieldInfo['format']) and ( $fieldInfo['format']== 'hidden')){
                    $return.= ' style="display:none;"';
                }
                $return.='>';
                if ($fieldName == 'btnEdit'){
                    $return.= $this->langFile::EDIT_BTN_TEXT;
                }elseif ($return == 'btnDelete'){
                    $return.= $this->langFile::DELETE_BTN_TEXT;
                }elseif ($fieldName == 'btnDetail'){
                    $return.= $this->langFile::UPDATE_BTN_TEXT;
                }elseif(isset($this->fieldAliases[$fieldName])){
                    $return.= $this->fieldAliases[$fieldName];
                }else{
                    $return.= $fieldName;
                }
                $return.= '</td>';
            }
            $return.= '</tr>';

            foreach($this->listRecords as $row_num => $row){
                $return.= '<tr>';
                foreach ($this->listFields as $fieldName => $fieldInfo){
                    $name_print = null;
                    if(isset($fieldInfo['useName'])){
                        $name_print = ' name="'.$row[$fieldInfo['useName']].'" ';
                    }

                    $return.= '<td';
                    if(isset($fieldInfo['format']) and ($fieldInfo["format"] == 'hidden')){
                        $return.= ' style="display:none;"';
                    }
                    $return.= '>';

                    if ($fieldInfo['format'] == 'file'){

                        if($row[$fieldName]){
                            if($fieldInfo['file_options']['file_type'] == 'img'){
                                $imgLink = null;
                                if($fieldInfo['file_options']['load_dir']){

                                    if(isset($fieldInfo['replaces'])){
                                        $imgLink = $fieldInfo['file_options']['load_dir'];
                                        if($fieldInfo['replaces']){
                                            foreach ($fieldInfo['replaces'] as $replace){
                                                $imgLink = str_replace($replace, $row[$replace], $imgLink);
                                            }
                                        }
                                    }else{
                                        $imgLink = $fieldInfo['file_options']['load_dir'].'/'.$row[$fieldName];
                                    }
                                }

                                if($imgLink){
                                    $return.='<img class="cell-img" src="'.$imgLink.'">';
                                }else{
                                    $return.= 'file:'.$fieldInfo['file_options']['file_type'].':'.$fieldInfo['file_options']['load_dir'].'='.
                                        $row[$fieldName];
                                }
                            }else{
                                $return.= 'file:'.$fieldInfo['file_options']['file_type'].':'.$fieldInfo['file_options']['load_dir'].'='.
                                    $row[$fieldName];
                            }
                        }
                    }elseif($fieldInfo['format'] == 'link'){
                        if(in_array($fieldName, array('btnDetail', 'btnEdit', 'btnDelete'))){
                            $urlLink = null;
                            if($fieldInfo['replaces']){
                                $urlLink = $fieldInfo['url'];
                                foreach ($fieldInfo['replaces'] as $replace){
                                    $repl_pos = strpos($urlLink, $replace);
                                    $urlLink_1 = substr($urlLink, 0, $repl_pos+strlen($replace)+1);
                                    $urlLink_2 = substr($urlLink, $repl_pos+strlen($replace)+1, strlen($urlLink));
                                    $urlLink_3 = str_replace($replace, $row[$replace], $urlLink_2);
                                    $urlLink = $urlLink_1.$urlLink_3;
                                }
                            }
                            //$urlLink .="&".$this->slave_req;
                            if ($fieldName == 'btnDetail'){
                                $return.= '<a href="'.$this->langSl.$this->processUri.'/detailview?'.
                                    $urlLink.'" class="list-btn">'.
                                    '<img src="/img/popimg/eye-icon.png"></a>';
                            }elseif ($fieldName == 'btnEdit'){
                                if(!isset($row['btnEdit']) or $row['btnEdit']!='disabled'){
                                    $return.= '<a href="'.$this->langSl.$this->processUri.'/editview?'.
                                        $urlLink.'" class="list-btn">'.
                                        '<img src="/img/popimg/edit-icon.png"></a>';
                                }
                            }elseif ($fieldName == 'btnDelete'){
                                if(!isset($row['btnDelete']) or $row['btnDelete']!='disabled'){
                                    $return.= '<a href="'.$this->langSl.$this->processUri.'/deleteview?'.
                                        $urlLink.'" class="list-btn">'.
                                        '<img src="/img/popimg/drop-icon.png"></a>';
                                }
                            }
                        }else{
                            $urlLink = null;
                            if($fieldInfo['replaces']){
                                $urlLink = $fieldInfo['url'];
                                foreach ($fieldInfo['replaces'] as $replace){
                                    $repl_pos = strpos($urlLink, $replace);
                                    $urlLink_1 = substr($urlLink, 0, $repl_pos+strlen($replace)+1);
                                    $urlLink_2 = substr($urlLink, $repl_pos+strlen($replace)+1, strlen($urlLink));
                                    $urlLink_3 = str_replace($replace, $row[$replace], $urlLink_2);
                                    $urlLink = $urlLink_1.$urlLink_3;
                                }
                            }
                            $return.= "<a href='".$this->langSl.$urlLink."' title='edit'>".$row[$fieldName]."</a>";
                        }
                    }elseif($fieldInfo['format'] == 'ref'){
                        $urlLink = null;
                        if($fieldInfo['replaces']){
                            $urlLink = $fieldInfo['url'];
                            foreach ($fieldInfo['replaces'] as $replace){
                                $urlLink = str_replace($replace, $row[$replace], $urlLink);
                            }
                        }
                        $return.= '<a href="'.$this->langSl.$this->processUri.'/'.$urlLink.'" title="edit">'.$row[$fieldName].'</a>';

                    }elseif (($fieldInfo['format'] == 'varchar') or ($fieldInfo['format'] =='text')){
                        if(isset($fieldInfo['max_length']) and isset($row[$fieldName]) and  $fieldInfo['max_length'] < strlen($row[$fieldName]) ){
                            $return.= mb_substr($row[$fieldName], 0, $fieldInfo["max_length"]).' ...';
                        }else {
                            $return.=  $row[$fieldName];
                        }
                    }elseif (($fieldInfo['format'] == 'int') or ($fieldInfo['format'] =='float')
                        or ($fieldInfo['format'] =='datetime')or ($fieldInfo['format'] =='date')){
                        $return.=  $row[$fieldName];
                    }elseif (($fieldInfo['format'] == 'tinyint') or ($fieldInfo['format'] == 'checkbox')){
                        $return.= '<input type="checkbox" '.$name_print;
                        if($row[$fieldName]){
                            $return.= 'checked';
                        }
                        $return.='>';
                    }elseif ($fieldInfo['format'] == 'select'){
                        $return.= $fieldInfo['filling'][$row[$fieldName]];
                    }
                    else{
                        /*
                        $custom_type = static::getCustomListType($fieldName, $row[$fieldName]);
                        if($custom_type != null){
                            $return.=$custom_type;
                        }else{
                            $return.= '<span>[format='.$fieldInfo['format'].']:</span>'.$row[$fieldName];
                        }*/
                    }
                    $return.= '</td>';
                }
                $return.= '</tr>';
            }
            $return.= '</table>';
        }
        return $return;
    }

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\List\LangFiles_'.self::ucfirstLang($lang).'_'. 'Views_R_L_Grid';
        $langFile = new $class_Name();
        return $langFile;
    }

    public static function getCss():array
    {
        return [
            'listViewGrid' => '/css/records/listViewGrid.css',
        ];
    }
}