<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/9
 * Time: 23:36
 */
/**
 * 该函数封装的功能是：以数组的形式输出系统中的所有变量至页面上
 */
function getCons(){
    $all =get_defined_constants(); //使用该函数将以数组形式返回系统中的所有变量
    var_dump($all); //打印
}
getCons(); //执行函数
