<?php

namespace app\middleware;

use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;

//api访问计数器
class ApiCounter implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $request->data = 'some value';

        return $next($request);
    }
}