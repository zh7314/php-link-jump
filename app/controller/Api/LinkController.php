<?php

namespace app\controller\Api;

use support\Request;

class LinkController
{
    public function index(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok', 'data' => $request->data]);
    }

}
