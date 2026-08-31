<?php


namespace Src\Controllers\Blog;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Siteman_Blog extends RecordsControllerWeb
{
    public string $list_frame_id = 'blog';

    public string $processUri = '/siteman/blog';


}