<?php

namespace app\middleware;

use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;
use app\model\ApiLog;

//api访问计数器
class ApiCounter implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {

        $apiLog = new ApiLog();
        $apiLog->method = $request->method();
        $apiLog->request_ip = json_encode([$request->getRealIp(), $request->getRemoteIp()]);
        $apiLog->request_url = $request->path();
        $apiLog->query_params = json_encode([$request->all(), $request->rawBody()]);
        $apiLog->exec_time = date('Y-m-d H:i:s');

        $response = $next($request);
        $apiLog->response_data = empty($response->rawBody()) ? json_encode([$response->getStatusCode(), $response->getHeaders()]) : $response->rawBody();

        $apiLog->response_time = date('Y-m-d H:i:s');
        $apiLog->save();

        return $response;
    }
}