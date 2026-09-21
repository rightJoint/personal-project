<?php


namespace Src\Controllers\Blog;


use JointApp\Controllers\Records\RecordsControllerWeb;

class Controller_Siteman_Blog extends RecordsControllerWeb
{
    public string $list_frame_id = 'blogArts';

    public string $processUri = '/siteman/blog';

    const ART_COVERS = '/userdata/blog/covers';

    public function prepareEditFields(): void
    {
        $this->editFields = array(
            'art_id' => array(
                'pri' => 1,
                'format' => 'varchar',
                'curVal' => '',
            ),
            'artCat' => array(
                'format' => 'select',
                'filling' => $this->fillCatsList(),
                'curVal' => '',
            ),
            'artRef' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'artName_en' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'artName_ru' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'artMeta_en' => array(
                'format' => 'text',
                'curVal' => '',
                'style' => array(
                    'class' => 'wd100',
                ),
            ),
            'artMeta_ru' => array(
                'format' => 'text',
                'curVal' => '',
                'style' => array(
                    'class' => 'wd100',
                ),
            ),
            'artImg' => array(
                'format' => 'file',
                'file_options' => array(
                    "load_dir" => self::ART_COVERS,
                    'file_type' => 'img',
                    'accept' => '.jpg, .jpeg, .bmp, .git, .png',
                    'button' => true,
                ),
                'with_name' => 'GUID',
                'curVal' => '',
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
            'indexFlag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
            'popFlag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
            'pubDate' => array(
                'format' => 'date',
                'curVal' => '',
            ),
            'refreshDate' => array(
                'format' => 'date',
                'curVal' => '',
            ),
            'created_by' => array(
                'format' => 'varchar',
                'curVal' => '',
            ),
            'commentsFlag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
            'adultFlag' => array(
                'format' => 'tinyint',
                'curVal' => '',
            ),
        );
    }

    public function prepareSearchFields(): void
    {
        $this->searchFields = array(
            'pubDate' => array(
                'format' => 'date',
                'sort' => 1,
                'sortOrder' => 'DESC',
                'curVal' => null,
            ),
            'art_id' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artCat' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artRef' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artName_en' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artName_ru' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artMeta_en' => array(
                'format' => 'text',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artMeta_ru' => array(
                'format' => 'text',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'artImg' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'indexFlag' => array(
                'format' => 'tinyint',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'popFlag' => array(
                'format' => 'tinyint',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'created_by' => array(
                'format' => 'varchar',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'commentsFlag' => array(
                'format' => 'tinyint',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
            'adultFlag' => array(
                'format' => 'tinyint',
                'search' => 1,
                'sort' => 1,
                'curVal' => null,
            ),
        );
    }

    public function prepareListFields(): void
    {
        $this->listFields = array(
            'btnDetail' => array(
                'replaces' => ['art_id'],
                'format' => 'link',
                'url' => 'art_id=art_id',
            ),
            'btnEdit' => array(
                'replaces' => ['art_id'],
                'format' => 'link',
                'url' => 'art_id=art_id',
            ),
            'btnDelete' => array(
                'replaces' => ['art_id'],
                'format' => 'link',
                'url' => 'art_id=art_id',
            ),
            'art_id' => array(
                'format' => 'varchar',
            ),
            'catName' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'artCat' => array(
                'format' => 'hidden',
            ),
            'artRef' => array(
                'format' => 'varchar',
            ),
            'artName_en' => array(
                'format' => 'varchar',
                'max_length' => 10,
            ),
            'artName_ru' => array(
                'format' => 'varchar',
                'max_length' => 10,
            ),
            'artMeta_en' => array(
                'format' => 'text',
                'max_length' => 10,
            ),
            'artMeta_ru' => array(
                'format' => 'text',
                'max_length' => 10,
            ),
            'artImg' => array(
                'format' => 'file',
                'file_options' => array(
                    "load_dir" => self::ART_COVERS,
                    "file_type" => "img",
                ),
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
            ),
            'indexFlag' => array(
                'format' => 'tinyint',
            ),
            'popFlag' => array(
                'format' => 'tinyint',
            ),
            'created_by' => array(
                'format' => 'hidden',
            ),
            'alias' => array(
                'format' => 'varchar',
                'custom' => false,
            ),
            'commentsFlag' => array(
                'format' => 'tinyint',
            ),
            'adultFlag' => array(
                'format' => 'tinyint',
            ),
        );
    }

    public function prepareViewFields(): void
    {
        $this->viewFields = array(
            'art_id' => array(
                'format' => 'varchar',
                'readonly' => 1,
                'curVal' => $this->model->record['art_id']['curVal'],
            ),
            'artCat' => array(
                'format' => 'varchar',
                'readonly' => 1,
                'curVal' => $this->model->record['artCat']['curVal'],
            ),
            'artRef' => array(
                'format' => 'varchar',
                'readonly' => 1,
                'curVal' => $this->model->record['artRef']['curVal'],
            ),
            'artName_en' => array(
                'format' => 'varchar',
                'readonly' => 1,
                'curVal' => $this->model->record['artName_en']['curVal'],
            ),
            'artName_ru' => array(
                'format' => 'varchar',
                'readonly' => 1,
                'curVal' => $this->model->record['artName_ru']['curVal'],
            ),
            'artMeta_en' => array(
                'format' => 'text',
                'readonly' => 1,
                'curVal' => $this->model->record['artMeta_en']['curVal'],
            ),
            'artMeta_ru' => array(
                'format' => 'text',
                'readonly' => 1,
                'curVal' => $this->model->record['artMeta_ru']['curVal'],
            ),
            'artImg' => array(
                'format' => 'file',
                'file_options' => array(
                    "load_dir" => self::ART_COVERS,
                    'file_type' => 'img',
                    'button' => false,
                ),
                'readonly' => 1,
                'curVal' => $this->model->record['artImg']['curVal'],
            ),
            'activeFlag' => array(
                'format' => 'tinyint',
                'readonly' => 1,
                'curVal' => $this->model->record['activeFlag']['curVal'],
            ),
            'indexFlag' => array(
                'format' => 'tinyint',
                'readonly' => 1,
                'curVal' => $this->model->record['indexFlag']['curVal'],
            ),
            'popFlag' => array(
                'format' => 'tinyint',
                'readonly' => 1,
                'curVal' => $this->model->record['popFlag']['curVal'],
            ),
            'pubDate' => array(
                'format' => 'date',
                'readonly' => 1,
                'curVal' => $this->model->record['pubDate']['curVal'],
            ),
            'refreshDate' => array(
                'format' => 'date',
                'readonly' => 1,
                'curVal' => $this->model->record['refreshDate']['curVal'],
            ),
            'created_by' => array(
                'format' => 'varchar',
                'readonly' => 1,
                'curVal' => $this->model->record['created_by']['curVal'],
            ),
            'commentsFlag' => array(
                'format' => 'tinyint',
                'curVal' => $this->model->record['commentsFlag']['curVal'],
            ),
            'adultFlag' => array(
                'format' => 'tinyint',
                'curVal' => $this->model->record['adultFlag']['curVal'],
            )
        );
    }
    public function fillCatsList():array
    {
        $findArts = 'select cat_id, catName_'.$this->userLang.' as catName from blogCats order by catName_'.$this->userLang;
        $return = array(
            '' => '',
        );
        $res = $this->model->pdoQuery($findArts);
        if($res->rowCount() > 0){
            while ($row = $res->fetch(\PDO::FETCH_ASSOC)){
                $return[$row['cat_id']] = $row['catName'];
            }
        }
        return $return;
    }

    public function htmlNewView(): void
    {
        parent::htmlNewView(); // TODO: Change the autogenerated stub
        $this->editFields['created_by']['curVal'] = $this->user->getId();
        $this->editFields['pubDate']['curVal'] = date('Y-m-d');
        $this->editFields['art_id']['format'] = 'hidden';
    }
}