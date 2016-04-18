<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/17
 * Time: 23:54
 */
$obj = new Go;                                           //类实例化
$tip_data = $obj->tip;                                   //提示信息
$len = count($tip_data);                                 //提示信息长度
for($i = 0;$i<$len;$i++){                                //遍历提示信息
    echo '<ul><li><em>'.$tip_data[$i].'</em></li></ul>'; //打印提示信息
}

/**
 * Class Goo
 * 接收登录页面提交的帐号密码并连接数据库查询,并返回查询结果.
 */
class Go
{   /*属性:提示*/
    public $tip=[];
    /*构造函数:当数据以POST传输时,_run运行,当以POST以外传输时,返回false.*/
    public function __construct()
    {
        if($_POST){
            header("Content-type:text/html;charset:utf-8");
            $this->_run();
        }else{
            $this->tip[] = '没有任何提交内容';
        }
    }
    /*方法:连接数据库,执行查询操作,根据查询结果返回对应*/
    private function _run(){
        /*连接数据库*/
        $conn = mysqli_connect('127.0.0.1','root','','test');
        if(mysqli_connect_errno()){
            $this->tip[] = '数据库连接失败'.'<p />'.'错误编号:'.mysqli_connect_errno().'详细信息:'.mysqli_connect_error().'<p />';
            return false;
        }else{
            $this->tip[] = '数据库连接成功';
        }
        /*设置数据库编码*/
        mysqli_set_charset($conn,'utf8');
        /*接收用户名和密码*/
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        /*查询是否存在相应记录*/
        $sql = "select id from user_data where name = '$user' and password = '$pass'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        /*有相应记录*/
        if($num>0){
            $this->tip[] = '成功登录!'.$user.'<p />';
        }else{
            $this->tip[] = '输入的用户名或密码有误!'.'<p />'."点<a href=\"login.html\">这里</a>重新登录".'<p />'."如果还没有注册,点<a href=\"reg.html\">这里</a>进行注册";
            return false;
        }
    }
}