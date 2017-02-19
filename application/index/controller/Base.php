<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/17
 * Time: 下午6:45
 */

namespace app\index\controller;
use app\index\model\User;
use think\Controller;

class Base extends Controller
{
    public function _initialize(){
        $user = User::get(Session::get('user_id'));
        Request::instance()->bind('user',$user);
    }

}