<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/4/18
 * Time: 下午4:17
 */

    /**
     * demo_simple.php
     * 简单接受用户消息并回复消息 DEMO
     *
     * wechat-php-sdk DEMO
     *
     * @author 		gaoming13 <gaoming13@yeah.net>
     * @link 		https://github.com/gaoming13/wechat-php-sdk
     * @link 		http://me.diary8.com/
     *
     *
     */

namespace app\index\controller;
require '../autoload.php';

use Gaoming13\WechatPhpSdk\Wechat;
use Think\Controller;


class Wechatsdk extends Controller{

    function index(){

        $wechat = new Wechat(array(
            // 开发者中心-配置项-AppID(应用ID)
            'appId' 		=>	'wx9c45ac1710eb8a3a',// 这是一步登天的测试号
            // 开发者中心-配置项-服务器配置-Token(令牌)
            'token' 		=> 	'weixin',
            // 开发者中心-配置项-服务器配置-EncodingAESKey(消息加解密密钥)
            // 可选: 消息加解密方式勾选 兼容模式 或 安全模式 需填写
            'encodingAESKey' =>	''
        ));

        // 获取微信消息
        $msg = $wechat->serve();

        // 回复微信消息
        if ($msg->MsgType == 'text' && $msg->Content == '你好') {
            $wechat->reply("你也好！");
        } else {
            $wechat->reply("不明白哦！");
        }

    }

}