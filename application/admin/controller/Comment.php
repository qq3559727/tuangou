<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Comment as commentModel;

class Comment extends Controller{

    public function index(){

        // $data = [];
        // for($i=1;$i<100;$i++){
        //     $data[] = [
        //         'post_id'=>14,
        //         'content'=>'3654651321'
        //     ];
        // }
        // $commentModel = new commentModel;
        // $commentModel->saveAll($data);
        $comments = commentModel::order('id','desc')->paginate(15);
        return view('',compact('comments'));
    }
    // 删除
    public function delete($id){

        $comment = commentModel::find($id);
        ! $comment && $this->error('评论不存在！');
        $ct = $comment->delete();
        if($ct===false){
            $this->error('删除失败！');
        }
        $this->success('删除成功！');
    }
    // 审核
    public function check(Request $request, $id){

        $comment = commentModel::find($id);
        ! $comment && $this->error('评论不存在！');

        $status = $request->param('status');
        $comment->status = $status;
        if($comment->save()===false){
            $this->error('操作失败，请稍后重试！');
        }
        $this->success('操作成功！');

    }
}