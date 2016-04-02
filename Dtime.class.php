<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/16
 * Time: 23:10
 */

namespace test\php; //命名空间：在test文件夹下的php文件夹下的文件
error_reporting(0); //禁用php的提示
/**
 * Class Dtime
 * @package test\php
 * 功能：求两个日期的差数
 * 思路：先用strtotime将日期字符串转换成unix时间戳，然后相减，除以一个的秒数86400即可得出相差的天数
 */
class Dtime //类
{
    public function Dtime($date1,$date2){ //方法
        $time1 = strtotime($date1);
        $time2 = strtotime($date2);
        return ($time2-$time1)/86400; //返回值
    }
}
$obj = new Dtime(); //类实例化
$date1 = '2016-1-1';
$date2 = '2016-12-31';
echo "$date1".与."$date2".'之间的差数为：'.$obj->Dtime($date1,$date2).'天'; //执行类方法 输入日期参数