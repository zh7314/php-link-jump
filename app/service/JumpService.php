<?php

namespace app\service;

use app\model\JumpLink;

class JumpService
{
    public static function getLinkData(string $id)
    {
        if (empty($id)) {
            throw new Exception("查询数据不能为空");
        }

        $jumpLink = JumpLink::where('short_id', $id)->whereNotNull('deleted_at')->get();
        if ($jumpLink == null) {
            throw new Exception("url不存在");
        }
        if (empty($jumpLink->jump_url)) {
            throw new Exception("url不存在");
        }
        return $jumpLink->jump_url;
    }
}