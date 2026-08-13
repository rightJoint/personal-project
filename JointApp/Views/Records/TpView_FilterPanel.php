<?php


namespace JointApp\Views\Records;


use JointApp\Views\TpView;

class TpView_FilterPanel extends TpView
{
    use HtmlInputsTrait;
    public string $h2 = '';
    public string $processUri = '';

    public $searchFields = [];

    protected $css = [
        'recordForm' => '/css/records/record-frame.css',
    ];

    protected $js = [
        'recordForm' => '/js/records/records.js',
    ];


    public function getResponseHtml():string
    {
        $return = '<div class="record-frame search">';
        if ($this->h2) {
            $return.= '<h2><a href="'.$this->langSl.$this->processUri.'">'.$this->h2.'</a></h2>';
        }
        $return.='<form class="filterForm" method="post">';

        if(count($this->searchFields)){
            foreach ($this->searchFields as $fieldName=>$fieldData){
                if(isset($fieldData['search']) and $fieldData['search'] == true){
                    if(isset($this->fieldAliases[$fieldName])){
                        $name_input = $this->fieldAliases[$fieldName];
                    }else{
                        $name_input = $fieldName;
                    }

                    $htmlInput = self::getInputType($fieldName, $fieldData, $name_input);
                    $return.=$htmlInput->getHtml();
                }
            }
        }

        $return.= '<div class="submit-line">';
        $return.= '<input type="button" class="applyFilterForm" '.
            'value="'.$this->langFile::CLEAR_BTN_TEXT.'" '.
            'onclick="clearSearchInputs()">'.
            '<input type="button" class="applyFilterForm" '.
            'value="'.$this->langFile::APPLY_BTN_TEXT.'" '.
            'onclick="applyFilterForm()">'.
            '</div>'.
            '<input type="hidden" name="applyFilterRec" value="1">'.
            '</form>'.
            '</div>';

        return $return;
    }

    public function getDefaultLang()
    {
        $class_Name = 'JointApp\LangFiles\Views\Records\List\LangFiles_'.self::ucfirstLang($this->userLang).'_'. 'Views_R_L_Filter';
        return new $class_Name();
    }
}