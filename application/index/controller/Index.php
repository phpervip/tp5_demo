<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

use think\Request;
use think\Url;

class Index extends Controller
{
    public function index()
    {
        // return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
        $data = Db::name('data')->find();
		$data = [1,2,3];
        $this->assign('result',$data);
        return $this->fetch();
    }

    public function test(){
        dump(Url::build('blog/read', 'name=thinkphp'));
        return 'this is a test function';
    }



    public function hello($name='thinkphp'){
        $this->assign('name',$name);
        return $this->fetch();
    }

    protected function hello2(){
        return 'only protected function!';
    }

    private function hello3(){
        return 'this is private function!';
    }


    public function helloo($name='World',$city=''){
        return 'Hello,'.$name.'! You come from '.$city.'.';

    }

    public function hello5($name='World'){
        // $request = Request::instance();
        // 获取当前URL地址 不含域名
        //echo 'url:'.$request->url().'<br/>';
        echo 'url:'.$this->request->url().'<br/>';
        return 'Hello,'.$name.'!';
    }

    // 自动注入
    public function hello6(Request $request,$name='World'){
        echo 'url:'.$request->url().'<br/>';
        return 'Hello,'.$name.'!';
    }

    // 助手函数
    public function hello7($name='World'){
        echo 'url'.request()->url().'<br/>';
        return 'Hello,'.$name.'!';
    }

    // 使用param方法统一获取当前请求变量
    public function hello8(Request $request){
        echo '请求参数';
        dump($request->param());
        echo 'name:'.$request->param('name');

    }

    // input助手函数
    public function hello9(){
        echo '请求参数';
        dump(input());
        echo 'name:'.input('name');
    }

    // 参数优先级别：路由变量 > 当前请求变量（$_POST变量） > $_GET变量

    // param方法支持变量的过滤和默认值
    public function hello10(Request $request){

        echo 'name:'.$request->param('name','World','strtolower');
        echo '<br.>test:'.$request->param('test','thinkphp','strtoupper');

    }

    // 获取其他输入的参数
    public function hello11(Request $request){
        echo 'GET参数：';
        dump($request->get());
        echo 'GET参数：name';
        dump($request->get('name'));
        echo 'POST参数：name';
        dump($request->post('name'));
        echo 'cookie参数：name';
        dump($request->cookie('name'));
        echo '上传文件信息：image';
        dump($request->file('image'));


        echo '获取PUT请求变量';
        dump($request->put());

        echo '获取DELETE请求变量';
        dump($request->delete());

        echo '获取路由（URL）变量';
        dump($request->route());

        echo '获取$_SESSION变量';
        dump($request->session());

        echo '获取$_SERVER变量';
        dump($request->server());

        echo '获取$_ENV变量';
        dump($request->env());


    }

    //   使用助手函数
    public function hello12(Request $request){
        echo 'GET参数：';
        dump(input('get.'));
        echo 'GET参数：name';
        dump(input('get.name'));
        echo 'POST参数：name';
        dump(input('post.name'));
        echo 'cookie参数：name';
        dump(input('cookie.name'));
        echo '上传文件信息：image';
        dump(input('file.image'));

    }


    public function hello13(Request $request){
        echo '请求方法：' . $request->method() . '<br/>';
        echo '资源类型：' . $request->type() . '<br/>';
        echo '访问IP：' . $request->ip(). '<br/>';
        echo '是否AJax请求：' .var_export($request->isAjax(),true) . '<br/>';
        echo '请求参数：';
        dump($request->param());
        echo '请求参数：仅包含name';
        dump($request->only(['name']));
        echo '请求参数：排除name';
        dump($request->except(['name']));
    }

