<?php


namespace Src\Views\Blog;


use JointApp\Views\TpView;
use Src\Views\Blog\IT\TpView_Blog_IT_TestTaskPhpJob;

class ArtTpViewSelector
{
    public static function chooseTpView(string $artRef = '')
    {
        switch ($artRef){
            case 'test-task-php-job':
                return new TpView_Blog_IT_TestTaskPhpJob();
            default:
                return new TpView();
        }

    }
}