<?php

namespace JointApp\Models\Migrations;



use JointApp\Models\RecordsModel;

class Model_MigrationsLog extends RecordsModel
{
    public string $tableName = "migrations_log";

    function getRecordStructure()
    {
        $this->record = Array
        (
            "migration_log_id" => Array
            (
                "pri" => 1,
                "format" => "varchar",
                'custom' => false,
            ),
            "migration_name" => Array
            (
                "format" => "varchar",
                'custom' => false,
            ),

            "add_date" => Array
            (
                "format" => "datetime",
                'custom' => false,
            ),

            "migration_log" => Array
            (
                "format" => "text",
                'custom' => false,
            ),
        );
    }
}