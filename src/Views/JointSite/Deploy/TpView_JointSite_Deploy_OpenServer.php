<?php


namespace Src\Views\JointSite\Deploy;



use JointApp\Views\TpView;


class TpView_JointSite_Deploy_OpenServer extends TpView
{
    public function renderView():string
    {
        return
            '<article class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$this->langFile::H3.'</h3>'.
            '<p>'.$this->langFile::P1.'</p>'.
            '<h4>'.$this->langFile::H4_1.'</h4>'.
            '<p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>git clone https://github.com/rightJoint/personal-project personal-project.web</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$this->langFile::CM_1.'</div>'.
            '</p>'.
            '<h4>'.$this->langFile::H4_2.'</h4>'.
            '<p>'.$this->langFile::P2.'</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>127.0.0.1 personal-project.web</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$this->langFile::CM_2.'</div>'.
            '</p>'.
            '<h4>'.$this->langFile::H4_3.'</h4>'.
            '<p>'.$this->langFile::P3_1.'</p>'.
            '<p>'.$this->langFile::P3_2_1.
            '<ul>'.
            '<li>HTTP Apache_2.4-PHP_8.0-8.1</li>'.
            '<li>PHP PHP_8.1</li>'.
            '<li>MySQL/MariaDb MySQL-5.6</li>'.
            '</ul>'.
            $this->langFile::P3_2_2.
            '</p>'.
            '<p>'.$this->langFile::P3_3.'</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>\personal-project.web\src</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$this->langFile::CM_3.'</div>'.
            '<h4>'.
            'php composer'.
            '</h4>'.
            '<p>'.$this->langFile::P4.
            '</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>composer update</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$this->langFile::CM_4.'</div>'.
            '<h4>'.$this->langFile::H4_5.'</h4>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>mklink /d "C:\OSPanel\domains\personal-project.web\src\vendor" "C:\OSPanel\domains\personal-project.web\vendor"</li>'.
            '</ul>'.
            '</div>'.
            '<p>'.$this->langFile::P5.'</p>'.
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
        $class_Name = 'Src\LangFiles\Views\JointSite\Deploy\LangFiles_'.self::ucfirstLang($lang).'_'.'Views_JS_D_OS_Article';
        $langFile = new $class_Name();
        return $langFile;
    }
}