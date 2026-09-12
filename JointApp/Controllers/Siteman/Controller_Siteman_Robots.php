<?php


namespace JointApp\Controllers\Siteman;



use JointApp\Controllers\Records\RecordsControllerWeb;
use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;

class Controller_Siteman_Robots extends RecordsControllerWeb
{
    public $fieldAliases = [];

    public function __construct(JointSiteUser $user, JointSiteLogger &$logger, $controller_params = [])
    {
        parent::__construct($user, $logger, $controller_params);
        /*
                $class_Name = 'JointApp\LangFiles\Aliases\SiteMap\LangFiles_'.$this->ucfirstLang($this->userLang).'_Aliases_SiteMap';
                $aliases = new $class_Name();

                $this->fieldAliases = $aliases->fieldAliases;
        */
    }

    public string $list_frame_id = 'robots';

    public string $processUri = '/siteman/robots';

    public function prepareEditFields(): void
    {
        $this->editFields = array(
            'disallow'=> Array(
                'pri' => 1,
                'format' => 'varchar',
                'curVal' => '',
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
                'curVal' => null,
            ),
        );
    }

    public function prepareSearchFields(): void
    {
        $this->searchFields = array(
            'disallow'=> Array(
                'sort' => 1,
                'search' => 1,
                'format' => 'varchar',
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
                'replaces' => ['disallow'],
                'format' => 'link',
                'url' => 'disallow=disallow',
            ),
            'btnEdit' => array(
                'replaces' => ['disallow'],
                'format' => 'link',
                'url' => 'disallow=disallow',
            ),
            'btnDelete' => array(
                'replaces' => ['disallow'],
                'format' => 'link',
                'url' => 'disallow=disallow',
            ),
            'disallow' => array(
                'format' => 'varchar',
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

    public function htmlNewView():void
    {
        parent::htmlNewView();
        $this->editFields['use_flag']['curVal'] = true;
        $this->editFields['date_created']['curVal'] = date('Y-m-d');
        $this->editFields['created_by']['format'] = 'hidden';
        $this->editFields['created_by']['curVal'] = $this->user->getId();
    }

    public function robotsUpdate()
    {
        $this->model->createRobotsTxt();
    }

    protected function checkAccessController(): bool
    {
        return $this->user->isAdmin();
    }
}