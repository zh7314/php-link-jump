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

return [
    support\bootstrap\Container::class,
    support\bootstrap\Session::class,
    support\bootstrap\db\Laravel::class,
    support\bootstrap\Redis::class,
    support\bootstrap\Log::class,
    support\bootstrap\Translation::class,
    support\bootstrap\db\Heartbeat::class,
];
