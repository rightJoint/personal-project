<?php


namespace Src\Views\JointSite\Deploy;



use Src\Views\JointSite\SiteView_JointSite;

class SiteView_JointSite_Deploy_OpenServer extends SiteView_JointSite
{

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Deploy\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_D_OS_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Deploy\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_D_OS_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->DeployOS = new TpView_JointSite_Deploy_OpenServer();
    }

    protected function handleTpDeployOS(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->DeployOS->renderView().
            '</div></div></div>';
    }
}