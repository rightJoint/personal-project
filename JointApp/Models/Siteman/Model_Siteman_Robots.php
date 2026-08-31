<?php


namespace JointApp\Models\Siteman;


use JointApp\JointAppQueryBuilder;
use JointApp\Models\RecordsModel;
use JointApp\SettingsEnv;


class Model_Siteman_Robots extends RecordsModel
{
    public string $tableName = 'robots_dt';

    public function getRecordStructure()
    {
        $this->record = array(
            'disallow'=> Array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'comment' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'use_flag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'date_created' => array(
                'format' => 'datetime',
                'custom' => false,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
        );
    }

    public function createRobotsTxt():void
    {
        $qBuilder = new JointAppQueryBuilder();
        $qBuilder->select(
            $this->tableName.'.disallow'
        )
        ->from(
            $this->tableName
        )
        ->where(
            $this->tableName.'.use_flag is true'
        )
        ->order(
            $this->tableName.'.disallow'
        );

        $res = $this->fetchToArray($qBuilder->buildQuery());

        $text = 'User-agent: *'."\n";

        foreach ($res as $num => $row){
            $text.= 'Disallow: '.$row['disallow']."\n";
        }

        file_put_contents(SettingsEnv::DOC_ROOT.'/robots.txt', $text);
    }
}