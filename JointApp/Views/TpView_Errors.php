<?php


namespace JointApp\Views;


class TpView_Errors extends TpView
{
    public int $response_status_code = 200;
    public $app_custom_log = [];

    public static function loadViewLang(string $userLang = 'ru')
    {
        $class_Name = 'JointApp\LangFiles\Views\LangFiles_'.self::ucfirstLang($userLang).'_'.'Views_Errors_Page';
        return new $class_Name();
    }

    public function renderView():string
    {
        $html = '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<div class="err-wrap">'.
            '<div class="ew-warning">'.
            $this->langFile::TEXT_ON_TOP.
            '</div>'.
            '<span class="ew-txt">'.$this->langFile::TEXT_ON_BOTTOM.'</span>'.
            '<span class="ew-code">'.$this->response_status_code.'</span>'.
            '<span class="ew-h">';

        if(count($this->app_custom_log)){
            $html.= '</span>'.
                '<div class="ew-detail">'.
                $this->displayErrorsLevels(['warning', 'critical', 'alert', 'emergency', 'error']);
            '</div>';
        }
        $html.= '</div>'.
            '</div>'.
            '</div>'.
            '</div>';
        return $html;
    }

    protected function displayErrorsLevels($levels=[]):string
    {
        $return = '';
        foreach ($this->app_custom_log as $num=>$errInfo){
            $level = key($errInfo);
            $logText='<div class="logger-errors '.$level.'">'.
                $level.' --> '.$errInfo[$level].'<br></div>';
            if(count($levels)){
                if(in_array($level, $levels)){
                    $return.=$logText;
                }
            }else{
                $return.=$logText;
            }
        }

        return $return;
    }

    public static function getCss():array
    {
        return [
            'errors' => '/css/errors.css',
        ];
    }
}