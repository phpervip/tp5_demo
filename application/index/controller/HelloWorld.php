<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/17
 * Time: 下午3:55
 */

namespace app\index\controller;


class HelloWorld
{
    public function index($name='World'){
        return 'Hello'.$name.'!';
    }
}