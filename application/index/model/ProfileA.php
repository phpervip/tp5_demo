<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/25
 * Time: 上午10:51
 */

namespace app\index\model;
use think\Model;


class ProfileA extends Model
{
        protected $autoWriteTimestamp = false;
        protected $type = [
            'birthday'=>'timestamp:Y-m-d'
        ];


        public function user(){
            return $this->belongsTo('User');
        }
}