<?php


namespace Src\Models\Blog;


use JointApp\Models\RecordsModel;

class Model_Siteman_Blog_Cats extends RecordsModel
{
    public string $tableName = 'blogCats';

    const BLOG_CATS_IMG = '/userdata/blog/cats';

    public function getRecordStructure()
    {
        $this->record = array(
            'cat_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'catAlias' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'catName_en' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'catName_ru' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'catMeta_en' => array(
                'format' => 'text',
                'custom' => false,
            ),
            'catMeta_ru' => array(
                'format' => 'text',
                'custom' => false,
            ),
            'catImg' => array(
                'format' => 'file',
                'file_options' => array(
                    'accept' => '.jpg, .jpeg, .bmp, .git, .png',
                    'load_dir' => self::BLOG_CATS_IMG.'/catImg',
                    'replaces' => ['catImg'],
                ),
                'custom' => false,
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'indexFlag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
        );
    }
}