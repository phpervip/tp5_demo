<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/25
 * Time: 上午10:51
 */

namespace app\index\model;
use think\Model;

class UserA extends Model
{
    protected $autoWriteTimestamp = true;
    protected $insert = ['status'=>1];

    public function profile(){
        return $this->hasOne('ProfileA','user_id','id',['user'=>'member','profile'=>'info']);
    }

    public function books(){
        return $this->hasMany('Book','user_id','id');
    }

    public function roles(){
        return $this->belongsToMany('Role','think_access','role_id','user_id');
    }
}