<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/17
 * Time: 下午4:24
 */

namespace app\index\controller;

use app\index\model\Blog as Blogs;
use think\Controller;
use think\Request;


class Blog extends Controller
{

    public function index(){
        $list = Blogs::all();
        return json($list);
    }




    public function save(Request $request){

        $data = $request->param();
        $result = Blogs::create($data);
        return json($result);

    }


    public function get($id){
        return '查看id='.$id.'的内容';
    }

    public function read($id){
        $data = Blogs::get($id);
        return json($data);
        //return '查看name='.$name.'的内容';
    }

    public function update(Request $request,$id){
        $data = $request->param();
        $result = Blogs::update($data,['id'=>$id]);
        return json($result);
    }

    public function delete($id){
        $result = Blogs::destroy($id);
        return json($result);
    }

    public function archive($year,$month){
        return '查看'.$year.'/'.$month.'的归档内容';
    }





}