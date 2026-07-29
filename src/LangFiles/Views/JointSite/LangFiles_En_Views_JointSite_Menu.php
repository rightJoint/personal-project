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
        );

        return $links;
    }
}