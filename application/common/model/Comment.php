<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Comment extends Model{

    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    // 一对多
    public function posts(){
        return $this->belongsTo(Posts::class,'post_id');
    }

    // 审核判断
    public function statusText(){

        $t = '';
        if($this->status == 1){
            $t = '拒绝';
        }else if($this->status == 9){
            $t = '通过';
        }else if($this->status == -1){
            $t = '等待';
        }
        return $t;
    }
    
}