<?php


namespace JointApp\Models\Siteman;


use JointApp\JointAppQueryBuilder;
use JointApp\Models\RecordsModel;
use JointApp\SettingsEnv;


class Model_Siteman_Sitemap extends RecordsModel
{
    public string $tableName = 'siteMap_dt';

    public function getRecordStructure()
    {
        $this->record = array(
            'maploc'=> Array(
                'pri' => 1,
                'format' => 'varchar',
                'custom' => false,
            ),
            'lastmod' => array(
                'format' => 'date',
                'custom' => false,
            ),
            'changefreq' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'priority' => array(
                'format' => 'int',
                'custom' => false,
            ),
            'comment' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'use_flag' => array(
                'format' => 'tinyint',
                'custom' => false,
            ),
            'date_created' => array(
                'format' => 'datetime',
                'custom' => false,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
        );
    }

    public function createSiteMap():void
    {
        $qBuilder = new JointAppQueryBuilder();
        $qBuilder->select(
            $this->tableName.'.maploc, '.
            $this->tableName.'.lastmod, '.
            $this->tableName.'.changefreq, '.
            $this->tableName.'.priority '
        )
        ->from(
            $this->tableName
        )
        ->where(
            $this->tableName.'.use_flag is true'
        )
        ->order(
            $this->tableName.'.maploc'
        );

        $res = $this->fetchToArray($qBuilder->buildQuery());

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
        '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        foreach ($res as $num => $row){
            $xml.= '<url>'.
                '<loc>'.
                SettingsEnv::SITE_NAME.$row['maploc'].
                '</loc>';
            if($row['lastmod']){
                $xml.= '<lastmod>'.
                    $row['lastmod'].
                    '</lastmod>';
            }
            if($row['changefreq']){
                $xml.= '<changefreq>'.
                    $row['changefreq'].
                    '</changefreq>';
            }
            if($row['priority']){
                $xml.= '<priority>'.
                    ($row['priority']/10).
                    '</priority>';
            }
            $xml.= '</url>'."\n";
        }

        $xml.='</urlset>';

        file_put_contents(SettingsEnv::DOC_ROOT.'/sitemap.xml', $xml);
    }
}