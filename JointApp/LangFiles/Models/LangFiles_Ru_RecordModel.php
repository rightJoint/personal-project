<?php

namespace JointApp\LangFiles\Models;


class LangFiles_Ru_RecordModel extends LangFiles_Ru_ModelPdo
{

    const RM_TBLNAME_ERR = 'Имя таблицы не задано в RecordModel';


    public $updateRecord = array(
        'success' => 'Обновление записи успешно',
        'fail' => 'Обновление записи неудачно',
        'nothing' => 'Ничего не менялось',
    );
    public $insertRecord = array(
        'success' => 'Добавление записи успешно',
        'fail' => 'Добавление записи неудачно',
    );
    public $copyRecord = array(
        'fail' => 'Копирование записи неудачно',
    );
    public $table_name_not_found = 'Имя таблицы не найдено в базе данных (МодельЗапись)';
    public $file_err = array(
        'unlink_err' => 'ошибка при удалении в ModuleRecordsModel.php',
        'mvf_err_extension' => 'невозможно загрузить расширение',
        'mvf_err_load' => 'ошибка при загрузке в ModuleRecordsModel.php',
        'form_h2' => 'основная информация',
    );
}