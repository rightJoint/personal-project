<?php

namespace JointApp\Models\PersonalPage;


use JointApp\JointAppQueryBuilder;
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
            'followed_by_name' => Array
            (
                'format' => 'varchar',
                'custom' => true,
            ),
        ];
    }

    public function checkUserAlias(string $alias):bool
    {
        if (preg_match('/^[A-Za-zА-Яа-я]{1}[0-9a-zA-Zа-яА-Я-._]{2,15}$/imsiu', $alias) == 0){
            return false;
        }
        return true;
    }

    protected function copyCustomFields(): bool
    {
        if($this->record['followed_by']['curVal']){
            $qBuilder = new JointAppQueryBuilder();
            $qBuilder->select('alias')->from('users')->where('user_id="'.$this->record['followed_by']['curVal'].'"');
            $res = $this->fetchToArray($qBuilder->buildQuery());
            if(count($res)==1){
                $this->record['followed_by_name']['curVal'] = $res[0]['alias'];
                return true;
            }
        }
        return false;
    }
}