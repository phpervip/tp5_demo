<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/3/9
 * Time: 下午10:25
 */

namespace app\index\controller;
use think\Request;
use think\Validate;

class Upload extends \think\Controller
{
    // 文件上传表单
    public function index(){
        return $this->fetch();
    }

    // 文件上传提交
    public function up(Request $request){
        // 获取表单上传文件
        $file = $request->file('file');

        if(empty($file)){
            $this->error('请选择上传文件');
        }


      /*  $file = $request->file('file');
        $result = $this->validate(['file' => $file], ['file'=>'require|image'],['file.require' => '请选择上传文件', 'file.image' => '非法图像文件']);

        if(true!==$result){
            $this->error($result);
        }

        // $info = $file->move(ROOT_PATH.'public'.DS.'uploads');*/

        // $info = $file->validate(['ext'=>'jpg,png'])->move(ROOT_PATH.'public'.DS.'uploads');
        // $info = $file->rule('md5')->move(ROOT_PATH . 'public' . DS . 'uploads');
        $info = $file->rule('sha1')->move(ROOT_PATH . 'public' . DS . 'uploads');

        // 移动到框架应用根目录/public/uploads/目录下
        if($info){
            $this->success('文件上传成功:'.$info->getRealPath());
        }else{
            // 上传失败获取错误信息
            $this->error($file->getError());
        }

    }
}