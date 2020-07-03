<?php

namespace app\common\model;

use think\Model;

class Settings extends Model{

    public function get_setting_value($name){

        $res = $this->where('c_name',$name)->find();
        return $res ? $res['c_value']:'';
    }
    public function set_setting($name,$value){

        $res = $this->where('c_name',$name)->find();
        if(!$res){
            return;
        }
        $res->c_value = $value;
        $res->save();
    }
}