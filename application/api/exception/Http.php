<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/3/4
 * Time: 上午11:18
 */

namespace app\api\exception;

use think\exception\Handle;
use think\exception\HttpException;

class Http extends Handle{
    public function render(\Exception $e){
        $statusCode = $e->getStatusCode();

        if(!isset($statusCode)){
            $statusCode = 500;
        }

        $result = [
            'code'=>$statusCode,
            'msg'=>$e->getMessage(),
            'time'=>$_SERVER['REQUEST_TIME']

        ];

        return json($result,$statusCode);

    }

}