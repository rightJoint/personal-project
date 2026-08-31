<?php


namespace Src\Models\Blog;


use JointApp\JointAppQueryBuilder;
use JointApp\Models\RecordsModel;

class Model_Siteman_Blog_Comments extends RecordsModel
{
    public string $tableName = 'blogComments';

    public function getRecordStructure()
    {

        $this->record = array(
            'comment_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'commentP_id' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'art_id' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'content' => array(
                'format' => 'text',
                'custom' => false,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'addDate' => array(
                'format' => 'datetime',
                'custom' => false,
            ),
        );

    }

    public function listRecords(JointAppQueryBuilder $qBuilder): array
    {
        $qBuilder->select(
            $this->tableName.'.comment_id, '.
            $this->tableName.'.commentP_id, '.
            $this->tableName.'.art_id, '.
            //$this->tableName.'.content, '.
            $this->tableName.'.created_by, '.
            $this->tableName.'.activeFlag, '.
            $this->tableName.'.addDate, '.
            'users_dt.accAlias, '.
            'blogArts.artName_'.$this->userLang.' as artName'
        )
            ->from($this->tableName)
            ->join(
                'inner join users_dt on '.$this->tableName.'.created_by = users_dt.user_id '.
                'inner join blogArts on blogArts.art_id = '.$this->tableName.'.art_id'
            );

        return $this->fetchToArray($qBuilder->buildQuery());
    }

    //cause have having field
    public function countRecords(JointAppQueryBuilder $qBuilder): int
    {
        $qBuilder
            ->select($this->tableName.'.comment_id, '.
                'blogArts.artName_'.$this->userLang.' as artName, '.
                'users_dt.accAlias'
            )
            ->from($this->tableName)
            ->join(
                'inner join users_dt on '.$this->tableName.'.created_by = users_dt.user_id '.
                'inner join blogArts on blogArts.art_id = '.$this->tableName.'.art_id'
            );

        if($res = $this->pdoQuery($qBuilder->buildQuery())){
            return $res->rowCount();
        }

        return 0;
    }
}