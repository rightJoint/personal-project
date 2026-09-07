<?php


namespace Src\RoutesCollection\Blog;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Blog
{
    static function getRoute_Blog($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        //blog
        if(!isset($routes_ns[2]) or empty($routes_ns[2])){
            $route
                ->withController('Src\Controllers\Blog\Controller_Blog')
                ->withModel('Src\Models\Blog\Model_Blog',)
                ->withAction('actionIndex')
                ->withView('Src\Views\Blog\SiteView_Blog_Main');
        }
        //blog/article
        elseif(isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'article'){
            if(isset($routes_ns[3])){
                $route
                    ->withController('Src\Controllers\Blog\Controller_Blog_Arts', ['artRef' => $routes_ns[3]])
                    ->withModel('Src\Models\Blog\Model_Blog_Arts',)
                    ->withAction('actionIndex');
                if(strtolower($routes_ns[3]) == 'test-task-php-job'){
                    $route->withView('Src\Views\Blog\IT\SiteView_Blog_TestTaskPhpJob');
                }elseif(strtolower($routes_ns[3]) == 'sql-cheat-sheet'){
                    $route->withView('Src\Views\Blog\IT\SiteView_Blog_IT_FiftySqlQuestions');
                }
                else{
                    $route->withView('Src\Views\Blog\SiteView_Blog_Art');
                }
            }
        }
        //blog/testTask
        elseif(isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'testtask'){
            //blog/testTask/
            if(isset($routes_ns[3])){
                //blog/testTask/parse-brackets
                if(strtolower($routes_ns[3]) == 'parse-brackets'){
                    $route
                        ->withController('Src\Controllers\Blog\Controller_Blog_Test')
                        ->withModel('Src\Models\Blog\Model_Blog_Test',)
                        ->withAction('parseBrackets')
                        ->withView('Src\Views\Blog\IT\View_Blog_IT_TestTaskParseBrackets')
                        ->responseFormat('json');
                }
                //blog/testTask/alvasarcode
                elseif(strtolower($routes_ns[3]) == 'alvasarcode'){
                    $route
                        ->withController('Src\Controllers\Blog\Controller_Blog_Test')
                        ->withModel('Src\Models\Blog\Model_Blog_Test',)
                        ->withAction('alvasarCode')
                        ->withView('Src\Views\Blog\IT\View_Blog_IT_TestTaskParseBrackets')
                        ->responseFormat('json');
                }
            }
        }
        return $route;
    }

    static function postRoute_Blog($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        //blog filter
        if (isset($routes_ns[2]) and $routes_ns[2] == 'filter') {
            $route
                ->withController('Src\Controllers\Blog\Controller_Blog')
                ->withModel('Src\Models\Blog\Model_Blog',)
                ->withAction('actionFilter')
                ->withView('Src\Views\Blog\SiteView_Blog_Main')
                ->responseFormat('json');
        }
        //homepage filter
        elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'filterhome'){
            $route
                ->withController('Src\Controllers\Blog\Controller_Blog')
                ->withModel('Src\Models\Blog\Model_Blog',)
                ->withAction('actionFilterHome')
                ->withView('Src\Views\Blog\SiteView_Blog_Main')
                ->responseFormat('json');
        }
        //art comments filter
        elseif($routes_ns[2] == 'filter-comments'){
            $route
                ->withController('Src\Controllers\Blog\Controller_Blog_Arts')
                ->withModel('Src\Models\Blog\Model_Blog_Arts',)
                ->withAction('filterComments')
                ->withView('Src\Views\Blog\TpView_Blog_Art_Comments')
                ->responseFormat('json');
        }
        //post add comment
        elseif (isset($routes_ns[2]) and strtolower($routes_ns[2]) == 'article') {
            if (isset($routes_ns[3])) {
                $route
                    ->withController('Src\Controllers\Blog\Controller_Blog_Arts', ['artRef' => $routes_ns[3]])
                    ->withModel('Src\Models\Blog\Model_Blog_Arts',)
                    ->withAction('postComment')
                    ->withAction('actionIndex')
                    ->withView('Src\Views\Blog\SiteView_Blog_Art');
            }
        }
        return $route;
    }
}