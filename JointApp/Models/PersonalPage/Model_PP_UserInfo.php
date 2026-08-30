<?php

namespace JointApp\Models\PersonalPage;


use JointApp\Models\RecordsModel;
use JointApp\SettingsEnv;

class Model_PP_UserInfo extends RecordsModel
{
    public string $tableName = 'users';

    public function getRecordStructure()
    {
        $this->record = [
            'user_id' => Array
            (
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),

            'login' => Array
            (
                'format' => 'varchar',
                'custom' => false,
            ),

            'alias' => Array
            (
                'format' => 'varchar',
                'custom' => false,
            ),

            'pw_hash' => Array
            (
                'format' => 'varchar',
                'custom' => false,
            ),

            'regDate' => Array
            (
                'format' => 'datetime',
                'custom' => false,
            ),

            'avatar' => Array
            (
                'format' => 'varchar',
                'custom' =>false,
                'file_options' => [
                    'accept' => '.jpg, .jpeg, .bmp, .git, .png',
                    'load_dir' => SettingsEnv::USER_AVATARS_DIR,
                    //'replaces' => ['avatar'],
                ],
            ),

            'birthDay' => Array
            (
                'format' => 'date',
                'custom' => false,
            ),

            'blackList' => Array
            (
                'format' => 'tinyint',
                'custom' =>false,
            ),

            'followed_by' => Array
            (
                'format' => 'varchar',
                'custom' => false,
            ),

            'pref_lang' => Array
            (
                'format' => 'varchar',
                'custom' =>false,
            ),
        ];
    }
}