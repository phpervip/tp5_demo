<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/25
 * Time: 上午11:52
 */

namespace app\index\model;
use think\Model;

class Book extends Model
{
    protected $type=[
        'publish_time'=>'timestamp:Y-m-d',
    ];

    protected $autoWriteTimestamp = true;

    protected $insert = ['status'=>1];

    public function user(){
        $this->belongsTo('UserA');
    }
}