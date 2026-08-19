<?php

namespace JointApp\Models;

use JointApp\JointSiteLogger;
use JointApp\JointSiteUser;
use Psr\Log;
use JointApp\SettingsDb;


class Model_Pdo extends Model
{
    use Log\LoggerAwareTrait;
    use PdoTrait;

    protected $context = ['Model_Pdo' => __CLASS__];

    function __construct(JointSiteUser &$user, JointSiteLogger &$logger, $model_params = [])
    {
        parent::__construct($user,$logger, $model_params);

        $this->connectDb();

    }
}