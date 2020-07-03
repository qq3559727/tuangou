<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\auto\Auto;
use app\common\model\Posts;
use app\common\model\Tags;


class Post extends Controller{

    public function index(){

       
        $posts = new Posts;
        $post = $posts->order('id','desc')->paginate(10);
        // 结果集返回对象
        return view('',['posts'=>$post]);
        // 结果集返回数组
        $post->toarray()['data'];
        // foreach($posts as $p){
        //     echo '-----------------';
        //     dump($p->toarray());
        // }
        // dump($posts->toarray()['data']);
        
        // dump(compact('posts'));
        // return view('',compact('posts'));
        // $tags = Tags::all();
        // dump(compact('tags'));
    }
    public function create(){

        $tags = Tags::all();
        return view('',compact('tags'));

    }
    public function edit($id){

        $post = Posts::find($id);
        ! $post && $this->error('帖子不存在！');
        $tags = Tags::all();
        return view('',compact('tags','post'));

    }
    public function save(Request $request){

        // 接收数组必须添加 /a
        $tags = $request->post('tags/a');
        $title = $request->post('title');
        $content = $request->post('content');
        if($title==''||$content==''){
            $this->error('请输入完整内容！');
        }
        $data = [
            'title'=>$title,
            'content'=>$content
        ];
        $post = new Posts;
        $post->title  = $title;
        $post->content = $content;
        if($post->save()===false){
            $this->error('添加失败，请稍后重试！');
        }
        $tags && $post->tags()->attach($tags);

        $this->success('添加成功！');

    }
    public function update(Request $request,$id){

        $tags = $request->post('tags/a');
        $title = $request->post('title');
        $content = $request->post('content');
        if($title==''||$content==''){
            $this->error('请输入完整数据');
        }
        $post = Posts::find($id);
        ! $post && $this->error('帖子不存在！');

        // 返回所有已关联标签
        $postTags = $post->tags;
        if($postTags){
            // 返回所有已关联标签ID
            $tagIds = array_column($postTags->toarray(),'id');
            // 全部删除
            $post->tags()->detach($tagIds);
        }
        // 如果有选择标签，全部关联
        $tags && $post->tags()->attach($tags);

        $post->title = $title;
        $post->content = $content;
        if($post->save() === false){
            $this->error('保存失败，请稍后重试！');
        }
        $this->success('保存成功！');

    }
    public function delete($id){
        
        $post = new Posts;
        $post = $post->get($id);
        if(!$post){
            $this->error('帖子不存在！');
        }
        // 取消标签关联
        $tags = $post->tags;
        
        if($tags){
            $tagIds = array_column($tags->toarray(),'id');
            $post->tags()->detach($tagIds);
        }

        if(!$post->delete()){
            $this->error('删除失败，请稍后重试！');
        }

        $this->success('删除成功！');

    }
}