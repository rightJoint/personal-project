<?php


namespace JointApp\Views\Siteman;


use http\Exception\BadUrlException;
use JointApp\Views\TpView;
use PhpParser\Node\Stmt\Switch_;

class TpView_Siteman_SubMenu extends TpView
{
    public string $list_frame_id = '';

    public $css = ['sm-sub-menu' => '/css/siteman/sm-sub-menu.css'];

    public function getResponseHtml(): string
    {
        $links = self::getHttpLinks($this->list_frame_id);
        $texts = $this->langFile::getLinks();

        $return = '<div class="sm-sub-menu">';
        foreach ($links as $key => $ref){
            $return .= '<a href="'.$ref.'" title="'.$texts[$key]['title'].'">'.$texts[$key]['text'].'</a>';
        }
        $return .='</div>';
        return $return;
    }

    public function getDefaultLang()
    {
        switch ($this->list_frame_id)
        {
            case 'sitemap':
                $class_Name = 'JointApp\LangFiles\Views\Siteman\Sitemap\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Sm_Sitemap_SubMenu';
                break;
            case 'users':
                $class_Name = 'JointApp\LangFiles\Views\Siteman\Users\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Sm_Users_SubMenu';
                break;
            case 'robots':
                $class_Name = 'JointApp\LangFiles\Views\Siteman\Robots\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Sm_Robots_SubMenu';
                break;
            case 'blogArts' or 'blogArtsTags' or 'blogcats' or 'blogcomments':
                $class_Name = 'Src\LangFiles\Views\Blog\Siteman\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Sm_Blog_SubMenu';
                break;
            default:
                $class_Name = 'JointApp\LangFiles\Views\Siteman\LangFiles_'.self::ucfirstLang($this->userLang).'_'.'Views_Siteman_ModulesMenu';
        }

        return new $class_Name();
    }

    public static function getHttpLinks(string $subMenuModule):array
    {
        $blog_links = [
            'home' => '/siteman/blog',
            'blogAtrTags' => '/siteman/blog/blogatrtags',
            'blogCats' => '/siteman/blog/blogcats',
            'blogComments' => '/siteman/blog/blogcomments',
            'blogTags' => '/siteman/blog/blogtags',
            'blogCommentsLikes' => '/siteman/blog/blogcommentslikes',
        ];

        $subMenuLinks = [
            'sitemap' => [
                'home' => '/siteman/sitemap',
                'create' => '/siteman/sitemap/update',
            ],
            'robots' => [
                'home' => '/siteman/robots',
                'create' => '/siteman/robots/update',
            ],
            'users' => [
                'home' => '/siteman/users',
            ],
            'blogArts' => $blog_links,
            'blogcats' => $blog_links,
            'blogArtsTags' => $blog_links,
            'blogcomments' => $blog_links,
            'blogtags' => $blog_links,
        ];

        return $subMenuLinks[$subMenuModule];
    }
}