<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Webman\Route;

//默认首页
//Route::any('/', function ($request) {
//    return view('index/view', ['name' => 'URL跳转']);
//});

//跳转主业务数据
Route::get('/{id}', [app\controller\Api\JumpController::class, 'doJump'])->middleware([
    app\middleware\CrossDomain::class,
    app\middleware\ApiCounter::class,
]);

Route::group('/api', function () {
    Route::post('/addLink', [app\controller\Admin\JumpLinkManageController::class, 'addLink']);
    Route::post('/getData', [app\controller\Admin\JumpLinkManageController::class, 'getData']);
})->middleware([
    app\middleware\ApiCounter::class,
    app\middleware\CrossDomain::class,
]);


//请求不存在的url返回信息
Route::fallback(function () {
    return json(['code' => 404, 'msg' => '404 not found']);
});
//关闭自动路由
Route::disableDefaultRoute();