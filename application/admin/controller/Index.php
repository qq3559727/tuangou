<?php

namespace app\admin\controller;

use think\Controller;
use app\auto\Auto;
use app\common\model\Posts;
use app\common\model\Comment;
use app\common\model\Tags;

class Index extends Controller{

    public function index(Auto $auto){

        if(!$auto->check()){
            $this->redirect('/admin/login');
        }

        $data = [
            'postscount'=>Posts::count(),
            'commentcount'=>Comment::count(),
            'tagscount'=>Tags::count()
        ];

        return view('',$data);
    }
}