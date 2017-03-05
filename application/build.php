<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/3/5
 * Time: 上午11:39
 */

return [
    //定义test模块的自动生成

    'test' => [
        '__dir__'    => ['controller', 'model', 'view'],
        'controller' => ['User', 'UserType'],
        'model'      => ['User', 'UserType'],
        'view'       => ['index/index', 'index/test'],

]

];