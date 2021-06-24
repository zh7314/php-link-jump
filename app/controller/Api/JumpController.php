<?php

namespace app\controller\Api;

use support\Request;
use support\bootstrap\Redis;
use Exception;
use \app\controller\Api\BaseController;

//url跳转功能
class JumpController extends BaseController
{
    public function doJump(Request $request, string $id)
    {
        try {
            if (empty($id)) {
                throw new Exception("url已不存在");
            }
            $data = Redis::get($id);
            if (empty($data)) {
                throw new Exception("url已不存在");
            }

            return redirect(urldecode($data));
        } catch (Exception $e) {
            return json(['code' => self::FAIL, 'msg' => $e->getMessage()]);
        }
    }
}
