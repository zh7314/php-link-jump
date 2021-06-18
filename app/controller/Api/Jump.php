<?php

namespace app\controller\Api;

use support\Request;

//url跳转功能
class Jump
{
    public function doJump(Request $request, $code)
    {
//        print_r($request->code);
        print_r($code);
        die;
//        return json(['code' => 0, 'msg' => 'ok']);
    }

    public function view(Request $request, $id)
    {
//        print_r($request->code);
        print_r($id);
        die;
//        return json(['code' => 0, 'msg' => 'ok']);
    }

}
