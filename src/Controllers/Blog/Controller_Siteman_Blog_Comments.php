<?php


namespace Src\Controllers\Blog;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Siteman_Blog_Comments extends RecordsControllerWeb
{
    public string $list_frame_id = 'blogcomments';

    public string $processUri = '/siteman/blog/blogcomments';

    const ART_COVERS = '/userdata/blog/covers';

    public function prepareEditFields(): void
    {
        $this->editFields = array(
            'comment_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'curVal' => '',
            ),
            'commentP_id' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'art_id' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'content' => array(
                'format' => 'tinymce',
                'id' => 'content',
                'curVal' => '',
                'style' => array(
                    'class' => 'wd100',
                ),
            ),
            'created_by' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
            'addDate' => array(
                'format' => 'datetime',
                'curVal' => '',
            ),
        );
    }

    public function prepareSearchFields(): void
    {
        $this->searchFields = array(
            'comment_id' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'commentP_id' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'art_id' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'addDate' => array(
                'format' => 'datetime',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artName' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'group_by_field' => 'artName',
                'use_table_name' => '',
                'curVal' => null,
            ),
        );
    }

    public function prepareListFields(): void
    {
        $this->listFields = array(
            'btnDetail' => array(
                'replaces' => ['comment_id'],
                'format' => 'link',
                'url' => 'comment_id=comment_id',
            ),
            'btnEdit' => array(
                'replaces' => ['comment_id'],
                'format' => 'link',
                'url' => 'comment_id=comment_id',
            ),
            'btnDelete' => array(
                'replaces' => ['comment_id'],
                'format' => 'link',
                'url' => 'comment_id=comment_id',
            ),
            'artName' => array(
                'format' => 'varchar',
            ),
            'accAlias' => array(
                'format' => 'varchar',
            ),
            'addDate' => array(
                'format' => 'datetime',
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
            ),
            'comment_id' => array(
                'format' => 'varchar',
            ),
            'commentP_id' => array(
                'format' => 'varchar',
            ),
        );
    }
}