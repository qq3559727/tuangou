<?php

namespace app\common\model;

use think\Model;

class Tags extends Model{

    // 多对多
    public function posts(){
        return $this->belongsToMany(Posts::class,'posts_tags','posts_id');
    }
}