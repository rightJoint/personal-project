<?php


namespace JointApp\LangFiles\Views\PersonalPage\Home;


class LangFiles_En_Views_PP_Menu
{
    public static function getLinks():array
    {
        return [
            'info' => [
                'title' => 'Info',
                'text' => 'Info',
            ],
            'edit' => [
                'title' => 'Edit profile',
                'text' => 'Edit',
            ],
            'changepassword' => [
                'title' => 'Change password',
                'text' => 'Password',
            ],
        ];
    }
}