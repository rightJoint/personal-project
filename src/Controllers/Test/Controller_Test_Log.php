<?php


namespace Src\Controllers\Test;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Test_Log extends RecordsControllerWeb
{
    public string $processUri = '/test/migrations/log';
    public string $list_frame_id = 'migrations_log';
}