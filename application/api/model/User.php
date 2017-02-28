<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/26
 * Time: 上午11:40
 */

namespace app\api\model;
use think\model;


class User extends Model
{
    public function profile(){
        return $this->hasOne('Profile');
    }
}