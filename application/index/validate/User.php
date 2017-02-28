<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/23
 * Time: 下午9:38
 */

namespace app\index\validate;
use think\Validate;


class User extends Validate{
    // 验证规则
  /*  protected $rule = [
        'nickname'=>'require|min:5|token',
        'email'=>'require|email',
        'birthday'=>'dateFormat:Y-m-d',
        ];*/

//
//User验证器添加了三个属性的验证规则，分别表示：
//
//昵称必须，而且最小长度为5
//邮箱必须，而且必须是合法的邮件地址
//生日可选，如果填写的话必须为 Y-m-d格式的日期格式


        // 验证规则  为了避免混淆则必须用数组方式定义验证规则
 /*           protected $rule = [
            'nickname' => ['require', 'min'=>5, 'token'],
            'email'    => ['require', 'email'],
            'birthday' => ['dateFormat' => 'Y|m|d'],
            ];*/


        // 提示的错误信息都是系统默认的，接下来我们来定义提示信息。

       /*     protected $rule = [
                'nickname|昵称' => ['require', 'min'=>5],
                'email|邮箱'    => ['require', 'email'],
                'birthday|生日' => ['dateFormat' => 'Y|m|d'],
            ];*/

    /*        protected $rule = [
                ['nickname','require|min:5', '昵称必须|昵称不能短于5个字符'],
                ['email','require', '邮箱格式错误'],
                ['birthday','dateFormat' => 'Y|m|d','生日格式错误'],
            ];*/

         // 自定义验证规则
            protected $rule = [
                ['nickname','require|min:5', '昵称必须|昵称不能短于5个字符'],
                ['email','checkMail:thinkphp.cn', '邮箱格式错误'],
                ['birthday','dateFormat' => 'Y|m|d','生日格式错误'],
            ];


            protected function checkMail($value,$rule){
                $result = preg_match('/^\w+([-+.]\w+)*@' . $rule . '$/',$value);
                if(!$result){
                    return '邮箱只能是'.$rule.'域名';
                }else{
                    return true;
                }
            }


}