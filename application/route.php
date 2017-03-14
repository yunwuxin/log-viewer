<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Log;
use think\Route;

Route::get('/', function () {

    //模拟日志
    $log = function () {
        $types = ['log', 'info', 'alert', 'error', 'debug', 'alert', 'notice', 'sql'];
        shuffle($types);
        $type = array_shift($types);
        Log::record('some message', $type);
    };

    $i = rand(1, 5);
    while ($i > 0) {
        $log();
        $i--;
    }

    return redirect('/log-viewer');
});