    public function hello14(Request $request,$name = 'World'){
        // 获取当前域名
        echo 'domain: ' . $request->domain() . '<br/>';
        // 获取当前入口文件
        echo 'file: ' . $request->baseFile() . '<br/>';
        // 获取当前URL地址 不含域名
        echo 'url: ' . $request->url() . '<br/>';
        // 获取包含域名的完整URL地址
        echo 'url with domain: ' . $request->url(true) . '<br/>';
        // 获取当前URL地址 不含QUERY_STRING
        echo 'url without query: ' . $request->baseUrl() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root:' . $request->root() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root with domain: ' . $request->root(true) . '<br/>';
        // 获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
        // 获取URL地址中的PATH_INFO信息 不含后缀
        echo 'pathinfo: ' . $request->path() . '<br/>';
        // 获取URL地址中的后缀信息
        echo 'ext: ' . $request->ext() . '<br/>';

        // 获取当前请求的scheme
        echo 'scheme: ' . $request->scheme() . '<br/>';
        // 获取当前URL的host地址
        echo 'host: ' . $request->host() . '<br/>';
        // 获取当前URL的port号
        echo 'port: ' . $request->port() . '<br/>';
        // 获取当前请求的SERVER_PROTOCOL
        echo 'protocol: ' . $request->protocol() . '<br/>';
        // 获取当前请求的REMOTE_PORT
        echo 'remotePort: ' . $request->remotePort() . '<br/>';

        // 获取当前URL地址的QUERY_STRING
        echo 'query: ' . $request->query() . '<br/>';

        return 'Hello,' . $name . '！';
    }

    // 获取当前模块/控制器/操作信息
    public function hello15(Request $request, $name = 'World'){
        echo '模块：'.$request->module();
        echo '<br/>控制器：'.$request->controller();
        echo '<br/>操作：'.$request->action();
    }

    // 获取路由和调度信息
    public function hello16(Request $request, $name = 'World'){
        echo '路由信息：';
        dump($request->routeInfo());
        echo '调度信息：';
        dump($request->dispatch());

        return 'Hello,' . $name . '！';
    }


    // 自动输出
    public function hello17(){
        $data = ['name' => 'thinkphp', 'status' => '1'];
        return $data;
    }

    // 手动输出
    public function hello18(){
        $data = ['name' => 'thinkphp', 'status' => '1'];
        // return json($data,201,['Cache-control' => 'no-cache,must-revalidate']);
        return json($data)->code(201)->header(['Cache-control' => 'no-cache,must-revalidate']);
    }

    // 页面跳转
    use \traits\controller\Jump;
    public function index2($name=''){

        if('thinkphp' == $name){
            // $this->success('欢迎使用ThinkPHP5.0','hello20');
            // $this->redirect('http://thinkphp.cn');
            return redirect('http://thinkphp.cn');
        }else{
            $this->error('错误的name','guest20');
        }
    }
    public function hello20(){
        return 'Hello,ThinkPHP!';
    }

    public function guest20(){
        return 'Hello,Guest!';
    }

    // 数据库操作
    public function db_test1(){
        // $result = Db::execute('insert into think_data(id,name) values(4,"yii")');
        // 创建
        // $result = Db::execute('insert into think_data(name) values("phalcon")');
        // 更新
        // $result = Db::execute('update think_data set name="symfony" where id=5');
        // 读取
        // $result = Db::query('select * from think_data where id="5"');
        // dump($result);
        // 显示数据库列表
        // $result = Db::query('show tables from tp5_demo');
        // dump($result);
        /* foreach($result as $k=>$v){
             $dbs[]=$v['Tables_in_tp5_demo'];
         }*/
        // $dbs = array_column($result,'Tables_in_tp5_demo');
        // var_dump($dbs);
        // 清空数据表
        // $result = Db::execute('TRUNCATE table test');
        // 切换数据库
        // $result = Db::connect('db1')->query('select * from think_data where id=1');
        // $result = Db::connect('db2')->query('select * from think_data where id=1');

        // 参数绑定 更安全
//        Db::execute('insert into think_data(id,name,status) values(?,?,?)',[6,'thinkphp',1]);
//        $result = Db::query('select * from think_data where id=?',[6]);
//        dump($result);

        // 命名占位符 更安全
        // Db::execute('insert into think_data(id,name,status) values(:id,:name,:status)',['id'=>7,'name'=>'ci','status'=>1]);
        // $result = Db::query('select * from think_data where id=:id',['id'=>7]);
        // dump($result);
        // return $result;

        // 查询构造器 基于PDO实现
        // 插入记录
        // Db::table('think_data')->insert(['id'=>8,'name'=>'laravel','status'=>1]);
        // 更新记录
        // Db::table('think_data')->where('id',6)->update(['name'=>'Kohana']);
        // 查询数据
        // $list = Db::table('think_data')->where('id',7)->select();
        // 删除数据
        // Db::table('think_data')->where('id',6)->delete();

        // 使用助手函数
//        $db = db('data');
//        $db->insert(['id'=>9,'name'=>'shopnc']);
//        $db->where('id',2)->update(['name'=>'tpshop']);
//        $list = $db->where('id',9)->select();
//        dump($list);
//        $db->where('id',2)->delete();

        // 链式操作 不分先后
//        $list = Db::name('data')
//            ->where('status',1)
//            ->field('id,name')
//            ->order('id','desc')
//            ->limit(10)
//            ->select();
//        dump($list);

        // 事务操作
//        Db::transaction(function(){
//            Db::table('think_user')
//                ->delete(1);
//            Db::table('think_data')
//                ->insert(['id'=>10,'name'=>'tpshop','status'=>1]);
//        });

        // 手动控制事务提交
        Db::startTrans();
        try{
            Db::table('think_user')
                ->delete(2);
            Db::table('think_data')
                ->insert(['id'=>11,'name'=>'thinkphp','status'=>1]);

            // 提交事务
            Db::commit();

        }catch(\Exception $e){

            // 回滚事务
            Db::rollback();

        }


    }

