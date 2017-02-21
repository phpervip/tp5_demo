<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/21
 * Time: 下午8:46
 */

namespace app\index\controller;
use think\Controller;

class User extends Controller
{
    public function index(){
        echo 'index';
    }

    public function create(){
        echo 'create';
    }

    public function add(){
        echo 'add';
    }

    public function addList(){
        echo 'addList';
    }

    public function update($id){
        echo 'update'.$id;
    }

    public function delete($id){
        echo 'delete'.$id;
    }

    public function read($id){
        echo 'read'.$id;
    }


}