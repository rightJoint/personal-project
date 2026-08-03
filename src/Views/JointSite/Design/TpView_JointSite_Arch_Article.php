<?php


namespace Src\Views\JointSite\Design;



use JointApp\Views\TpView;


class TpView_JointSite_Arch_Article extends TpView
{
    public string $langSl = '';

    public function renderView():string
    {
        return $this->langFile::H3;
    }

    protected function replaceDefaultHeadLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Head';
        return new $class_Name();
    }

    protected function replaceDefaultHeaderLang()
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.$this->ucfirstLang($this->userLang).'_'.'Views_JS_A_Header';
        return new $class_Name();
    }

    protected function putArticleTemplate()
    {
        $this->tpSet->Arch = new TpView_JointSite_Arch_Article();
    }

    protected function handleTpArch(): string
    {

        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.$this->tpSet->Arch->renderView().
            '</div></div></div>';
    }

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JointSite_A_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}