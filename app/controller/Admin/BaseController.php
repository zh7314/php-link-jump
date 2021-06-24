<?php

namespace app\controller\Admin;

use app\service\JumpLinkService;
use support\bootstrap\Redis;
use support\Request;
use Exception;

class BaseController
{
    const SUCCESS = 200;//成功
    const FAIL = 400;//失败
    const GRANT = 401;//需要授权
}
