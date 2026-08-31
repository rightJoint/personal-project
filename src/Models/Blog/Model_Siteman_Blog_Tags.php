<?php


namespace Src\Models\Blog;


use JointApp\Models\RecordsModel;

class Model_Siteman_Blog_Tags extends RecordsModel
{
    public string $tableName = 'blogTags';

    public function getRecordStructure()
    {

        $this->record = array(
            'tag_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'tag_en' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'tag_ru' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
        );
    }
}