<?php


namespace JointApp\LangFiles\Views\PersonalPage\Home;


class LangFiles_Ru_Views_PP_Menu
{
    public static function getLinks():array
    {
        return [
            'info' => [
                'title' => 'Информация',
                'text' => 'Информация',
            ],
            'edit' => [
                'title' => 'Редактировать профиль',
                'text' => 'Редактировать',
            ],
            'changepassword' => [
                'title' => 'Сменить пароль',
                'text' => 'Пароль',
            ],
        ];
    }
}