<?php


namespace Src\Views\JointSite\Design\View;



use JointApp\Views\TpView;

class TpView_JointSite_D_V_TpView extends TpView
{
    public function renderView():string
    {
        return
            '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            '<p>'.$this->langFile::P1.'</p>'.
            '<p>'.$this->langFile::P2.
            '<ul>'.
            '<li>'.$this->langFile::P2_LI1.'</li>'.
            '<li>'.$this->langFile::P2_LI2.'</li>'.
            '<li>'.$this->langFile::P2_LI3.'</li>'.
            '</ul>'.
            '</p>'.
            '<h4>'.$this->langFile::H4_0.'</h4>'.
            '<p>'.$this->langFile::P_0_1.
            '<ul>'.
            '<li>loadViewLang(string $userLang = "ru") - '.$this->langFile::P_0_LI1.'</li>'.
            '<li>setLangFile($langFile) - '.$this->langFile::P_0_LI2.'</li>'.
            '<li>renderView():string - '.$this->langFile::P_0_LI3.'</li>'.
            '<li>getJS():array - '.$this->langFile::P_0_LI4.'</li>'.
            '<li>getCss():array - '.$this->langFile::P_0_LI5.'</li>'.
            '</ul>'.
            '</p>'.
            '<h4>'.$this->langFile::H4_1.'</h4>'.
            '<p>'.$this->langFile::P3_1.'</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>public static function loadViewLang(string $userLang = "ru");</li>'.
            '<li>{</li>'.
            '<li class="sp-1">$class_Name = "Src\LangFiles\Views\JointSite\Design\View\LangFiles_".self::ucfirstLang($lang)."_V_JS_D_V_TV_Article"</li>'.
            '<li class="sp-1">$langFile = new $class_Name();</li>'.
            '<li class="sp-1">return $langFile;</li>'.
            '<li>}</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$this->langFile::CM_1.'</div>'.
            '<p>'.$this->langFile::P3_2.'</p>'.
            '<h4>'.$this->langFile::H4_2.'</h4>'.
            '<p>'.$this->langFile::P4.'</p>'.
            //'<h4>'.$this->langFile::H4_3.'</h4>'.
            //'<p>'.$this->langFile::P5.'</p>'.
            '<h4>'.$this->langFile::H4_4.'</h4>'.
            '<p>'.$this->langFile::P6_1.'</p>'.
            '<p>'.$this->langFile::P6_2.'</p>'.
            '<h4>'.$this->langFile::H4_5.'</h4>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>require __DIR__ . "/vendor/autoload.php";</li>'.
            '<li></li>'.
            '<li>use Src\Views\JointSite\Design\View\TpView_JointSite_D_V_TpView;</li>'.
            '<li></li>'.
            '<li>$langFile = TpView_JointSite_D_V_TpView::loadViewLang("ru");</li>'.
            '<li>$view = new TpView_JointSite_D_V_TpView();</li>'.
            '<li>$view->setLangFile($langFile);</li>'.
            '<li>$js = TpView_JointSite_D_V_TpView::printJs();</li>'.
            '<li>$css = TpView_JointSite_D_V_TpView::printCss();</li>'.
            '<li></li>'.
            '<li>echo $view->renderView().$js.$css;</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$this->langFile::CM_2.'</div>'.
            '</section>'.
            '</article>';
    }

    public static function getCss():array
    {
        return [
            'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
            'codesnippet' => '/css/code-snippet.css',
        ];
    }

    public static function loadViewLang(string $lang = 'ru')
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\View\LangFiles_'.self::ucfirstLang($lang).'_V_JS_D_V_TV_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}