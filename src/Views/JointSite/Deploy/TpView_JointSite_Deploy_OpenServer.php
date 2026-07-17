<?php


namespace Src\Views\JointSite\Deploy;



use Src\Views\TpViewSrc;

class TpView_JointSite_Deploy_OpenServer extends TpViewSrc
{
    const LANG_FILE_NAME = 'Views_JointSite_Deploy_OpenServerTp';
    const APPND_DIR = '/Views/JointSite/Deploy';

    public static function renderView(\stdClass $langFile, \stdClass $viewData):string
    {
        return
            '<div class="pageContentJointSite">'.
            '<section>'.
            '<h3>'.$langFile->h3.'</h3>'.
            '<p>'.$langFile->p1.'</p>'.
            '<h4>'.$langFile->h4_1.'</h4>'.
            '<p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>git clone https://github.com/rightJoint/personal-project personal-project.web</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$langFile->cm_1.'</div>'.
            '</p>'.
            '<h4>'.$langFile->h4_2.'</h4>'.
            '<p>'.$langFile->p2.'</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>127.0.0.1 personal-project.web</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$langFile->cm_2.'</div>'.
            '</p>'.
            '<h4>'.$langFile->h4_3.'</h4>'.
            '<p>'.$langFile->p3_1.'</p>'.
            '<p>'.$langFile->p3_2_1.
            '<ul>'.
            '<li>HTTP Apache_2.4-PHP_8.0-8.1</li>'.
            '<li>PHP PHP_8.1</li>'.
            '<li>MySQL/MariaDb MySQL-5.6</li>'.
            '</ul>'.
            $langFile->p3_2_2.
            '</p>'.
            '<p>'.$langFile->p3_3.'</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>\personal-project.web\src</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$langFile->cm_3.'</div>'.
            '<h4>'.
            'php composer'.
            '</h4>'.
            '<p>'.$langFile->p4.
            '</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>composer update</li>'.
            '</ul>'.
            '</div>'.
            '<div class="code-comment">'.$langFile->cm_4.'</div>'.
            '<h4>'.$langFile->h4_5.'</h4>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>mklink /d "C:\OSPanel\domains\personal-project.web\src\vendor" "C:\OSPanel\domains\personal-project.web\vendor"</li>'.
            '</ul>'.
            '</div>'.
            '<p>'.$langFile->p5.'</p>'.
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
}