<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
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
//     'news/:id'  =>  'admin/index/info',
//     '/admin'    =>'admin/index/index',
//     '/admin/login'    =>'admin/login/index',
// ];

use think\Route;
use app\auto\Auto;


// 前台
Route::get('/','index/index/index');
Route::get('/show/:id','index/index/show');
Route::post('/show/:id','index/comment/save');

Route::get('/admin/login','admin/login/index');
Route::post('/admin/login','admin/login/postLogin');

$auto = new Auto;
if($auto->check()){
    // 后台首页
    Route::get('/admin','admin/index/index');
    // 后台登陆
    Route::get('/admin/logout','admin/login/logout');
    // 标签
    Route::get('/admin/tag','admin/tag/index');
    Route::get('/admin/tag/create','admin/tag/create');
    Route::post('/admin/tag/create','admin/tag/save');
    Route::get('/admin/tag/edit/:id','admin/tag/edit');
    Route::post('/admin/tag/edit/:id','admin/tag/update');
    Route::get('/admin/tag/delete/:id','admin/tag/delete');
    // 帖子
    Route::get('/admin/post','admin/post/index');
    Route::get('/admin/post/create','admin/post/create');
    Route::post('/admin/post/create','admin/post/save');
    Route::get('/admin/post/edit/:id','admin/post/edit');
    Route::post('/admin/post/edit/:id','admin/post/update');
    Route::get('/admin/post/delete/:id','admin/post/delete');
    // 评论
    Route::get('/admin/comment','admin/comment/index');
    Route::get('/admin/comment/delete/:id','admin/comment/delete');
    Route::get('/admin/comment/check/:id','admin/comment/check');
    // 配置
    Route::get('/admin/setting','admin/setting/index');
    Route::post('/admin/setting','admin/setting/save');
    // 修改密码
    Route::get('/admin/user','admin/user/index');
    Route::post('/admin/user','admin/user/save');
}
