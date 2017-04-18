<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/4/17
 * Time: 下午10:27
 */

namespace app\index\controller;
use think\Controller;

/**
 * 首页
 */
define("TOKEN", "weixin");//定义你公众号自己设置的token
define("APPID", "wx9c45ac1710eb8a3a");//填写你微信公众号的appid 千万要一致啊
define("APPSECRET", "64c8fdf0bdeaec473f9e4d971a63176a");//填写你微信公众号的appsecret  千万要记得保存 以后要看的话就只有还原了  保存起来 有益无害

// http://tp5.ccc/index/wechat
// http://tp5.yyii.info/index/wechat/index
class Wechat extends Controller
{


    public function index(){

        //获得参数 signature nonce token timestamp echostr
        $nonce     = $_GET['nonce'];
        $token     = 'weixin';
        $timestamp = $_GET['timestamp'];
        $echostr   = $_GET['echostr'];
        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        if( $str  == $signature && $echostr ){
            //第一次接入weixin api接口的时候
            echo  $echostr;
            exit;
        }else{
            $this->reponseMsg();
        }


    }

// http://tp5.yyii.info/index/wechat/show
    public function show(){
        echo 'this is show';
    }

    // 接收事件推送并回复
    public function reponseMsg(){
        //1.获取到微信推送过来post数据（xml格式）
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        //2.处理消息类型，并设置回复类型和内容
        /*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[FromUser]]></FromUserName>
<CreateTime>123456789</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[subscribe]]></Event>
</xml>*/
        $postObj = simplexml_load_string( $postArr );
        //$postObj->ToUserName = '';
        //$postObj->FromUserName = '';
        //$postObj->CreateTime = '';
        //$postObj->MsgType = '';
        //$postObj->Event = '';
        // gh_e79a177814ed
        //判断该数据包是否是订阅的事件推送
        if( strtolower( $postObj->MsgType) == 'event'){
            //如果是关注 subscribe 事件
            if( strtolower($postObj->Event == 'subscribe') ){
                //回复用户消息(纯文本格式)
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time     = time();
                $msgType  =  'text';
                $content  = '欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                $template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
                $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                echo $info;
                /*<xml>
                <ToUserName><![CDATA[toUser]]></ToUserName>
                <FromUserName><![CDATA[fromUser]]></FromUserName>
                <CreateTime>12345678</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[你好]]></Content>
                </xml>*/
            }
        }

        //当微信用户发送imooc，公众账号回复‘imooc is very good'
        /*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>12345678</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[你好]]></Content>
</xml>*/
        /*if(strtolower($postObj->MsgType) == 'text'){
            switch( trim($postObj->Content) ){
                case 1:
                    $content = '您输入的数字是1';
                break;
                case 2:
                    $content = '您输入的数字是2';
                break;
                case 3:
                    $content = '您输入的数字是3';
                break;
                case 4:
                    $content = "<a href='http://www.imooc.com'>慕课</a>";
                break;
                case '英文':
                    $content = 'imooc is ok';
                break;

            }
                $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
//注意模板中的中括号 不能少 也不能多
                $fromUser = $postObj->ToUserName;
                $toUser   = $postObj->FromUserName;
                $time     = time();
                // $content  = '18723180099';
                $msgType  = 'text';
                echo sprintf($template, $toUser, $fromUser, $time, $msgType, $content);

        }
    }
*/
        //用户发送tuwen1关键字的时候，回复一个单图文
        if( strtolower($postObj->MsgType) == 'text' && trim($postObj->Content)=='tuwen2' ){
            $toUser = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $arr = array(
                array(
                    'title'=>'imooc',
                    'description'=>"imooc is very cool",
                    'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    'url'=>'http://www.imooc.com',
                ),
                array(
                    'title'=>'hao123',
                    'description'=>"hao123 is very cool",
                    'picUrl'=>'https://www.baidu.com/img/bdlogo.png',
                    'url'=>'http://www.hao123.com',
                ),
                array(
                    'title'=>'qq',
                    'description'=>"qq is very cool",
                    'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    'url'=>'http://www.qq.com',
                ),
            );
            $template = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>".count($arr)."</ArticleCount>
						<Articles>";
            foreach($arr as $k=>$v){
                $template .="<item>
							<Title><![CDATA[".$v['title']."]]></Title> 
							<Description><![CDATA[".$v['description']."]]></Description>
							<PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
							<Url><![CDATA[".$v['url']."]]></Url>
							</item>";
            }

            $template .="</Articles>
						</xml> ";
            echo sprintf($template, $toUser, $fromUser, time(), 'news');

            //注意：进行多图文发送时，子图文个数不能超过10个
        }else{
            switch( trim($postObj->Content) ){
                case 1:
                    $content = '您输入的数字是1';
                    break;
                case 2:
                    $content = '您输入的数字是2';
                    break;
                case 3:
                    $content = '您输入的数字是3';
                    break;
                case 4:
                    $content = "<a href='http://www.imooc.com'>慕课</a>";
                    break;
                case '英文':
                    $content = 'imooc is ok';
                    break;
            }
            $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
//注意模板中的中括号 不能少 也不能多
            $fromUser = $postObj->ToUserName;
            $toUser   = $postObj->FromUserName;
            $time     = time();
            // $content  = '18723180099';
            $msgType  = 'text';
            echo sprintf($template, $toUser, $fromUser, $time, $msgType, $content);

        }//if end
    }//reponseMsg end

