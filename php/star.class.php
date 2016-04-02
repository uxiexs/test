<?php

/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/15
 * Time: 23:17
 */
class star
{
    var $num; //类属性
 public function BulidStar(){ //类方法
     for($i=0;$i<$this->num;$i++){ //外层循环 【行】
         for($j=0;$j<$i+1;$j++){ //内层循环 【列】
             echo '*'; //输出*
         }
         echo '<br />';
     }
 }
}

$obj = new star(); //实例化类
$obj->num = 5;     //为类属性赋值
$obj->BulidStar(); //执行类的方法