<?php

namespace app\controller\Admin;

use app\service\JumpLinkService;
use support\bootstrap\Redis;
use support\Request;
use Exception;

class JumpLinkManageController
{

    public function test(Request $request)
    {
        $key = 'test_key';
        Redis::set($key, rand());
        return response(Redis::get($key));
    }

    public function getData(Request $request)
    {
        $data = JumpLinkService::getData();
        return json(['code' => 0, 'data' => $data]);
    }

    public function addLink(Request $request)
    {
        try {

//            print_r($request->all());
            if (empty($request->input('jump_url'))) {
                throw new Exception("待跳转URL不能为空");
            }
            if (empty($request->input('end_time'))) {
                throw new Exception("结束时间为空");
            }

            $array = get_headers($request->input('jump_url'));

            if (!preg_match('/200/', $array[0])) {
                throw new Exception("无效URL");
            }
            $url = JumpLinkService::addLink($request->input('jump_url'), $request->input('end_time'));

            return json(['code' => 200, 'msg' => '转换成功', 'data' => urldecode($url)]);
        } catch (Exception $e) {
            return json(['code' => 400, 'msg' => $e->getMessage()]);
        }

        $data = JumpLinkService::getData();
        return json(['code' => 0, 'data' => $data]);
    }

}
