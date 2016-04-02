<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/17
 * Time: 13:33
 */

namespace test\php;

/**
 * Class CheckEmail
 * @package test\php
 * 正则表达式：可验证邮箱，网址，电话/ 表达式和字符串可自定义。
 */
class CheckEmail
{
 var $str,          //字符串
     $pattern,       //表达式
     $result = [],  //初始空数组
     $flag = false; //初始为false,若result不为空数组，则为true,表示验证成功

    public function __construct($str,$pattern) //自动加载
    {
        $this->str = $str; //外部传参
        $this->pattern= $pattern;
        echo $this->getEmail(); //执行getEmail()
    }
    protected function getEmail(){
        preg_match($this->pattern,$this->str,$this->result);
        if($this->result){
            return '验证成功，邮箱为：'.$this->result[0];
        }else{
            return '验证失败,邮箱不合法';
        }
    }
}
$str = $_POST['email'];
$pattern = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
new CheckEmail($str,$pattern);

