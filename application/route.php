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

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];

use think\Route as route;

// 前台
route::get('/','index/index/index');
route::get('/buy','index/buy/index');
route::get('/detail','index/detail/index');
route::get('/lists','index/lists/index');
route::get('/login','index/login/index');
route::get('/register','index/register/index');

// 后台
route::get('/admin','admin/index/index');
route::get('/admin/welcome','admin/index/welcome');