    // 查询语言
    public function db_test2(){

//        $result = Db::name('data')
//            ->where([
//                'id'   => [['in', [1, 2, 3]], ['between', '5,8'], 'or'],
//                'name' => ['like', '%think%'],
//            ])->limit(10)->select();
//        dump($result);
//
//        $result = Db::name('data')
//            ->where('id&status', '>', 0)
//            ->limit(10)
//            ->select();
//        dump($result);


        // tp3.2有，tp5没有？
//        $condition['name'] = 'thinkphp';
//        $condition['id'] = '1';
//        $condition['_logic'] = 'OR';

//        $result = Db::view('user','id,name,status')
//            ->view('profile',['name'=>'truename','phone','email'],'profile.user_id=user.id')
//            ->where('status',1)
//            ->order('id desc')
//            ->select();
//        dump($result);

        // find select方法可用于闭包查询
//        $result = Db::name('data')->select(function ($query) {
//            $query->where('name', 'like', '%think%')
//                ->where('id', 'in', '1,2,3')
//                ->limit(10);
//        });
//        dump($result);

        // 事先封装query方法
//        $query = new \think\db\Query;
//        $query->name('city')->where('name', 'like', '%think%')
//            ->where('id', 'in', '1,2,3')
//            ->limit(10);
//        $result = Db::select($query);
//        dump($result);

        // 获取某行表，某字段值
        // 获取id为8的data数据的name字段值
//        $name = Db::name('data')
//        ->where('id', 8)
//        ->value('name');
//        dump($name);

        // 获取data表的name列
//        $list = Db::name('data')
//        ->where('status', 1)
//        ->column('name');
//        dump($list);

        // 如果希望返回以id为索引的name列数据，可以改成：

        // 获取data表的name列 并且以id为索引
//        $list = Db::name('data')
//        ->where('status', 1)
//        ->column('name', 'id');
//        dump($list);

        // 聚合查询
        // 统计user表的最高分
//        $max = Db::name('score')
//        ->where('status', 1)
//        ->max('score');
//        dump($max);

        // 字符串查询 配合参数绑定 避免注入
//        $result = Db::name('data')
//            ->where('id > :id AND name IS NOT NULL', ['id' => 10])
//            ->select();
//        dump($result);

        // 日期查询
        // 日期查询对create_time字段类型没有要求，
        // 可以是int/string/timestamp/datetime/date中的任何一种，
        // 系统会自动识别进行处理。
//        $result = Db::name('user')
//            ->whereTime('create_time','between',['2017-2-8','2017-2-10'])
//            ->select();
//        dump($result);

        // 人性化日期查询 today,yesterday,week,last week
        // 获取上周的数据
//        $result = Db::name('user')
//        ->whereTime('create_time', 'last week')
//        ->select();
//        dump($result);

        // 分块查询
        // 没有主键情况下，指出查询的排序字段
        Db::name('user')
            ->where('status','>',0)
            ->chunk(3,function($list){
                // 处理3条记录
                foreach($list as $data){
                    // 返回false 则中断后续查询
                    return false;
                }
            },'id');


    }


}
