<?php

namespace JointApp\Views\Records;


use JointApp\Interfaces\HtmlInputViewInterface;

trait HtmlInputsTrait
{
    static function getInputType($fieldName, $fieldOption = [], string $fieldAlias = ''):HtmlInputViewInterface
    {
        $inputClass = 'JointApp\Views\HtmlInputs\Html'.ucfirst($fieldOption['format']).'Type';
        $htmlInputView = new $inputClass($fieldName, $fieldOption, $fieldAlias);

        $htmlInputView->htmlLabelStyle();
        $htmlInputView->htmlId();
        $htmlInputView->htmlName();
        $htmlInputView->htmlReadonly();
        $htmlInputView->htmlValue();
        $htmlInputView->htmlLineStyle();
        $htmlInputView->htmlLabel();
        $htmlInputView->htmlInput();

        return $htmlInputView;
    }
}