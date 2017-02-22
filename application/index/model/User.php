<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/2/17
 * Time: 下午6:47
 */

namespace app\index\model;
use think\Model;

class user extends Model
{
    // 设置完整的数据表（包含前缀）
    protected $table = 'think_user';
    // 设置数据表（不含前缀）
    protected $name = 'user';

    // 设置单独的数据库连接
    protected $connection = [
        // 数据库类型'type'        => 'mysql',
        // 服务器地址'hostname'    => '127.0.0.1',
        // 数据库名'database'    => 'test',
        // 数据库用户名'username'    => 'root',
        // 数据库密码'password'    => '',
        // 数据库连接端口'hostport'    => '',
        // 数据库连接参数'params'      => [],
        // 数据库编码默认采用utf8'charset'     => 'utf8',
        // 数据库表前缀'prefix'      => 'think_',
        // 数据库调试模式'debug'       => true,
    ];

    // 设置数据表主键
    protected $pk    = 'id';

    // 设置当前数据表的字段信息
    protected $field = [
    'id'          => 'int',
    'birthday'    => 'int',
    'status'      => 'int',
    'create_time' => 'int',
    'update_time' => 'int',
    'nickname', 'email',
    ];

/*    protected function getBirthdayAttr($birthday){
        return date('Y-m-d',$birthday);
    }*/


    protected function getUserBirthdayAttr($value,$data){

        return date('Y-m-d',$data['birthday']);
    }

    //protected $dateFormat = 'Y/m/d';
    /*
    protected $type = [
        'birthday'=>'timestamp'
    ];
    */

    protected $type = [
        'birthday'=>'timestamp:Y/m/d'
    ];

    //protected $createTime = 'create_at';
    //protected $updateTime = 'update_at';

    // protected $autoWriteTimestamp = false;

    // protected $autoWriteTimestamp = 'datetime';

    //protected $insert=['status'=>1];
    protected $insert=['status'];

    // status属性修改器
    protected function setStatusAttr($value, $data){
    return '流年' == $data['nickname'] ? 1 : 2;
    }

    // status属性读取器
    protected function getStatusAttr($value){
    $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
    return $status[$value];
    }

    protected function scopeEmail($query){
        $query->where('email','thinkphp@qq.com');
    }

    protected function scopeStatus($query){
        $query->where('status',1);
    }


}