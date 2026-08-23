<?php


namespace JointApp\Controllers\Test;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Test_Log extends RecordsControllerWeb
{
    public string $processUri = '/test/migrations/log';
    public string $list_frame_id = 'migrations_log';

    public function prepareSearchFields(): void
    {
        $this->searchFields=[
            'add_date' => [
                'search' => 0,
                'sort' => 1,
                'sortOrder' => 'DESC',
                'format' => 'datetime',
                'curVal' => null,
            ],
            'migration_log_id' => [
                'search' => 1,
                'sort' => 1,
                'format' => 'varchar',
                'curVal' => '',
            ],
            'migration_name' => [
                'search' => 1,
                'sort' => 1,
                'format' => 'varchar',
                'curVal' => '',
            ],
            'migration_log' => [
                'search' => 0,
                'sort' => 0,
                'format' => 'text',
                'curVal' => '',
            ],
        ];
    }
}