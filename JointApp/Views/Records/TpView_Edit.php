<?php


namespace JointApp\Views\Records;


use JointApp\Views\TpView;

class TpView_Edit extends TpView
{
    use HtmlInputsTrait;

    public string $h2 = '';
    public string $processUri = '';
    public string $pri_query = '?';

    public array $editFields = [];
    public $fieldAliases = [];

    public string $langSl = '';

    public bool $action_result = false;
    public string $action_log = '';
    public string $type_of_view = 'edit';


    public function renderView():string
    {
        $return = '<div class="record-frame '.$this->type_of_view.'">';
        if ($this->h2) {
            $return.= '<h2><a href="'.$this->langSl.$this->processUri.'">'.$this->h2.'</a></h2>';
        }
        $return.= '<form class="editForm" method="post" enctype="multipart/form-data">';

        foreach ($this->editFields as $fieldName => $fieldData) {
            if(isset($this->fieldAliases[$fieldName])){
                $name_input = $this->fieldAliases[$fieldName];
            }else{
                $name_input = $fieldName;
            }
            $htmlInput = self::getInputType($fieldName, $fieldData, $name_input);
            $return.= $htmlInput->getHtml();
        }
        $return.= '<div class="submit-line">';
        if($this->action_result){
            $sub_class = 'well';
        }else{
            $sub_class = 'fail';
        }
        $return.= '<div class="action-log '.$sub_class.'">'.$this->action_log.'</div>';
        $return.= '<input name="submitEditForm" type="submit" name="submitDeleteView" value="';
        $return.= $this->type_of_view;
        $return.='"> </div>'.
            '</form>'.
            '</div>'.
            '<div class="record-nav">';
        if($this->type_of_view == 'edit'){
            $return.='<a href="'.$this->processUri.'/detailview'.$this->pri_query.'" title="detail view"><img src="/img/popimg/eye-icon.png">detail</a>'.
                '<a href="'.$this->processUri.'/deleteview'.$this->pri_query.'" title="delete record"><img src="/img/popimg/drop-icon.png">delete</a>'.
                '<a href="'.$this->processUri.'/newview" title="new record"><img src="/img/popimg/create-icon.png">New</a>';
        }
        $return.='<a href="'.$this->processUri.'" title="list records"><img src="/img/popimg/search-icon.png">list</a>'.
            '</div>';
        return $return;
    }

    public static function getCss():array
    {
        return [
            'recordframe' => '/css/records/record-frame.css',
        ];
    }
}