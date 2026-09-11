<?php

namespace Src\LangFiles\Views\Blog\Siteman;



class LangFiles_En_Views_Sm_Blog_SubMenu
{
    public static function getLinks():array
    {
        return array(
            'home' => array(
                'title' => 'Статья',
                'text' => 'Статьи',
            ),
            'blogAtrTags' => array(
                'title' => 'Теги к статьям',
                'text' => 'Теги к статьям',
            ),
            'blogCats' => array(
                'title' => 'Категории блога',
                'text' => 'Категории',
            ),
            'blogComments' => array(
                'title' => 'Комменты к статьям',
                'text' => 'Комменты',
            ),
            'blogCommentsLikes' => array(
                'title' => 'Лайки к комментам',
                'text' => 'Лайки',
            ),
            'blogTags' => array(
                'title' => 'Список тегов',
                'text' => 'Теги',
            ),
        );
    }
}