<?php

namespace app\admin\controller;

class Index{

    public function index(){

        return view('');
        
    }
    public function welcome(){
        return '欢迎来到团购商城后台主页面';
    }
}