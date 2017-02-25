<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/25
 * Time: 上午10:57
 */

namespace app\index\controller;
use think\Controller;
use app\index\model\UserA as UserModel;
use app\index\model\ProfileA;
use app\index\model\Book;
use app\index\model\Role;


class UserA extends Controller
{
    // 关联写入
    public function add(){
        $user = new UserModel();


        $user->name     = 'thinkphp';
        $user->password = '123456';
        $user->nickname = '流年';

        if($user->save()){
            $profile = new ProfileA;

            $profile->truename = '刘晨';
            $profile->birthday = '1977-03-05';
            $profile->address  = '中国上海';
            $profile->email    = 'thinkphp@qq.com';

            $user->profile()->save($profile);
            return '用户新增成功';

        }else{
            return $user->getError();
        }


    }

    // 关联查询

    // tp5.ccc/index/user_a/read/id/1
    // 写route后，tp5.ccc/userA/1
    public function read($id){

        // $user = UserModel::get($id);

        // get方法使用第二个参数就表示进行关联预载入查询。
        $user = UserModel::get($id,'profile');

        echo $user->name.'<br/>';
        echo $user->nickname.'<br/>';
        echo $user->profile->truename.'<br/>';
        echo $user->profile->email.'<br/>';


    }





    // 关联更新
    public function update($id){
        $user = UserModel::get($id);
        $user->name = 'framework';
        if($user->save()){
            //
            $user->profile->email = 'liu21st@gmail.com';
            $user->profile->save();
            return '用户[ ' . $user->name . ' ]更新成功';
        }else{
            return $user->getError();
        }

    }

    // 关联删除
    public function delete($id){
        $user = UserModel::get($id);
        if($user->delete()){
            $user->profile->delete();
            return '用户[ ' . $user->name . ' ]删除成功';
        }else{
            return $user->getError();
        }

    }

    // 一对多 关联新增
    public function addBook(){
        $user = UserModel::get(1);
        $book = new Book();

      /*  $book->title        = 'ThinkPHP5快速入门';
        $book->publish_time = '2016-05-06';

        $user->books()->save($book);*/

        $books = [
            ['title' => 'ThinkPHP5快速入门', 'publish_time' => '2016-05-06'],
            ['title' => 'ThinkPHP5开发手册', 'publish_time' => '2016-03-06'],
        ];
        $user->books()->saveAll($books);

        return '添加Book成功';
    }

    ///  这里好象不对。。。
    public function read_b(){

        // $user = UserModel::get(1,'books');
        /*        $user = UserModel::get(1);
                // 获取状态为1的关联数据
                $books = $user->books()->where('status',1)->select();
                dump($books);
                // 获取作者写的某本书
                $book = $user->books()->getByTitle('ThinkPHP5开发手册');
                dump($book);*/

        // 查询有写过书的作者列表
        $user = UserModel::has('books')->select();
        // 查询写过三本书以上的作者
        $user = UserModel::has('books', '>=', 3)->select();
        // 查询写过ThinkPHP5快速入门的作者
        $user = UserModel::hasWhere('books', ['title' => 'ThinkPHP5快速入门'])->select();

        dump($user);

        // get方法使用第二个参数就表示进行关联预载入查询。


    }

    public function update_b($id){
        $user = UserModel::get($id);

     /*   $book = $user->books()->getByTitle('ThinkPHP5开发手册');

        $book->title = 'ThinkPHP5快速入门';
        if($book->save()){
            return $book->title.'更新成功';
        }else{
            return $book->title.'更新失败';
        }*/

        $res = $user->books()->where('title','ThinkPHP5快速入门')->update(['title' => 'ThinkPHP5开发手册']);

        if($res){
            return '更新成功';
        }else{
            return '更新失败';
        }
    }

    public function delete_b($id){
        $user = UserModel::get($id);
        if($user->delete()){
            $user->books()->delete();
        }

    }


    public function add_r(){
   /*     $user  = UserModel::getByNickname('张三');
      //  $user->roles()->save(['name' => 'editor', 'title' => '编辑']);

      // 给当前用户新增多个用户角色
      $user->roles()->saveAll([
            ['name' => 'leader', 'title' => '领导'],
            ['name' => 'admin', 'title' => '管理员'],
        ]);
        return '用户角色新增成功';*/

   // 使用attach方法增加枢纽表的关联数据：

  /*  $user = UserModel::getByNickname('流年');
    $role = Role::getByName('editor');
    $user->roles()->attach($role);
    return '用户角色添加成功';*/

    // 直接使用角色Id添加关联数据
        $user = UserModel::getByNickname('流年');
        $user->roles()->attach(2);
        return '用户角色添加成功.';

    }

    public function delete_r(){
        $user = UserModel::get(2);
        // 使用detach方法删除关联的枢纽表数据，但不会删除关联模型数据，

        $role = Role::getByName('leader');
        $user->roles()->detach($role);
        return '用户角色删除成功';
    }

    public function read_r(){
 /*       $user = UserModel::getByNickname('张三');
        dump($user->roles);   // 是一个对象。*/

        $user = UserModel::get(1,'roles');
        dump($user->roles);    // 是一个对象。不是数组？
    }


}