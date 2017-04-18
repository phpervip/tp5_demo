<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/4/18
 * Time: 下午3:58
 */

namespace app\index\controller;
use think\gaoming13\WechatPhpSdk\Wechat;
use think\Controller;
use think\Cache;

// require '../autoload.php';
// http://tp5.ccc/index/wechat
// http://tp5.yyii.info/index/test

class Test extends Controller {

    public function index(){
        // 这是使用了Memcached来保存access_token

/*        S(array(
            'type'=>'memcached',
            'host'=>'localhost',
            'port'=>'11211',
            'prefix'=>'think',
            'expire'=>0
        ));*/

    $arr = array(
        'type'=>'memcached',
        'host'=>'localhost',
        'port'=>'11211',
        'prefix'=>'think',
        'expire'=>0
    );

        Cache::set('arr',$arr,3600);    //存储缓存

        // 开发者中心-配置项-AppID(应用ID)
        $appId = 'wx9c45ac1710eb8a3a';
        // 开发者中心-配置项-AppSecret(应用密钥)
        $appSecret = '64c8fdf0bdeaec473f9e4d971a63176a';
        // 开发者中心-配置项-服务器配置-Token(令牌)
        $token = 'weixin';
        // 开发者中心-配置项-服务器配置-EncodingAESKey(消息加解密密钥)
        $encodingAESKey = '';

        // wechat模块 - 处理用户发送的消息和回复消息

        $wechat = new Wechat(array(
            'appId' => $appId,
            'token' => 	$token,
            'encodingAESKey' =>	$encodingAESKey //可选
        ));
        // api模块 - 包含各种系统主动发起的功能
        $api = new Wechat(
            array(
                'appId' => $appId,
                'appSecret'	=> $appSecret,
                'get_access_token' => function(){
                    // 用户需要自己实现access_token的返回
                    return S('wechat_token');
                },
                'save_access_token' => function($token) {
                    // 用户需要自己实现access_token的保存
                    // S('wechat_token', $token);
                    Cache::set('wechat_token',$token,3600);//存储缓存
                    // Cache::get('key');//获取缓存
                }
            )
        );

        // 获取微信消息
        $msg = $wechat->serve();

        // 回复文本消息
        if ($msg->MsgType == 'text' && $msg->Content == '你好') {
            $wechat->reply("你也好！ - 这是我回复的额！");
        } else {
            $wechat->reply("听不懂！ - 这是我回复的额！");
        }

        // 主动发送
        $api->send($msg->FromUserName, '这是我主动发送的一条消息');
    }
}