<?php


namespace Src\RoutesCollection\Blog;

use JointApp\Router\JointSiteRoute;

trait RoutesCollection_Siteman_Blog
{
    use RoutesCollection_Siteman_Blog_ArtTags;
    use RoutesCollection_Siteman_Blog_Cats;
    use RoutesCollection_Siteman_Blog_Comments;
    use RoutesCollection_Siteman_Blog_Tags;

    static function getRoute_SitemanBlog($routes_ns):JointSiteRoute
    {
        $route = new JointSiteRoute();
        $route
            ->withController('Src\Controllers\Blog\Controller_Siteman_Blog')
            ->withModel('Src\Models\Blog\Model_Siteman_Blog');

        if(!isset($routes_ns[3]) or $routes_ns[3] == 'listview'){
            $route
                //->withAction("actionTables")
                ->withAction('actionIndex')
                ->withAction('htmlListView')
                ->withView('JointApp\Views\Siteman\SitemanListView');

        }elseif ($routes_ns[3] == 'detailview'){
            $route->withAction('actionDetail')
                ->withAction('htmlDetailView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }elseif ($routes_ns[3] == 'editview'){
            $route->withAction('htmlEditView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }elseif ($routes_ns[3] == 'newview'){
            $route->withAction('htmlNewView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }elseif ($routes_ns[3] == 'deleteview'){
            $route->withAction('htmlDeleteView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }
        //get art tags
        elseif ($routes_ns[3] == 'blogatrtags'){
            $route = self::getRoute_SitemanBlogArtTags($routes_ns);
        }
        //get cats
        elseif ($routes_ns[3] == 'blogcats'){
            $route = self::getRoute_SitemanBlogCats($routes_ns);
        }
        //get comments
        elseif ($routes_ns[3] == 'blogcomments'){
            $route = self::getRoute_SitemanBlogComments($routes_ns);
        }
        //get blogtags
        elseif ($routes_ns[3] == 'blogtags'){
            $route = self::getRoute_SitemanBlogTags($routes_ns);
        }

        return $route;
    }

    static function postRoute_SitemanBlog($routes_ns):JointSiteRoute
    {
        $route = (new JointSiteRoute())
            ->withController('Src\Controllers\Blog\Controller_Siteman_Blog')
            ->withModel('Src\Models\Blog\Model_Siteman_Blog');

        if (!isset($routes_ns[3]) or $routes_ns[3] == 'listview') {
            $route
                ->withAction('applyFilterView')
                ->withView('JointApp\Views\Siteman\SitemanListView')
                ->responseFormat('json');
        }
        elseif ($routes_ns[3] == 'editview') {
            $route
                ->withAction('actionEdit')
                ->withAction('htmlEditView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }
        elseif ($routes_ns[3] == 'deleteview') {
            $route
                ->withAction('actionDelete')
                ->withAction('postDeleteView')
                ->withView('JointApp\Views\Siteman\SitemanDetailView');
        }
        elseif ($routes_ns[3] == 'newview') {
            $route
                ->withAction('actionNew')
                ->withAction('postNewView')
                ->withView('JointApp\Views\Siteman\SitemanEditView');
        }
        //post art tags
        elseif ($routes_ns[3] == 'blogatrtags'){
            $route = self::postRoute_SitemanBlogArtTags($routes_ns);
        }
        //post cats
        elseif ($routes_ns[3] == 'blogcats'){
            $route = self::postRoute_SitemanBlogCats($routes_ns);
        }
        //post comments
        elseif ($routes_ns[3] == 'blogcomments'){
            $route = self::postRoute_SitemanBlogComments($routes_ns);
        }
        //post tags
        elseif ($routes_ns[3] == 'blogtags'){
            $route = self::postRoute_SitemanBlogTags($routes_ns);
        }
        return $route;
    }
}