    //判断是介入还是用户  只有第一次介入的时候才会返回echostr
    function index_0()
    {
        //这个echostr呢  只有说验证的时候才会echo  如果是验证过之后这个echostr是不存在的字段了
        $echoStr = $_GET["echostr"];

        if ($this->checkSignature()) {
            echo $echoStr;
            //如果你不知道是否验证成功  你可以先echo echostr 然后再写一个东西
            exit;
        }

    }//index end


    //验证微信开发者模式接入是否成功
    private function checkSignature()
    {
        //signature 是微信传过来的 类似于签名的东西
        $signature = $_GET["signature"];
        //微信发过来的东西
        $timestamp = $_GET["timestamp"];
        //微信传过来的值  什么用我不知道...
        $nonce     = $_GET["nonce"];
        //定义你在微信公众号开发者模式里面定义的token
        $token  = TOKEN;
        //三个变量 按照字典排序 形成一个数组
        $tmpArr = array(
            $token,
            $timestamp,
            $nonce
        );
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        //哈希加密  在laravel里面是Hash::
        $tmpStr = sha1($tmpStr);
        //按照微信的套路 给你一个signature没用是不可能的 这里就用得上了
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }// checkSignature end


    //构建一个发送请求的curl方法  微信的东西都是用这个 直接百度
    function https_request($url, $data = null)
    {
        //这个方法我不知道是怎么个意思  我看都是这个方法 就copy过来了
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }//https_request end

    // 下面是从方倍copy
    // 响应消息
    public function responseMsg_0()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        // $postStr = file_get_contents("php://input");
        if (!empty($postStr)){
            $this->logger("R \r\n".$postStr);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);

