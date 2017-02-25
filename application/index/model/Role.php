<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/25
 * Time: 下午2:54
 */

namespace app\index\model;
use think\Model;

class Role extends Model
{
    protected $autoWriteTimestamp = false;
    public function user(){
        return $this->belongsToMany('UserA','think_access','user_id','role_id');
    }

}