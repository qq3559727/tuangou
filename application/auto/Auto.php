<?php

namespace app\auto;

use app\common\model\Users;

class Auto{

    protected $user = null;
    const SESSION_KEY_NAME = 'user_id';

    // 获取登陆数据，查询存储user对象
    public function login($loginData){

        $user = Users::where($loginData)->find();
        if(is_null($user)){
            return false;
        }
        $this->user = $user;
        // 生成凭证
        $this->getSessionUser();
        return true;

    }
    // ID
    public function id(){
        return session(self::SESSION_KEY_NAME);
    }
    // 存储session，生成凭证
    public function getSessionUser(){
        session(self::SESSION_KEY_NAME,$this->user->id);
    }
    // 登出
    public function logout(){
        session(self::SESSION_KEY_NAME,null);
    }
    // 获取当前登陆用户信息
    public function user(){
        return $this->user;
    }
    // 登陆检测
    public function check(){
        if(is_null(session(self::SESSION_KEY_NAME))){
            return false;
        }
        // user信息重置
        if(is_null($this->user)){
            $user = Users::find(session(self::SESSION_KEY_NAME));
            $this->user = $user;
        }
        return $this->user;
    }
}