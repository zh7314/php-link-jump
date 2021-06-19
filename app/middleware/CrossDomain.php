<?php

namespace app\middleware;

use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;

//跨域
class CrossDomain implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
//        $response = $request->method() == 'OPTIONS' ? response('') : $next($request);
//        $response->withHeaders([
//            'Access-Control-Allow-Origin' => '*',
//            'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
//            'Access-Control-Allow-Headers' => 'Content-Type,Authorization,X-Requested-With,Accept,Origin'
//        ]);

        if (php_sapi_name() !== 'cli') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
            header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With');
        }
        return $next($request);
    }
}