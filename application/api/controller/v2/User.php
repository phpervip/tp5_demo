<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/26
 * Time: 上午11:36
 */

namespace app\api\controller\v2;
use app\api\model\User as UserModel;

class User
{
    public function read($id = 0){
        $user = UserModel::get($id,'profile');
        if($user){
            return json($user);
        }else{
            return json(['error'=>'用户不存在'],404);
        }
    }
}