<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Category as CategoryModel;
/**
 * Category class
 * 生活服务分类
 * @Author QZW 3559727@qq.com
 * @DateTime 2020-07-09
 */
class Category extends Controller
{

    /**
     * index function
     * 分类列表首页
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-09
     * @return void
     */
    public function index(){

        $data = CategoryModel::where("parent_id=0")->where('status<>-1')->order('listorder desc')->paginate(10);
        return view('',compact('data'));
    }

    /**
     * parent_id function
     * 子类列表
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-10
     * @param integer $parent_id
     * @return void
     */
    public function parent_id($parent_id=0){

        $data = CategoryModel::where("parent_id=$parent_id")->where('status<>-1')->order('id desc')->paginate(10);
        return view('index',compact('data'));
    }

    /**
     * add function
     * 新增分类
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-09
     * @return void
     */
    public function add(){

        $data = CategoryModel::where('parent_id=0')->where('status=1')->order('id desc')->select();
        return view('',compact('data'));
    }

    /**
     * save function
     * 保存、入库
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-09
     * @return void
     */
    public function save(){

        $validate = validate('category');
        !$validate->scene('add')->check(input('')) && $this->error($validate->getError());

        if(!CategoryModel::create(input(''))){
            $this->error('添加失败！');
        }
        $this->success('添加成功！');
        // dump(input(''));

    }

    /**
     * status function
     * 分类状态 ajax
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-10
     * @return void
     */
    public function status(){

        $data = input('');
        if($data['status']==0){
            $data['status'] = 1;
        }else{
            $data['status']=0;
        }
        $res = CategoryModel::update($data);
        if($res===false){
            $this->error('操作失败！');
        }else{
            $this->success('操作成功！');
        }
    }

    /**
     * listorder function
     * 分类排序 ajax
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-10
     * @return void
     */
    public function listorder(){

        $validate = validate('category');
        !$validate->scene('listorder')->check(input('')) && $this->error($validate->getError());

        $res = CategoryModel::update(input(''));
        if($res===false){
            $this->error('操作失败！');
        }else{
            $this->success('操作成功！');
        }
    }

    public function del(){

        $data = input('');
        $r = CategoryModel::where('parent_id','=',$data['id'])->where('parent_id<>0')->where('status<>-1')->select();
        if(empty($r)){
            dump($r);
            $data['status'] = -1;
            $res = CategoryModel::update($data);
            if($res===false){
                $this->error('删除失败！');
            }else{
                $this->success('删除成功！');
            }
        }else{
            $this->error('包含子类，删除失败！');
        }
        
    }
}