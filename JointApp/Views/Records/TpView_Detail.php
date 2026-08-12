<?php


namespace JointApp\Views\Records;


use JointApp\Views\TpView;

class TpView_Detail extends TpView
{
    public string $h2 = '';
    public string $processUri = '';
    public string $langSl = '';
    //detail or delete
    public string $type_of_view = 'detail';
    public $viewFields = [];
    public $fieldAliases = [];
    public string $pri_query = '?';
    //delete view use editFields
    public $editFields = [];

    protected $css = [
        'recordframe' => '/css/records/record-frame.css',
    ];

    public function getResponseHtml():string
    {
        $return = '<div class="record-frame '.$this->type_of_view.'">';
        if ($this->h2) {
            $return.= '<h2><a href="'.$this->langSl.$this->processUri.'">'.$this->h2.'</a></h2>';
        }
        foreach ($this->viewFields as $fieldName => $fieldData) {
            if(isset($this->fieldAliases[$fieldName])){
                $name_input = $this->fieldAliases[$fieldName];
            }else{
                $name_input = $fieldName;
            }
            $line_class = '';
            if(isset($fieldData['style']['class']) and $fieldData['style']['class'] == 'wd100'){
                $line_class = 'wd100';
            }
            $return.='<div class="input-line'.' '.$line_class.'">'.'<label>'.$name_input.': </label>'.$fieldData['curVal'].'</div>';
        }

        if($this->type_of_view == 'delete'){
            $inputs = '';
            foreach ($this->editFields as $fn=>$fv){
                if(isset($fv['pri']) and $fv['pri'] == 1){
                    $inputs.='<input type="hidden" name="'.$fn.'" value="'.$fv['curVal'].'">';
                }
            }
            $return.='<form method="post">'.
                '<div class="submit-line">'.$inputs.'<input type="submit" name="submitDeleteView" value="Delete"></div>'.
                '</form>';
        }
        $return.= '</div>';

        $return.= '<div class="record-nav">';
        if($this->type_of_view == 'detail'){
            $return.='<a href="'.$this->processUri.'/editview'.$this->pri_query.'" title="edit record"><img src="/img/popimg/edit-icon.png">edit</a>'.
                '<a href="'.$this->processUri.'/deleteview'.$this->pri_query.'" title="delete record"><img src="/img/popimg/drop-icon.png">delete</a>';
        }else{

            $return.='<a href="'.$this->processUri.'/detailview'.$this->pri_query.'" title="detail record"><img src="/img/popimg/eye-icon.png">detail</a>'.
                '<a href="'.$this->processUri.'/editview'.$this->pri_query.'" title="edit record"><img src="/img/popimg/edit-icon.png">edit</a>';
        }

        $return.='<a href="'.$this->processUri.'/newview" title="new record"><img src="/img/popimg/create-icon.png">New</a>'.
            '<a href="'.$this->processUri.'" title="list records"><img src="/img/popimg/search-icon.png">list</a>'.
            '</div>';
        return $return;
    }
}