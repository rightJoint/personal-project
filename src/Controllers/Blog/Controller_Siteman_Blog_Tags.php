<?php


namespace Src\Controllers\Blog;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Siteman_Blog_Tags extends RecordsControllerWeb
{
    public string $list_frame_id = 'blogtags';

    public string $processUri = '/siteman/blog/blogtags';

    public function prepareEditFields(): void
    {
        $this->editFields = array(
            'tag_id' => array(
                'format' => 'varchar',
                'curVal' => '',
                'pri' => 1,
            ),
            'tag_en' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'tag_ru' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'created_by' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
        );
    }

    public function prepareSearchFields(): void
    {
        $this->searchFields = array(
            'tag_id' => array(
                'format' => 'hidden',
                'search' => 0,
                'sort' => 0,
                'curVal' => null,
            ),
            'tag_en' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'tag_ru' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'created_by' => array(
                'format' => 'hidden',
                'search' => 0,
                'sort' => 0,
                'curVal' => null,
            ),
        );
    }

    public function prepareListFields(): void
    {

        $this->listFields = array(
            'btnDetail' => array(
                'replaces' => ['tag_id'],
                'format' => 'link',
                'url' => 'tag_id=tag_id',
            ),
            'btnEdit' => array(
                'replaces' => ['tag_id'],
                'format' => 'link',
                'url' => 'tag_id=tag_id',
            ),
            'btnDelete' => array(
                'replaces' => ['tag_id'],
                'format' => 'link',
                'url' => 'tag_id=tag_id',
            ),
            'tag_id' => array(
                'format' => 'hidden',
            ),
            'tag_en' => array(
                'format' => 'varchar',
            ),
            'tag_ru' => array(
                'format' => 'varchar',
            ),
            'created_by' => array(
                'format' => 'hidden',
            ),
        );
    }
}