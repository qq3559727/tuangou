<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;
use app\common\model\Settings;

class Posts extends Model{

    use SoftDelete;
    protected $autoWriteTimestamp = true;

    // 一对多
    public function comment(){
        return $this->hasMany(Comment::class,'post_id');
    }
    // 多对多
    public function tags(){
        return $this->belongsToMany(Tags::class,'posts_tags','tag_id');
    }
    // 返回帖子标签
    public function hasTag($id){

        return $this->tags()->where('pivot.tag_id',$id)->find();
    }
    // 返回通过的评论
    public function getShowComment(){

        return $this->comment()->where('status',9)->select();
    }
    
}