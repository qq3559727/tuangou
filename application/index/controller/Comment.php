<?php

namespace app\index\controller;

use think\Controller;
// use think\Request;
use app\common\model\Comment as commentModel;

class Comment extends Controller{

    public function save($id){

        $content = input('content');
        ! $content && $this->error('评论不能为空！');
        $data = [
            'post_id'=>$id,
            'content'=>$content,
        ];
        if(commentModel::create($data)===false){
            $this->error('发布失败，请稍后重试！');
        }
        $this->success('发布成功，请等待审核!');

    }
}