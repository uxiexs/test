<?php

/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/15
 * Time: 15:44
 */
class CreateTable
{
    var $tip=array();

    public function __construct()
    {
        header("Content-type: text/html; charset=utf-8");
        /*连接数据库*/
        $connect = mysqli_connect('127.0.0.1', 'root', "", 'test');
        if (!$connect) {
            return $this->tip[] =  '连接数据库失败:' . mysql_connect_error();
        } else {
            $this->tip[] = '连接本地数据库成功' . '<p />';
        }
        /*设置数据库编码*/
        mysqli_set_charset($connect, 'utf8');
        /*检索数据表是否已经存在*/
        $result = mysqli_query($connect, "show tables like 'user_data'");
        $row = mysqli_fetch_row($result);
        if(!$row){
            /*拼接SQL语句*/
            $sql = "create table if not exists `user_data`(
            `id` int(5) not null auto_increment PRIMARY KEY COMMENT'主键',
            `name` char(10) not null default '' COMMENT '名字',
            `password` char(12) not null default '' COMMENT '密码',
            `age` int(3) not null default 0 COMMENT '年龄',
            `sex` char(2) not null default '男' COMMENT '性别',
            `mail` char(50) not null default '' COMMENT '邮箱',
            `qq` char(12) not null default '' COMMENT 'QQ号码',
            `degree` char(50) not null default '' COMMENT '学历',
            `fav` char(50) not null default '' COMMENT'兴趣'
            )ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户注册信息表'";
            /*执行SQL语句*/
            $result = mysqli_query($connect, $sql);
            //$row = mysqli_fetch_row($result);
            //var_dump($row);
            /*连接状态*/
            if ($result) {
                $this->tip[] =  '成功在test数据库中创建用户信息表' . '<p />';
            } else {
                return $this->tip[] =  '建表时出现错误' . '<br />' . '错误代码:' . mysqli_errno($connect) . '<br />' . '错误信息:' . mysqli_error($connect) . '<p />';
            }
        }else{
            return $this->tip[] = '用户信息数据表已存在';
        }
    }
}
$obj = new CreateTable;
$data = $obj->tip;
$num = count($data);
for($i = 0; $i<$num ; $i++){
    echo $data[$i];
}
?>
<ul>
    <li><em>执行该代码,可创建用户数据表,这样就可以把用户注册信息添加到表user_data中了</em></li>
    <li><em>在用户注册后台处理页面,首先要获取前台输入的内容,然后连接到数据库中与已经注册的用户进行比对,如果出现重名用户则注册失败,否则将
            用户提交的各项内容插入到用户表中</em></li>
</ul>
