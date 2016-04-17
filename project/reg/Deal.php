<?php

/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/15
 * Time: 23:20
 */
$obj = new Deal;                                             //实例化建表类
$tip_data = $obj->tip;                                       //提示信息(数组)
$len = count($tip_data);                                     //获取数组长度
for ($i = 0; $i < $len; $i++) {                              //遍历提示信息(数组)
    echo "<ul><li><em>" . $tip_data[$i] . "</em></li></ul>"; //输出提示信息
}

class Deal
{
    var $tip = []; //提示信息

    public function __construct()
    {

        if ($_POST) {
            header("Content-type: text/html; charset=utf-8");
            return $this->_run();
        } else {
            $this->tip[] = '没有任何提交内容!';
            return false;
        }
    }

    /**
     * @return bool
     * 连接数据库,检查用户名,执行数据插入操作
     */
    private function _run()
    {
        /*连接数据库*/
        $connect = mysqli_connect('127.0.0.1', 'root', "", 'test');
        if (mysqli_connect_errno()) {
            $this->tip[] = '连接本地数据库失败:' . '<br />' . '错误编号:' . mysqli_connect_errno() . '<br />' . '错误信息:' . mysqli_connect_error();
            return false;
        } else {
            $this->tip[] = '连接本地数据库成功' . '<p />';
        }

        /*设置数据库编码*/
        mysqli_set_charset($connect, 'utf8');

        /*接收表单传递来的数据*/
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $mail = $_POST['mail'];
        $qq = $_POST['QQ'];
        $degree = $_POST['degree'];
        $fav = $_POST['fav'];
        $len = count($fav);
        $fav_z = "";

        /*遍历爱好*/
        for ($i = 0; $i < $len; $i++) {
            $fav_z = $fav_z . $fav[$i];
            if ($i < $len - 1) $fav_z = $fav_z . ',';
        }

        /*检测是否有同名用户*/
        $search_sql = "select count(*) from user_data where name = '$user'";
        $search_res = mysqli_query($connect, $search_sql);
        $row = mysqli_fetch_row($search_res);

        /*当没有同名用户时,执行数据库插入操作*/
        if ($row[0] > 0) {
            $this->tip[] = '注意:数据插入失败!&nbsp;原因:数据表中已有该用户名,请重新输入用户名!';
            return false;
        } else {
            $sql = "insert into `user_data`(`name`,`password`,`age`,`sex`,`mail`,`qq`,`degree`,`fav`)values('$user','$pass',$age,'$sex','$mail','$qq','$degree','$fav_z')";
            $res = mysqli_query($connect, $sql);
            if ($res) {
                $this->tip[] = '注册成功';
            } else {
                $this->tip[] = '注册失败' . '<br />' . '错误代码:' . mysqli_errno($connect) . '<br />' . '错误信息:' . mysqli_error($connect) . '<p />';
                return false;
            }
        }
    }
}

?>
<ul>
    <li><em>运行过程:注册前台页面reg.html中填入适当的内容,点击提交按钮将把内容提交到后台Deal.PHP</em></li>
    <li><em><?php echo '<p />' . "点击<a href='reg.html'>此处</a>返回上一页"; ?></em></li>
</ul>
