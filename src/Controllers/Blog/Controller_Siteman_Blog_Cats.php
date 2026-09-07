<?php


namespace Src\Controllers\Blog;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Siteman_Blog_Cats extends RecordsControllerWeb
{
    public string $processUri = '/siteman/blog/blogcats';
    public string $list_frame_id = 'blogcats';

    const BLOG_CATS_IMG = '/userdata/blog/cats';

    public function prepareEditFields(): void
    {

        $this->editFields = array(
            'cat_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'curVal' => '',
            ),
            'catAlias' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'catName_en' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'catName_ru' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'catMeta_en' => array(
                'format' => 'text',
                'curVal' => '',
            ),
            'catMeta_ru' => array(
                'format' => 'text',
                'curVal' => '',
            ),
            'catImg' => array(
                'format' => 'file',
                'file_options' => array(
                    "load_dir" => self::BLOG_CATS_IMG,
                    'file_type' => 'img',
                    'accept' => '.jpg, .jpeg, .bmp, .git, .png',
                    'button' => true,
                ),
                'with_name' => 'GUID',
                'curVal' => '',
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
            'indexFlag' => array(
                'format' => 'tinyint',
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
            'cat_id' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'catAlias' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'catName_en' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'catName_ru' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'catMeta_en' => array(
                'format' => 'text',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'catMeta_ru' => array(
                'format' => 'text',
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
            'indexFlag' => array(
                'format' => 'tinyint',
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
        );

    }

    public function prepareListFields(): void
    {
        $this->listFields = array(
            'btnDetail' => array(
                'replaces' => ['cat_id'],
                'format' => 'link',
                'url' => 'cat_id=cat_id',
            ),
            'btnEdit' => array(
                'replaces' => ['cat_id'],
                'format' => 'link',
                'url' => 'cat_id=cat_id',
            ),
            'btnDelete' => array(
                'replaces' => ['cat_id'],
                'format' => 'link',
                'url' => 'cat_id=cat_id',
            ),
            'cat_id' => array(
                'format' => 'varchar',
            ),
            'catAlias' => array(
                'format' => 'varchar',
            ),
            'catName_en' => array(
                'format' => 'varchar',
            ),
            'catName_ru' => array(
                'format' => 'varchar',
            ),
            'catMeta_en' => array(
                'format' => 'text',
                'max_length' => 10,
            ),
            'catMeta_ru' => array(
                'format' => 'text',
                'max_length' => 10,
            ),
            'catImg' => array(
                'format' => 'file',
                'file_options' => array(
                    "load_dir" => self::BLOG_CATS_IMG,
                    "file_type" => "img",
                ),
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
            ),
            'indexFlag' => array(
                'format' => 'tinyint',
            ),
            'created_by' => array(
                'format' => 'varchar',
            ),
        );
    }

    protected function checkAccessController(): bool
    {
        return $this->user->isAdmin();
    }
}