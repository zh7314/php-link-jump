<?php

namespace app\controller\Admin;

use app\service\JumpLinkService;
use app\service\JumpService;
use support\Request;
use Exception;
use \app\controller\Admin\BaseController;

class JumpLinkManageController extends BaseController
{
    public function getData(Request $request)
    {
        $data = JumpLinkService::getData();
        return json(['code' => self::SUCCESS, 'data' => $data]);
    }

    public function addLink(Request $request)
    {
        try {
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

            return json(['code' => self::SUCCESS, 'msg' => '转换成功', 'data' => urldecode($url)]);
        } catch (Exception $e) {
            return json(['code' => self::FAIL, 'msg' => $e->getMessage()]);
        }
    }

//    public function test(Request $request)
//{
//    JumpService::RecoveryFailedRedisData();
//}

}
