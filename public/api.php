<?php

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

//入口文件绑定指定模块
define('BIND_MODULE','api/index');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
