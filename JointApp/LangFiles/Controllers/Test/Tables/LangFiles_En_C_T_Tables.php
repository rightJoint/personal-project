<?php
namespace JointApp\LangFiles\Controllers\Test;


use JointApp\LangFiles\Controllers\LangFiles_Ru_Controllers_Record;

class LangFiles_En_C_T_Tables extends LangFiles_Ru_Controllers_Record
{
    const TEST_TBL_TBL = 'Таблица';
    const TEST_RES_FAIL = 'Неудачно';
    const TEST_ACT_ACT = 'Действие';
    const TEST_OPT_OPT = 'Опции';
    const TEST_RUN_TIME = 'Время';

    public function actionName($action):string
    {
        if($action == 'clear'){
            return 'Очистить';
        }elseif ($action == 'download'){
            return 'Загрузить';
        }elseif ($action == 'drop'){
            return 'Удалить';
        }elseif ($action == 'create'){
            return 'Создать';
        }elseif ($action == 'upLoad'){
            return 'Выгрузить';
        }elseif ($action == 'upLoadAll'){
            return 'Выгрузить все';
        }elseif ($action == 'refreshTables'){
            return 'Обновить';
        }
    }
}