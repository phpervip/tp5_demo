<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/17
 * Time: 下午6:49
 */

namespace app\index\controller;
use app\index\controller\Base;
use think\Request;

class index2 extends Base
{
    public function index(Request $request){
        echo $request->user->id;
        echo $request->user->name;
    }

}