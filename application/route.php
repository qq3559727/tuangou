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
// 分类
route::get('/admin/category','admin/category/index');
route::get('/admin/category/:parent_id','admin/category/parent_id');
route::get('/admin/category/add','admin/category/add');
route::post('/admin/category','admin/category/save');
route::post('/admin/category/status','admin/category/status');
route::post('/admin/category/listorder','admin/category/listorder');
route::get('/admin/category/del/:id','admin/category/del');
route::get('/admin/category/edit/:id','admin/category/edit');
route::post('/admin/category/edit','admin/category/update');
// 城市
route::get('/admin/city','admin/city/index');
route::get('/admin/city/add','admin/city/add');
route::post('/admin/city/add','admin/city/save');
route::get('/admin/city/parent_id/:parent_id','admin/city/parent_id');
route::post('/admin/city/status','admin/city/status');
route::post('/admin/city/listorder','admin/city/listorder');
route::get('/admin/city/del/:id','admin/city/del');
route::get('/admin/city/edit/:id','admin/city/edit');
route::post('/admin/city/edit','admin/city/update');

