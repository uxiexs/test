<?php

/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/15
 * Time: 23:38
 */
class pyramid
{
    var $num; //类的属性 *的数量

    public function  buildPramid(){
        for($i=0;$i<$this->num;$i++){ //外层循环 【row】
            for($k=0;$k<($this->num-$i);$k++) echo "&#8194"; // 内层循环 输出空格
            for($j=0;$j<($i*2+1);$j++){ //内层循环 输出*
                echo '*';
            }
            echo '<br/ >';

        }
    }
}

$obj=new pyramid(); //实例化类
$obj->num = 10;     //类属性赋值
$obj->buildPramid();//类方法执行