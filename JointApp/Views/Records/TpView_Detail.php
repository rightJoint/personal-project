<?php


namespace JointApp\Views\Records;


use JointApp\Views\TpView;

class TpView_Detail extends TpView
{
    use HtmlInputsTrait;

    public string $h2 = '';
    public string $processUri = '';
    public string $langSl = '';

    public string $type = 'detail';
    public $action_log = [];
    public $viewFields = [];
    public $fieldAliases = [];

    public function renderView():string
    {
        $return = '<div class="detail-record-frame">';
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

            $return.='<div class="input-line'.' '.$line_class.'">'.'<label>'.$fieldName.': </label>'.$fieldData['curVal'].'</div>';
        }
        $return.= '</div>';

        return $return;
    }

    public static function getCss():array
    {
        return [
            'detailview' => '/css/records/detail-view.css',
        ];
    }
}