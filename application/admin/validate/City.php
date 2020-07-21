<?php

namespace app\admin\validate;
use think\Validate;

class City extends Validate{

    protected $rule = [

        ['name','require|max:20','城市中文名称不能为空|城市中文名称不能超过20个字符'],
        ['uname','require|max:10','城市英文名称不能为空|城市英文名称不能超过10个字符'],
        ['parent_id','number','子类ID必须为数字'],
        ['status','number|in:-1,0,1','状态必须为数字|状态范围不合法'],
        ['listorder','number','排序必须为数字'],
        ['id','number','ID必须为数字'],
    ];

    protected $scene = [

        'add' => ['name','uname','parent_id'],
        'listorder'=>['id','listorder'],
        'status'=>['id','status'],
        'update'=>['id','name','uname','status','parent_id'],
        'del'=>['id'],
    ];
}


