<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Users;
use app\auto\Auto;

class User extends Controller{

    public function index(Auto $auto){

        ! $auto->check() && $this->redirect('/admin/login');

        return view('');
    }
    public function save(Auto $auto,Request $request){

        $pwd = $request->post('pwd');
        ! $pwd && $this->error('请填写完整信息！');

        ! Users::where('id',$auto->id())->update(['pwd'=>md5($pwd)]) && $this->error('操作失败，请稍后重试！');
        
        $auto->logout();

        $this->success('操作成功！');
    }
}