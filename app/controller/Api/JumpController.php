<?php

namespace app\controller\Api;

use support\Request;
use app\service\JumpLinkService;

//url跳转功能
class JumpController
{
    public function doJump(Request $request, string $id)
    {
        return json(['code' => 0, 'msg' => $id]);
    }

    public function getData(Request $request)
    {
        $data = JumpLinkService::getData();
        return json(['code' => 0, 'data' => $data]);
    }

}
