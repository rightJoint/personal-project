<?php


namespace Src\Views\Test\Migrations;


use JointApp\Views\Records\TpView_Detail;

class TpView_Detail_Migrations extends TpView_Detail
{
    public string $exec_one_log = '';

    protected function putCustomPanel(): string
    {
        $return = '';
        if($this->type_of_view == 'detail'){
            $inputs = '';
            foreach ($this->editFields as $fn=>$fv){
                if(isset($fv['pri']) and $fv['pri'] == 1){
                    $inputs.='<input type="hidden" name="'.$fn.'" value="'.$fv['curVal'].'">';
                }
            }
            $return.='<form method="post">';

            $return.='<div class="submit-line">';
            if($this->exec_one_log){
                $return .=  $this->exec_one_log;
            }
            $return.= $inputs.'<input type="submit" name="execOne" value="execOne"></div>'.
                '</form>';
        }


        return $return;
    }
}