<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\City as CityModel;
/**
 * City class
 * 城市管理
 * @Author QZW 3559727@qq.com
 * @DateTime 2020-07-21
 */
class City extends Controller
{

    /**
     * index function
     * 城市列表首页
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function index(){

        $data = CityModel::where('parent_id=0')->where('status<>-1')->order('listorder DESC')->paginate(10);
        return view('',compact('data'));
    }
    /**
     * add function
     * 城市添加页面
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function add(){

        $res = CityModel::where('parent_id=0')->where('status=1')->order('id DESC')->select();
        return view('',compact('res'));
    }
    /**
     * save function
     * 城市添加
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function save(){

        $validate = validate('City');
        !$validate->scene('add')->check(input('')) && $this->error($validate->getError());

        $res = CityModel::create(input(''));
        if($res===false){
            $this->error('添加失败！');
        }else{
            $this->success('添加成功！');
        }
    }
    /**
     * parent_id function
     * 城市子类列表
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function parent_id(){

        $data = CityModel::where('parent_id','=',input('parent_id/d'))->where('status<>-1')->order('listorder DESC')->paginate(10);
        return view('index',compact('data'));
    }
    /**
     * status function
     * ajax 城市状态修改
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function status(){

        $data = input('');
        if($data['status']==0){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        $validate = validate('City');
        !$validate->scene('status')->check($data) && $this->error($validate->getError);
        $res = CityModel::update($data);
        if($res===false){
            $this->error('状态修改失败！');
        }else{
            $this->success('状态修改成功！');
        }
    }
    /**
     * listorder function
     * ajax 城市列表排序
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function listorder(){

        $validate = validate('City');
        !$validate->scene('listorder')->check(input('')) && $this->error($validate->getError());
        $res = CityModel::update(input(''));
        if($res===false){
            $this->error('排序修改失败！');
        }else{
            $this->success('排序修改成功！');
        }
    }
    /**
     * del function
     * 城市删除
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function del(){

        $data = input('');
        $validate = validate('City');
        !$validate->scene('del')->check($data) && $this->error($validate->getError());
        $sr = CityModel::where('parent_id','=',input('id/d'))->where('parent_id<>0')->where('status<>-1')->select();
        if(empty($sr)){
            $data['status'] = -1;
            $res = CityModel::update($data);
            if($res===false){
                $this->error('删除失败！');
            }else{
                $this->success('删除成功！');
            }
        }else{
            $this->error('包含子类，删除失败！');
        }
        
    }
    /**
     * edit function
     * 城市修改页面
     * @Author QZW 3559727@qq.com
     * @DateTime 2020-07-21
     * @return void
     */
    public function edit(){

        $validate = validate('City');
        !$validate->scene('del')->check(input('')) && $this->error($validate->getError());
        $edit = CityModel::get(input('id/d'));
        $data = CityModel::where('parent_id=0')->where('status=1')->where('id','<>',input('id/d'))->order('id DESC')->select();
        return view('',compact('data','edit'));
    }

    public function update(){

        $validate = validate('City');
        !$validate->scene('update')->check(input('')) && $this->error($validate->getError());
        $res = CityModel::update(input(''));
        if($res===false){
            $this->error('城市修改失败！');
        }else{
            $this->success('城市修改成功！');
        }
    }












}