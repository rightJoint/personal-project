<?php


namespace Src\Models\Blog;


use JointApp\JointAppQueryBuilder;
use JointApp\Models\RecordsModel;

class Model_Siteman_BlogArtTags extends RecordsModel
{
    public string $tableName = 'blogAtrTags';

    public function getRecordStructure()
    {
        $this->record = array(
            'art_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'tag_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
        );
    }

    public function listRecords(JointAppQueryBuilder $qBuilder): array
    {
        $qBuilder
            ->select(
                $this->tableName.'.art_id, '.
                $this->tableName.'.tag_id, '.
                $this->tableName.'.created_by, '.
                'blogArts.artName_'.$this->userLang.' as artName, '.
                'blogTags.tag_'.$this->userLang.' as tagName '
            )
            ->from($this->tableName)
            ->join(
                'left join blogArts on '.$this->tableName.'.art_id = blogArts.art_id '.
                'left join blogTags on '.$this->tableName.'.tag_id = blogTags.tag_id '
            );

        return $this->fetchToArray($qBuilder->buildQuery());
    }
}