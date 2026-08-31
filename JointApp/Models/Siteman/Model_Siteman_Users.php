<?php


namespace JointApp\Models\Siteman;


use JointApp\JointAppQueryBuilder;
use JointApp\Models\RecordsModel;


class Model_Siteman_Users extends RecordsModel
{
    public string $tableName = 'users';

    public function getRecordStructure()
    {
        $this->record = array(
            'user_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'login' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'alias' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'pw_hash' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'regDate' => array(
                'format' => 'datetime',
                'custom' => false,
            ),
            'avatar' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'birthDay' => array(
                'format' => 'date',
                'custom' => false,
            ),
            'blackList' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'followed_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'pref_lang' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
        );
    }

    public function listRecords(JointAppQueryBuilder $qBuilder): array
    {

        $qBuilder->select = 'users.user_id, users.login, users.alias, users.pw_hash, '.
            'users.regDate, users.avatar, '.
            'users.birthDay, users.blackList, '.
            'users.followed_by, users.pref_lang';

        $qBuilder
            ->from($this->tableName);

        return $this->fetchToArray($qBuilder->buildQuery());
    }
}