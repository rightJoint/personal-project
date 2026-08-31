<?php


namespace JointApp\Controllers\Siteman;



use JointApp\Controllers\Records\RecordsControllerWeb;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;

class Controller_Siteman_Sitemap extends RecordsControllerWeb
{
    public $fieldAliases = [];

    public function __construct(JointSiteUser $user, JointSiteLogger &$logger, $controller_params = [])
    {
        parent::__construct($user, $logger, $controller_params);

        $class_Name = 'JointApp\LangFiles\Aliases\SiteMap\LangFiles_'.$this->ucfirstLang($this->userLang).'_Aliases_SiteMap';
        $aliases = new $class_Name();

        $this->fieldAliases = $aliases->fieldAliases;
    }

    public string $list_frame_id = 'sitemap';

    public string $processUri = '/siteman/sitemap';

    public function prepareEditFields(): void
    {
        $this->editFields = array(
            'maploc'=> Array(
                'pri' => 1,
                'format' => 'varchar',
                'curVal' => '',
            ),
            'lastmod' => array(
                'format' => 'date',
                'curVal' => '',
            ),
            'changefreq' => array(
                'format' => 'select',
                'curVal' => '',
                'filling' => array(
                    'monthly' => 'monthly',
                    'weekly' => 'weekly',
                    'yearly' => 'yearly',
                    'daily' => 'daily',
                    'hourly' => 'hourly',
                    'never' => 'never',
                    'always' => 'always',
                ),
            ),
            'priority' => array(
                'format' => 'select',
                'curVal' => '',
                'filling' => array(
                    5 => '0.5',
                    10 => '1.0',
                    9 => '0.9',
                    8 => '0.8',
                    7 => '0.7',
                    6 => '0.6',
                    4 => '0.4',
                    3 => '0.3',
                    2 => '0.2',
                    1 => '0.1',
                ),
            ),
            'comment' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'use_flag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
            'date_created' => array(
                'format' => 'datetime',
                'curVal' => '',
            ),
            'created_by' => array(
                'format' => 'varchar',
                'curVal' => $this->user->getId(),
            ),
        );
    }

    public function prepareSearchFields(): void
    {
        $this->searchFields = array(
            'maploc'=> Array(
                'sort' => 1,
                'search' => 1,
                'format' => 'varchar',
                'curVal' => null,
            ),
            'lastmod' => array(
                'format' => 'date',
                'sort' => 1,
                'search' => 1,
                'curVal' => null,
            ),
            'changefreq' => array(
                'format' => 'varchar',
                'sort' => 1,
                'search' => 1,
                'curVal' => null,
            ),
            'priority' => array(
                'format' => 'int',
                'sort' => 1,
                'search' => 1,
                'curVal' => null,
            ),
            'comment' => array(
                'format' => 'varchar',
                'sort' => 1,
                'search' => 1,
                'curVal' => null,
            ),
            'use_flag' => array(
                'format' => 'tinyint',
                'sort' => 1,
                'search' => 1,
                'curVal' => null,
            ),
            'date_created' => array(
                'format' => 'datetime',
                'sort' => 1,
                'search' => 1,
                'curVal' => null,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'sort' => 1,
                'search' => 1,
                'curVal' => null,
            ),
        );
    }

    public function prepareListFields(): void
    {
        $this->listFields = array(
            'btnDetail' => array(
                'replaces' => ['maploc'],
                'format' => 'link',
                'url' => 'maploc=maploc',
            ),
            'btnEdit' => array(
                'replaces' => ['maploc'],
                'format' => 'link',
                'url' => 'maploc=maploc',
            ),
            'btnDelete' => array(
                'replaces' => ['maploc'],
                'format' => 'link',
                'url' => 'maploc=maploc',
            ),
            'maploc'=> Array(
                'format' => 'varchar',
            ),
            'lastmod' => array(
                'format' => 'date',
            ),
            'changefreq' => array(
                'format' => 'varchar',
            ),
            'priority' => array(
                'format' => 'int',
            ),
            'comment' => array(
                'format' => 'varchar',
            ),
            'use_flag' => array(
                'format' => 'tinyint',
            ),
            'date_created' => array(
                'format' => 'hidden',
            ),
            'created_by' => array(
                'format' => 'hidden',
            ),
        );
    }

    public function siteMapUpdate()
    {
        $this->model->createSiteMap();
    }
}