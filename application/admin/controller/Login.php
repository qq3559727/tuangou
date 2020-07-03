<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Users;
use app\auto\Auto;
class Login extends Controller{

    public function index(){

        // $data = [
        //     'username'=>'admin',
        //     'pwd'=>'3559727'
        // ];
        // $res = Users::create($data);
        // dump($res);


        return view('');
    }

    // 登陆验证
    public function postLogin(Auto $auto){

        $username = $_POST['username'];
        $password = $_POST['pwd'];

        if($username=='' || $password==''){
            $this->error('请填写用户名和密码');
        }
        
        $password = md5($password);

        $loginData = [
            'username'=>$username,
            'pwd'=>$password
        ];
        if(!$auto->login($loginData)){
            $this->error('用户名密码错误');
        }

        $this->redirect('/admin');
    }
    // 退出登陆
    public function logout(Auto $auto){
        $auto->logout();
        $this->redirect('/admin/login');
    }
}