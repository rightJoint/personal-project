<?php


namespace Src\Views\JointSite\Design;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_A_App extends SiteView_JointSite
{
    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_App_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_App_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->App = new TpView_JointSite_A_App_Article();
    }

    protected function handleTpApp(): string
    {

        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">444'.$this->tpSet->App->renderView().
            '</div></div></div>';
    }
}