<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/3/5
 * Time: 上午10:00
 */

namespace app\index\model;
use think\Model;

class Blog extends Model
{
    protected $autoWriteTimestamp = true;
    protected $insert = [
        'status'=>1,
    ];
    protected $field = [
        'id'=>'int',
        'create_time'=>'int',
        'update_time'=>'int',
        'name','title','content',
    ];
}