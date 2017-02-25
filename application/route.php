<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::rule('hello/:name','index/hello');
Route::rule('helloo/:name',function($name){
    return 'Helloo,'.$name.'!';
});

return [
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'helloo/[:name]$'=>'index/index/helloo',

    // 定义闭包
    'helloo/[:name]'=>function($name){
        return 'Hello,'.$name.'!';
    },

    // 定义路由的请求类型和后缀
    'hello/[:name]'=>['index/hello',['method'=>'get','ext'=>'html']],

    'hello16/:name' =>['index/hello16',[],['name'=>'\w+']],

/*    'blog/:year/:month'=>['blog/archive',['method'=>'get'],['year'=>'\d{4}','month'=>'\d{2}']],
    'blog/:id'=>['blog/get',['method'=>'get'],['id'=>'\d+']],
    'blog/:name'=>['blog/read',['method'=>'get'],['name'=>'\w+']],*/

  /*  '[blog]'=>[
        ':year/:month'=>['blog/archive',['method'=>'get'],['year'=>'\d{4}','month'=>'\d{2}']],
        ':id'=>['blog/get',['method'=>'get'],['id'=>'\d+']],
        ':name'=>['blog/read',['method'=>'get'],['name'=>'\w+']],
    ],*/

   '__pattern__' => [
        'name' => '\w+',
        'id'=>'\d+',
        'year'=>'\d{4}',
        'month'=>'\d{2}',

    ],
    'blog/:id'=>'blog/get',
    'blog/:name'=>'blog/read',
    'blog-<year>-<month>'=>'blog/archive',

    'user/index'      => 'index/user/index',
    'user/create'     => 'index/user/create',
    'user/add'        => 'index/user/add',
    'user/add_list'   => 'index/user/addList',
    'user/update/:id' => 'index/user/update',
    'user/delete/:id' => 'index/user/delete',
    'user/:id'        => 'index/user/read',
    'userA/:id'       => 'index/userA/read',

];
