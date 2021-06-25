<?php

namespace app\service;

use app\model\JumpLink;
use app\service\JumpLinkService;
use support\bootstrap\Log;
use support\bootstrap\Redis;

class JumpService
{
    public static function getLink(string $id)
    {
        if (empty($id)) {
            throw new Exception("查询数据不能为空");
        }

        $jumpLink = JumpLink::where('short_id', $id)->whereNull('deleted_at')->get();
        if ($jumpLink == null) {
            throw new Exception("url不存在");
        }
        if (empty($jumpLink->jump_url)) {
            throw new Exception("url不存在");
        }
        return $jumpLink->jump_url;
    }

    public static function RecoveryFailedRedisData()
    {
        $jumpLink = JumpLink::where('end_time', '>=', date('Y-m-d H:i:s'))->whereNull('deleted_at')->get();

        if ($jumpLink->count() > 0) {
            foreach ($jumpLink as $k => $v) {
                $data = Redis::get(JumpLinkService::$jumpKey . $v->short_id);
                //如果数据不存在就重新刷入redis
                if (empty($data)) {
                    $start = time();
                    $end = strtotime($v->end_time);
                    $count = $end - $start;
                    Redis::setEx(JumpLinkService::$jumpKey . $v->short_id, $count, $v->jump_url);
                }

            }
        }
    }

}