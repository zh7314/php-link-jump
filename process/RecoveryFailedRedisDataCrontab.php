<?php
namespace process;

use Workerman\Crontab\Crontab;
use app\service\JumpService;

class RecoveryFailedRedisDataCrontab
{
    public function onWorkerStart()
    {
        // 每分钟的第一秒执行
        new Crontab('1 * * * * *', function(){
            JumpService::RecoveryFailedRedisData();
        });

    }
}