<?php

namespace Src\LangFiles\Views\JointSite;



class LangFiles_En_Views_JointSite_Menu
{
    public static function getLinks():array
    {
        $links = array(
            'setup' => array(
                'title' => 'Deploy project',
                'text' => 'Setup',
            ),
            'architecture' => array(
                'title' => 'Design of this site',
                'text' => 'Architecture',
            ),
            'setup_os' => array(
                'title' => 'Deploy on OS-panel',
                'text' => 'Open server',
            ),
            'architecture_view' => array(
                'title' => 'View (Screens)',
                'text' => 'View',
            ),
            'architecture_view_tp' => array(
                'title' => 'What the template view is',
                'text' => 'Template view',
            ),
            'architecture_view_web' => array(
                'title' => 'Web page view',
                'text' => 'Web view',
            ),
            'architecture_lc' => array(
                'title' => 'request life circle',
                'text' => 'Request',
            ),
            'architecture_app' => array(
                'title' => 'App & components',
                'text' => 'Application JointSite',
            ),
            'architecture_mvc' => array(
                'title' => 'MVC pattern',
                'text' => 'MVC',
            ),
            'architecture_model' => array(
                'title' => 'App models',
                'text' => 'Model',
            ),
            'controller' => array(
                'title' => 'App controllers',
                'text' => 'Controller',
            ),
            'user' => array(
                'title' => 'App users',
                'text' => 'User',
            ),
            'tests' => array(
                'title' => 'Tests php-unit',
                'text' => 'Tests',
            ),
            'setup_hosting' => array(
                'title' => 'Set up on hosting',
                'text' => 'Hosting set up',
            ),
            'setup_migrations' => array(
                'title' => 'Make migrations',
                'text' => 'Migrations',
            ),
            'directories' => array(
                'title' => 'Main folders of the project',
                'text' => 'Directories',
            ),
            'siteview' => array(
                'title' => 'Site-view',
                'text' => 'What Site view is',
            ),
            'lang' => array(
                'title' => 'web-pages in different languages',
                'text' => 'Lang-files',
            ),
            'JsHome' => array(
                'title' => 'JointSite app',
                'text' => '',
            ),
        );

        return $links;
    }
}