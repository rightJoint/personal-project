<?php


namespace Src\Views\JointSite\Design;



use JointApp\Interfaces\LangFileInterface;
use JointApp\Views\TpView;

class TpView_JointSite_Design_TpView extends TpView
{
    public static function renderView(\stdClass $langFile, \stdClass $viewData, string $langSl = ''):string
    {
        return
            '<div class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$langFile->h3.'</h3>'.
            '<p>'.$langFile->p1.'</p>'.
            '<p>'.$langFile->p2.
            '<ul>'.
            '<li>'.$langFile->p2_li1.'</li>'.
            '<li>'.$langFile->p2_li2.'</li>'.
            '<li>'.$langFile->p2_li3.'</li>'.
            '<li>'.$langFile->p2_li4.'</li>'.
            '</ul>'.
            '</p>'.
            '<h4>'.$langFile->h4_0.'</h4>'.
            '<p>'.$langFile->p_0_1.'</p>'.
            '<p>'.$langFile->p_0_2.
            '<ul>'.
            '<li>'.$langFile->p_0_li1.'</li>'.
            '<li>'.$langFile->p_0_li2.'</li>'.
            '<li>'.$langFile->p_0_li3.'</li>'.
            '</ul>'.
            '</p>'.
            '<h4>'.$langFile->h4_1.'</h4>'.
            '<p>'.$langFile->p3_1.'</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>public static function loadViewLang(string $lang = "ru"):LangFileInterface;</li>'.
            '<li>{</li>'.
            '<li class="sp-1">$class_Name = "Src\LangFiles\Views\JointSite\Design\LangFiles_".self::ucfirstLang($lang)."_"."Views_JointSite_Design_TpViewTp"";</li>'.
            '<li class="sp-1">$langFile = new $class_Name();</li>'.
            '<li class="sp-1">return $langFile;</li>'.
            '<li>}</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$langFile->cm_1.'</div>'.
            '<p>'.$langFile->p3_2.'</p>'.
            '<h4>'.$langFile->h4_2.'</h4>'.
            '<p>'.$langFile->p4.'</p>'.
            '<h4>'.$langFile->h4_3.'</h4>'.
            '<p>'.$langFile->p5.'</p>'.
            '<h4>'.$langFile->h4_4.'</h4>'.
            '<p>'.$langFile->p6_1.'</p>'.
            '<p>'.$langFile->p6_2.'</p>'.
            '<h4>'.$langFile->h4_5.'</h4>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>require __DIR__ . "/vendor/autoload.php";</li>'.
            '<li></li>'.
            '<li>use Src\Views\JointSite\Design\TpView_JointSite_Design_TpView;</li>'.
            '<li></li>'.
            '<li>$langFile = TpView_JointSite_Design_TpView::loadViewLang("ru");</li>'.
            '<li>$view = TpView_JointSite_Design_TpView::renderView($langFile::getLangFile(), new \stdClass());</li>'.
            '<li>$js = TpView_JointSite_Design_TpView::printJs();</li>'.
            '<li>$css = TpView_JointSite_Design_TpView::printCss();</li>'.
            '<li></li>'.
            '<li>echo $view.$js.$css;</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$langFile->cm_2.'</div>'.
            '</section>'.
            '</div>';
    }

    public static function getCss():array
    {
        return [
            'pageContentJointSite' => '/css/jointSite/pageContentJointSite.css',
            'codesnippet' => '/css/code-snippet.css',
        ];
    }

    public static function loadViewLang(string $lang = 'ru'):LangFileInterface
    {
        $class_Name = 'Src\LangFiles\Views\JointSite\Design\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JointSite_Design_TpViewTp';
        $langFile = new $class_Name();
        return $langFile;
    }
}