<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Settings;

class Setting extends Controller{

    public function index(){

        // $data = [];
        // $data[] = ['c_name'=>'web_name','c_value'=>'明日之星'];
        // $data[] = ['c_name'=>'web_domain','c_value'=>'drzx.top'];
        // $data[] = ['c_name'=>'seo_keywords','c_value'=>'php,thinkphp'];
        // $data[] = ['c_name'=>'seo_description','c_value'=>'明日之星技术博客'];
        // $data[] = ['c_name'=>'seo_icp','c_value'=>'辽ICP备19010067号'];
        
        // $setting = new Settings;
        // $setting->saveall($data);
        // $setting = Settings::all();
        // return view('',compact('setting'));
        $setting = new Settings;
        return view('',['setting'=>$setting]);
    }
    // 保存配置
    public function save(Request $request){

        $setting = new Settings;
        $data = $request->post();
        foreach($data as $key=>$value){
            $setting->set_setting($key,$value);
        }
        $this->success('操作成功！');
    }
}