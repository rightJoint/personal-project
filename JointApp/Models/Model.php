<?php

namespace JointApp\Models;


use Psr\Log\LoggerAwareTrait;

class Model
{
    use LoggerAwareTrait;

    private $context = ['model' => __CLASS__];

    protected $langFile;

    public string $userLang = 'ru';

    public function setUpLangFile()
    {
        $this->langFile = new \stdClass();
    }

    public function getData()
    {

    }
}