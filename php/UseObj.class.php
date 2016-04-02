<?php

/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/11
 * Time: 19:35
 */
class UseObj
{   //属性
    var $host,
        $user,
        $pass,
        $database;
    //方法
    public function mes(){
        return '主机：'.$this->host.'<p>'.'账号：'.$this->user.'<p>'.'密码：'.$this->pass.'<p>'.'数据库：'.$this->database;
    }
}
//实例化类
$obj = new UseObj();
var_dump($obj);
//给属性赋值
$obj->host='localhost';
$obj->user='root';
$obj->pass='123456';
$obj->database='member';
//执行类的方法
echo $obj->mes();
