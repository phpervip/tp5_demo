<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

// 增加一个新的table助手函数

function table($table, $config = []){
return \think\Db::connect($config)->setTable($table);
}

// 替换框架内置的db助手函数

function db($name, $config = []){
return \think\Db::connect($config)->name($name);
}
