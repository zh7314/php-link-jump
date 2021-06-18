<?php

namespace app\controller\Admin;

use support\Request;

class JumpLinkManageController
{
    public function index(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

}
