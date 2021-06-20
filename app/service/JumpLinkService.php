<?php

namespace app\service;

use app\model\JumpLink;
use support\Db;
use app\Lib\LargeDigitalConversion62;
use support\bootstrap\Redis;

class JumpLinkService
{
    public static function getData()
    {
        return JumpLink::whereNotNull('deleted_at')->get();
    }

    public static function addLink(string $url, string $end_time)
    {
        DB::beginTransaction();
        try {
            if (empty($url)) {
                throw new Exception("待跳转URL不能为空");
            }
            if (empty($end_time)) {
                throw new Exception("结束时间为空");
            }
            //不管存不存在，都存储
            $jumpLink = new JumpLink();

            $jumpLink->jump_url = urlencode($url);
            $jumpLink->md5_data = md5($url);

            $jumpLink->duration_count = 1000;
            $jumpLink->save();

            $short_id = LargeDigitalConversion62::from10To62($jumpLink->id);

//            JumpLink::where('id',$jumpLink->id)->update(['short_id'=>$short_id]);
            $jumpLink->short_id = $short_id;
            $jumpLink->save();
            DB::commit();
            //写入缓存

            Redis::setEx($short_id, $jumpLink->duration_count, $jumpLink->jump_url);
            return $short_id;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}