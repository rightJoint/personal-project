<?php


namespace Src\Models\Blog;


use JointApp\JointAppQueryBuilder;
use JointApp\Models\RecordsModel;

class Model_Siteman_Blog extends RecordsModel
{
    public string $tableName = 'blogArts';

    const ART_COVERS = '/userdata/blog/covers';

    public function getRecordStructure()
    {
        $this->record = array(
            'art_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'artCat' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'artRef' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'artName_en' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'artName_ru' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'artMeta_en' => array(
                'format' => 'text',
                'custom' => false,
            ),
            'artMeta_ru' => array(
                'format' => 'text',
                'custom' => false,
            ),
            'artImg' => array(
                'format' => 'file',
                'file_options' => array(
                    'accept' => '.jpg, .jpeg, .bmp, .git, .png',
                    'load_dir' => self::ART_COVERS.'/artImg',
                    'replaces' => ['artImg'],
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
            'popFlag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'pubDate' => array(
                'format' => 'date',
                'custom' => false,
            ),
            'refreshDate' => array(
                'format' => 'date',
                'custom' => false,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'commentsFlag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'adultFlag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
        );
    }

    public function listRecords(JointAppQueryBuilder $qBuilder): array
    {
        $qBuilder->select(
            $this->tableName.'.art_id, '.
            $this->tableName.'.artCat, '.
            $this->tableName.'.artRef, '.
            $this->tableName.'.artName_en, '.
            $this->tableName.'.artName_ru, '.
            $this->tableName.'.artMeta_en, '.
            $this->tableName.'.artMeta_ru, '.
            $this->tableName.'.artImg, '.
            $this->tableName.'.activeFlag, '.
            $this->tableName.'.indexFlag, '.
            $this->tableName.'.popFlag, '.
            $this->tableName.'.pubDate, '.
            $this->tableName.'.refreshDate, '.
            $this->tableName.'.created_by, '.
            $this->tableName.'.commentsFlag, '.
            $this->tableName.'.adultFlag, '.
            'users.alias, '.
            'blogCats.catName_'.$this->userLang.' as catName'
        )
            ->from($this->tableName)
            ->join(
                'left join users on '.$this->tableName.'.created_by = users.user_id '.
                'left join blogCats on blogCats.cat_id = '.$this->tableName.'.artCat'
            );

        return $this->fetchToArray($qBuilder->buildQuery());
    }
}