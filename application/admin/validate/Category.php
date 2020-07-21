<?php

namespace app\admin\validate;
use think\Validate;

class Category extends Validate{

    // 验证规则
    protected $rule = [
        ['name','require|max:40','分类名称不能为空|分类名称不能超过40个字符'],
        ['parent_id','number','子类ID必须为数字'],
        ['id','number','ID必须为数字'],
        ['status','number|in:-1,0,1','状态必须为数字|状态范围不合法'],
        ['listorder','number','排序必须为数字'],
    ];

    // 场景
    protected $scene = [
        // 注册
        'add'=>['name','parent_id'],
        //更新
        'update'=>['name','id','parent_id','status'],
        // 排序
        'listorder'=>['id','listorder'],
    ];
}