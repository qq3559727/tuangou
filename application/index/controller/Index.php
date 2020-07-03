<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\model\Posts;
use app\common\model\Comment;

class Index extends Controller{

    public function index(){

        $posts = Posts::order('create_time','desc')->paginate(6);
        return view('',compact('posts'));
    }
    public function show($id){

        ! $id && $this->error('訪問錯誤！');
        $posts = Posts::get($id);
        return view('',compact('posts'));
    }
 
}