            //消息类型分离
            switch ($RX_TYPE)
            {
                case "event":
                    $result = $this->receiveEvent($postObj);
                    break;
                case "text":
                    $result = $this->receiveText($postObj);
                    break;
                case "image":
                    $result = $this->receiveImage($postObj);
                    break;
                case "location":
                    $result = $this->receiveLocation($postObj);
                    break;
                case "voice":
                    $result = $this->receiveVoice($postObj);
                    break;
                case "video":
                case "shortvideo":
                    $result = $this->receiveVideo($postObj);
                    break;
                case "link":
                    $result = $this->receiveLink($postObj);
                    break;
                default:
                    $result = "unknown msg type: ".$RX_TYPE;
                    break;
            }
            $this->logger("T \r\n".$result);
            echo $result;
        }else {
            echo "";
            exit;
        }
    }

    //接收事件消息
    private function receiveEvent($object)
    {
        $content = "";
        switch ($object->Event)
        {
            case "subscribe":
                $content = "欢迎使用方倍工作室微信开发入门教程Demo\n请回复以下关键字：文本 表情 单图文 多图文 音乐\n请按住说话 或 点击 + 再分别发送以下内容：语音 图片 小视频 我的收藏 位置";
                $content .= (!empty($object->EventKey))?("\n来自二维码场景 ".str_replace("qrscene_","",$object->EventKey)):"";
                $content .= "\n\n".'<a href="http://m.cnblogs.com/?u=txw1958">技术支持 方倍工作室</a>';
                break;
            case "unsubscribe":
                $content = "取消关注";
                break;
            case "CLICK":
                switch ($object->EventKey)
                {
                    case "COMPANY":
                        $content = array();
                        $content[] = array("Title"=>"方倍工作室", "Description"=>"", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
                        break;
                    default:
                        $content = "点击菜单：".$object->EventKey;
                        break;
                }
                break;
            case "VIEW":
                $content = "跳转链接 ".$object->EventKey;
                break;
            case "SCAN":
                $content = "扫描场景 ".$object->EventKey;
                break;
            case "LOCATION":
                $content = "上传位置：纬度 ".$object->Latitude.";经度 ".$object->Longitude;
                break;
            case "scancode_waitmsg":
                if ($object->ScanCodeInfo->ScanType == "qrcode"){
                    $content = "扫码带提示：类型 二维码 结果：".$object->ScanCodeInfo->ScanResult;
                }else if ($object->ScanCodeInfo->ScanType == "barcode"){
                    $codeinfo = explode(",",strval($object->ScanCodeInfo->ScanResult));
                    $codeValue = $codeinfo[1];
                    $content = "扫码带提示：类型 条形码 结果：".$codeValue;
                }else{
                    $content = "扫码带提示：类型 ".$object->ScanCodeInfo->ScanType." 结果：".$object->ScanCodeInfo->ScanResult;
                }
                break;
            case "scancode_push":
                $content = "扫码推事件";
                break;
            case "pic_sysphoto":
                $content = "系统拍照";
                break;
            case "pic_weixin":
                $content = "相册发图：数量 ".$object->SendPicsInfo->Count;
                break;
            case "pic_photo_or_album":
                $content = "拍照或者相册：数量 ".$object->SendPicsInfo->Count;
                break;
            case "location_select":
                $content = "发送位置：标签 ".$object->SendLocationInfo->Label;
                break;
            default:
                $content = "receive a new event: ".$object->Event;
                break;
        }

        if(is_array($content)){
            $result = $this->transmitNews($object, $content);
        }else{
            $result = $this->transmitText($object, $content);
        }
        return $result;
    }

    //接收文本消息
    private function receiveText($object)
    {
        $keyword = trim($object->Content);
        //多客服人工回复模式
        if (strstr($keyword, "请问在吗") || strstr($keyword, "在线客服")){
            $result = $this->transmitService($object);
            return $result;
        }

        //自动回复模式
        if (strstr($keyword, "文本")){
            $content = "这是个文本消息";
        }else if (strstr($keyword, "表情")){
            $content = "微笑：/::)\n乒乓：/:oo\n中国：".$this->bytes_to_emoji(0x1F1E8).$this->bytes_to_emoji(0x1F1F3)."\n仙人掌：".$this->bytes_to_emoji(0x1F335);
        }else if (strstr($keyword, "单图文")){
            $content = array();
            $content[] = array("Title"=>"单图文标题",  "Description"=>"单图文内容", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
        }else if (strstr($keyword, "图文") || strstr($keyword, "多图文")){
            $content = array();
            $content[] = array("Title"=>"多图文1标题", "Description"=>"", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
            $content[] = array("Title"=>"多图文2标题", "Description"=>"", "PicUrl"=>"http://d.hiphotos.bdimg.com/wisegame/pic/item/f3529822720e0cf3ac9f1ada0846f21fbe09aaa3.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
            $content[] = array("Title"=>"多图文3标题", "Description"=>"", "PicUrl"=>"http://g.hiphotos.bdimg.com/wisegame/pic/item/18cb0a46f21fbe090d338acc6a600c338644adfd.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
        }else if (strstr($keyword, "音乐")){
            $content = array();
            $content = array("Title"=>"最炫民族风", "Description"=>"歌手：凤凰传奇", "MusicUrl"=>"http://mascot-music.stor.sinaapp.com/zxmzf.mp3", "HQMusicUrl"=>"http://mascot-music.stor.sinaapp.com/zxmzf.mp3");
        }else if(strstr($keyword, "菜单")){
            $result = $this->createMenu();
            $content = "微笑：/::) ,返回 result = ".$result;
        }else if(strstr($keyword, "栏目")){
            $result = $this->createMenu1();
            $content = "微笑：/::) ,返回 result = ".$result;
        }else if(strstr($keyword, "at")){
            $result = $this->getWxAccessToken1();
            $content = "微笑：/::) ,返回access_token result = ".$result;
        }else{
            $user = Model('User');
            $nickname = $user->where('id=1')->getfield('nickname');
            $content = date("Y-m-d H:i:s",time())."\n\n".'<a href="http://m.cnblogs.com/?u=txw1958">技术支持 '.$nickname.'工作室</a>';
        }

        if(is_array($content)){
            if (isset($content[0])){
                $result = $this->transmitNews($object, $content);
            }else if (isset($content['MusicUrl'])){
                $result = $this->transmitMusic($object, $content);
            }
        }else{
            $result = $this->transmitText($object, $content);
        }
        return $result;
    }

    //接收图片消息
    private function receiveImage($object)
    {
        $content = array("MediaId"=>$object->MediaId);
        $result = $this->transmitImage($object, $content);
        return $result;
    }

    //接收位置消息
    private function receiveLocation($object)
    {
        $content = "你发送的是位置，经度为：".$object->Location_Y."；纬度为：".$object->Location_X."；缩放级别为：".$object->Scale."；位置为：".$object->Label;
        $result = $this->transmitText($object, $content);
        return $result;
    }

    //接收语音消息
    private function receiveVoice($object)
    {
        if (isset($object->Recognition) && !empty($object->Recognition)){
            $content = "你刚才说的是：".$object->Recognition;
            $result = $this->transmitText($object, $content);
        }else{
            $content = array("MediaId"=>$object->MediaId);
            $result = $this->transmitVoice($object, $content);
        }
        return $result;
    }

    //接收视频消息
    private function receiveVideo($object)
    {
        $content = "上传视频类型：".$object->MsgType;
        $result = $this->transmitText($object, $content);
        return $result;
    }

    //接收链接消息
    private function receiveLink($object)
    {
        $content = "你发送的是链接，标题为：".$object->Title."；内容为：".$object->Description."；链接地址为：".$object->Url;
        $result = $this->transmitText($object, $content);
        return $result;
    }

    //回复文本消息
    private function transmitText($object, $content)
    {
        if (!isset($content) || empty($content)){
            return "";
        }

        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[text]]></MsgType>
    <Content><![CDATA[%s]]></Content>
</xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);

        return $result;
    }

    //回复图文消息
    private function transmitNews($object, $newsArray)
    {
        if(!is_array($newsArray)){
            return "";
        }
        $itemTpl = "        <item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
        </item>
";
        $item_str = "";
        foreach ($newsArray as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }
        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[news]]></MsgType>
    <ArticleCount>%s</ArticleCount>
    <Articles>
$item_str    </Articles>
</xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($newsArray));
        return $result;
    }

    //回复音乐消息
    private function transmitMusic($object, $musicArray)
    {
        if(!is_array($musicArray)){
            return "";
        }
        $itemTpl = "<Music>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <MusicUrl><![CDATA[%s]]></MusicUrl>
        <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
    </Music>";

        $item_str = sprintf($itemTpl, $musicArray['Title'], $musicArray['Description'], $musicArray['MusicUrl'], $musicArray['HQMusicUrl']);

        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[music]]></MsgType>
    $item_str
</xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }

    //回复图片消息
    private function transmitImage($object, $imageArray)
    {
        $itemTpl = "<Image>
        <MediaId><![CDATA[%s]]></MediaId>
    </Image>";

        $item_str = sprintf($itemTpl, $imageArray['MediaId']);

        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[image]]></MsgType>
    $item_str
</xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }

    //回复语音消息
    private function transmitVoice($object, $voiceArray)
    {
        $itemTpl = "<Voice>
        <MediaId><![CDATA[%s]]></MediaId>
    </Voice>";

        $item_str = sprintf($itemTpl, $voiceArray['MediaId']);
        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[voice]]></MsgType>
    $item_str
</xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }

    //回复视频消息
    private function transmitVideo($object, $videoArray)
    {
        $itemTpl = "<Video>
        <MediaId><![CDATA[%s]]></MediaId>
        <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
    </Video>";

        $item_str = sprintf($itemTpl, $videoArray['MediaId'], $videoArray['ThumbMediaId'], $videoArray['Title'], $videoArray['Description']);

        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[video]]></MsgType>
    $item_str
</xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }

    //回复多客服消息
    private function transmitService($object)
    {
        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[transfer_customer_service]]></MsgType>
</xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }

    //回复第三方接口消息
    private function relayPart3($url, $rawData)
    {
        $headers = array("Content-Type: text/xml; charset=utf-8");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    //字节转Emoji表情
    function bytes_to_emoji($cp)
    {
        if ($cp > 0x10000){       # 4 bytes
            return chr(0xF0 | (($cp & 0x1C0000) >> 18)).chr(0x80 | (($cp & 0x3F000) >> 12)).chr(0x80 | (($cp & 0xFC0) >> 6)).chr(0x80 | ($cp & 0x3F));
        }else if ($cp > 0x800){   # 3 bytes
            return chr(0xE0 | (($cp & 0xF000) >> 12)).chr(0x80 | (($cp & 0xFC0) >> 6)).chr(0x80 | ($cp & 0x3F));
        }else if ($cp > 0x80){    # 2 bytes
            return chr(0xC0 | (($cp & 0x7C0) >> 6)).chr(0x80 | ($cp & 0x3F));
        }else{                    # 1 byte
            return chr($cp);
        }
    }

    //日志记录
    private function logger($log_content)
    {
        if(isset($_SERVER['HTTP_APPNAME'])){   //SAE
            sae_set_display_errors(false);
            sae_debug($log_content);
            sae_set_display_errors(true);
        }else if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"){ //LOCAL
            $max_size = 1000000;
            $log_filename = "log.xml";
            if(file_exists($log_filename) and (abs(filesize($log_filename)) > $max_size)){unlink($log_filename);}
            file_put_contents($log_filename, date('Y-m-d H:i:s')." ".$log_content."\r\n", FILE_APPEND);
        }
    }

    //发送get或post请求  _ add by lh.
    private function http_curl($url, $method = 'get', $type = 'json', $data = array()){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($method == 'post'){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $returnData = curl_exec($ch);
        curl_close($ch);
        if($type == 'json'){
            if (curl_errno($ch)){
                return curl_error($ch);
            }else{
                return json_decode($returnData, true);
            }
        }
    }

    //获取access_token _ add by lh.
    private function getWxAccessToken(){
        //将access_token存在session中
        if ($_SESSION['access_token'] && $_SESSION['expire_time'] > time()){
            //如access_token存在 且没有过期
            return $_SESSION['access_token'];
        }else{
            //如果access_token不存在或者已经过期，重新获取access_token
            $appid = 'wx9c45ac1710eb8a3a';
            $appsecret = '64c8fdf0bdeaec473f9e4d971a63176a';
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' .$appid.'&secret='.$appsecret;
            $res = $this->http_curl($url, 'get', 'json');
            $access_token = $res['access_token'];
            $_SESSION['access_token'] = $access_token;
            $_SESSION['expire_time'] = time() + 7200;
            return $access_token;
        }
    }

    //创建自定义菜单  _ add by lh.
    private function createMenu(){
        header('Content-Type:text/html;charset=utf-8');
        $access_token = $this->getWxAccessToken();
        // $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $postArr = array(
            'button' => array(
                array(
                    'name' => urlencode('菜单一'),
                    'type' => 'click',
                    'key' => 'item1',
                ),
                array(
                    'name' => urlencode('菜单二'),
                    'sub_button' => array(
                        array(
                            'name' => urlencode('歌曲'),
                            'type' => 'click',
                            'key' => 'songs',
                        ),  //第一个二级菜单
                        array(
                            'name' => urlencode('电影'),
                            'type' => 'view',
                            'url' => 'http://www.baidu.com'

                        ),    //第二个二级菜单
                        array(
                            'name' => urlencode('菜单三'),
                            'type' => 'view',
                            'url'  => 'http://www.qq.com'
                        )
                    )
                )
            ),
            array(
                'name' => urlencode('菜单一'),
                'type' => 'click',
                'key' => 'item1'
            )     //第三个一级菜单
        );
        $postJson = urldecode(json_encode($postArr));
        $res = $this->http_curl($url, 'post', 'json', $postJson);
        return $res;
    }

    // 自定义菜单 _ add by zy.
    private function createMenu1(){

        header('Content-Type:text/html;charset=utf-8');
        $ACC_TOKEN = $this->getWxAccessToken1();
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$ACC_TOKEN;
        $postArr = array(
            'button' => array(
                array(
                    'name' => urlencode('菜单一'),
                    'type' => 'click',
                    'key' => 'item1',
                ),
                array(
                    'name' => urlencode('菜单二'),
                    'type' => 'click',
                    'key' => 'item2',
                ),   //第二个一级菜单
                array(    //第三个一级菜单
                    'name' => urlencode('菜单三'),
                    'type' => 'click',
                    'key' => 'item3'
                )));
        $postJson = urldecode(json_encode($postArr));

        // $res = $this->http_curl($url, 'post', 'json', $postJson);

        $MENU_URL="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$ACC_TOKEN;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $MENU_URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $info = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Errno'.curl_error($ch);
        }

        curl_close($ch);

        return $info;


    }


    // 获得access_token _ add by zy.

    private function getWxAccessToken1(){

        $APPID="wx9c45ac1710eb8a3a";
        $APPSECRET="64c8fdf0bdeaec473f9e4d971a63176a";

        $TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;

        $json=file_get_contents($TOKEN_URL);
        $result=json_decode($json,true);

        $ACC_TOKEN=$result['access_token'];

        return $ACC_TOKEN;
    }


}