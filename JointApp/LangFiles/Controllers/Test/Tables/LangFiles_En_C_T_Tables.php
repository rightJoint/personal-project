<?php
namespace JointApp\LangFiles\Controllers\Test\Tables;


use JointApp\LangFiles\Controllers\LangFiles_En_Controllers_Record;

class LangFiles_En_C_T_Tables extends LangFiles_En_Controllers_Record
{
    const TEST_TBL_TBL = 'Table';
    const TEST_RES_FAIL = 'Fail';
    const TEST_ACT_ACT = 'Action';
    const TEST_OPT_OPT = 'Options';
    const TEST_RUN_TIME = 'Time';

    public function actionName($action):string
    {
        if($action == 'clear'){
            return 'Clear';
        }elseif ($action == 'download'){
            return 'Download';
        }elseif ($action == 'drop'){
            return 'Drop';
        }elseif ($action == 'create'){
            return 'Create';
        }elseif ($action == 'upLoad'){
            return 'UpLoad';
        }elseif ($action == 'upLoadAll'){
            return 'Upload all';
        }elseif ($action == 'refreshTables'){
            return 'Refresh';
        }
    }
}