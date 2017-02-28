<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/26
 * Time: 上午11:41
 */

namespace app\api\model;
use think\model;


class Profile extends Model
{
    protected $type = [
        'birthday'=>'timestamp:Y-m-d',
    ];

}