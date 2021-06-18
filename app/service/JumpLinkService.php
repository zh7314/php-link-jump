<?php

namespace app\service;

use app\model\JumpLink;

class JumpLinkService
{
    public static function getData()
    {
        return JumpLink::get();
    }
}