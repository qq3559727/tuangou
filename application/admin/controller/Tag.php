<?php

namespace app\admin\controller;

use app\common\model\Tags;
use think\Controller;
use think\Request;
use app\auto\Auto;

class Tag extends Controller{

    public function index(Auto $auto){

        if(!$auto->check()){
            $this->redirect('/admin/login');
        }
        $tags = Tags::all();
        return view('',compact('tags'));
    }
    public function create(){
        return view('');
    }
    public function save(Request $request){

        $name = $request->post('name','');
        if(!$name){
            $this->error('标签不能为空！');
        }
        if(!Tags::create(['name'=>$name])){
            $this->error('添加失败，请稍后重试！');
        }else{
            $this->success('添加成功！');
        }
    }
    // 标签编辑页面
    public function edit($id){

        $tag = Tags::find($id);
        if(!$tag){
            $this->error('标签不存在');
        }
        return view('',compact('tag'));
    }
    // 修改保存
    public function update(Request $request, $id){
        $name = $request->post('name','');
        if(!$name){
            $this->error('标签不能为空！');
        }
        $tag = Tags::find($id);
        $tag->name = $name;
        if(!$tag->save()){
            $this->error('保存失败，请稍后重试！');
        }
        $this->success('保存成功！');
    }
    public  function delete($id){

        if(!Tags::destroy($id)){
            $this->error('删除失败，请稍后重试！');
        }
        $this->success('删除成功！');
    }
}