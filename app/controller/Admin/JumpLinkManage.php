<?php

namespace app\controller\Admin;

use support\Request;

class JumpLinkManage
{
    public function index(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

}
