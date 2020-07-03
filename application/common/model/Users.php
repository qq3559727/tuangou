<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Users extends Model{

    use SoftDelete;

    // 指定表名
    // protected $table = 'user';
    // 指定表主键字段名
    // protected $pk = 'uid';

    protected $autoWriteTimestamp = true;

    public function setPwdAttr($v){
        return md5($v);
    }

    
}