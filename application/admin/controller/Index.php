<?php

namespace app\admin\controller;

class Index{

    public function index(){

        $build = include APP_PATH.'build.php';
        \think\Build::run($build);
        // return $build;
        // return APP_PATH.'build.php';
        
    }
}