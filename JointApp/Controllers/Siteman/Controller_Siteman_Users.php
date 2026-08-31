<?php


namespace JointApp\Controllers\Siteman;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Siteman_Users extends RecordsControllerWeb
{
    public string $list_frame_id = 'users';
    public string $processUri = '/siteman/users';

    public function prepareSearchFields(): void
    {
        $this->searchFields = array(
            'user_id' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'login' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'alias' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'regDate' => array(
                'format' => 'datetime',
                'search' => 1,
                'sort' => 1,
            ),
            'birthDay' => array(
                'format' => 'date',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'blackList' => array(
                'format' => 'tinyint',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'followed_by' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'pref_lang' => array(
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
                'replaces' => ['user_id'],
                'format' => 'link',
                'url' => 'user_id=user_id',
            ),
            'btnEdit' => array(
                'replaces' => ['user_id'],
                'format' => 'link',
                'url' => 'user_id=user_id',
            ),
            'btnDelete' => array(
                'replaces' => ['user_id'],
                'format' => 'link',
                'url' => 'user_id=user_id',
            ),
            'user_id' => array(
                'format' => 'varchar',
                'max_length' => 5,
            ),
            'login' => array(
                'format' => 'varchar',
            ),
            'alias' => array(
                'format' => 'varchar',
            ),
            'regDate' => array(
                'format' => 'datetime',
            ),
            'birthDay' => array(
                'format' => 'date',
            ),
            'blackList' => array(
                'format' => 'tinyint',
            ),
            'followed_by' => array(
                'format' => 'varchar',
            ),
            'pref_lang' => array(
                'format' => 'varchar',
            ),
        );
    }

}