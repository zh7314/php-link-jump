<?php

namespace app\controller\Api;

use support\Request;
use app\service\JumpService;
use support\bootstrap\Redis;
use Exception;

//url跳转功能
class JumpController
{
    public function doJump(Request $request, string $id)
    {
        try {

            if (empty($id)) {
                throw new Exception("查询数据不能为空");
            }

            $data = Redis::get($id);
//            print_r(urldecode($data));
            if(empty($data)){
                throw new Exception("url已不存在");
            }

          return  redirect(urldecode($data));

        } catch (Exception $e) {
            return json(['code' => 400, 'msg' => $e->getMessage()]);
        }

    }


}
