<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/21
 * Time: 下午8:46
 */

namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Controller;
use think\Validate;

class User extends Controller
{
    public function index(){
       // $list = UserModel::all();
        /*      $list = UserModel::scope('email,status')->all();

            foreach ($list as $user) {
                 echo $user->nickname . '<br/>';
                 echo $user->email . '<br/>';
                 //echo date('Y/m/d', $user->birthday) . '<br/>';
                 echo $user->birthday . '<br/>';
                 echo '----------------------------------<br/>';
             }
             echo 'index';*/

       /* $list = UserModel::where('id','<',3)->select();
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo date('Y/m/d', $user->birthday) . '<br/>';
            echo '----------------------------------<br/>';
        }*/

   /*     $list = UserModel::scope('email')
                    ->scope('status')
                    ->scope(function ($query) {
                    $query->order('id', 'desc');
                        })
                    ->all();*/

        $list = UserModel::scope('email','thinkphp@qq.com')->all();


        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo $user->birthday . '<br/>';
            echo $user->status . '<br/>';
            echo '-------------------------------------<br/>';
        }

    }

    public function create(){
        return view('user/create');
        echo 'create';
    }

    public function add(){
        $user = new UserModel;

       /* $user->nickname = '流年';
        $user->email = 'thinkphp@qq.com';
        $user->birthday = strtotime('1977-03-05');
        // var_dump($user);
        if($user->save()){
            // var_dump($user->getLastSql());
            return '用户［'.$user->nickname.'］：'.$user->id.'新增成功';
        }else{
            return $user->getError();
        }*/


        // 默认情况下，实例化模型类后执行save操作都是执行的数据库insert操作，
        // 如果你需要实例化执行save执行数据库的update操作，请确保在save方法之前调用isUpdate方法：

        // $user->isUpdate()->save();

/*
        $user['nickname'] = '看云';
        $user['email']    = 'kancloud@qq.com';
        $user['birthday'] = strtotime('2015-04-02');
        if ($result = UserModel::create($user)) {
            return '用户[ ' . $result->nickname . ':' . $result->id . ' ]新增成功';
        } else {
            return '新增出错';
        }*/

/*        if($user->allowField(true)->validate(true)->save(input('post.'))){
            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        }else{
            return $user->getError();
        }*/

    /*    $data = input('post.');
        // 数据验证
        $result = $this->validate($data,'User');
        if(true !== $result){
            return $result;
        }
        $user = new UserModel;
        // 数据保存
        $user->allowField(true)->save($data);
        return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        */

    $data = input('post.');
    // 验证birthday是否有效的日期

        $check = Validate::is($data['birthday'],'date');
        if(false === $check){
            return 'birthday日期格式非法';
        }

        $user = new UserModel;
        // 数据保存
        $user->save($data);
        return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';



    }

    public function addList(){
        $user = new UserModel;
        $list = [
            ['nickname' => '张三', 'email' => 'zhanghsan@qq.com', 'birthday' => strtotime('1988-01-15')],
            ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-09-19')],
        ];

        //dump($list);

        if ($user->saveAll($list)) {
            // var_dump($user->getLastSql());exit;
            return '用户批量新增成功';
        } else {
            return $user->getError();
        }
        echo 'addList';
    }

    public function update($id){

        $user           = UserModel::get($id);
        $user->nickname = '刘晨';
        $user->email    = 'liu21st@gmail.com';
        if (false !== $user->save()) {
            return '更新用户成功';
        } else {
            return $user->getError();
        }

        echo 'update'.$id;
    }

    public function delete($id){
        echo 'delete'.$id;
    }

    public function read($id=''){
      /*  $user = UserModel::get($id);
        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo date('Y/m/d', $user->birthday) . '<br/>';
        echo 'read'.$id;*/

 /*       $user = UserModel::getByEmail('thinkphp@qq.com');
        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo date('Y/m/d', $user->birthday) . '<br/>';*/

    /*    $user = UserModel::get(['nickname'=>'流年']);
        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo date('Y/m/d', $user->birthday) . '<br/>';*/

        $user = UserModel::where('nickname', '刘晨')->find();

        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';

        // echo date('Y/m/d', $user->birthday) . '<br/>';
        echo $user->birthday. '<br/>';
        echo $user->user_birthday. '<br/>';

    }


}