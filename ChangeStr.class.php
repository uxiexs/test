<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/17
 * Time: 0:08
 */

namespace test\php; //命名空间：test文件夹下的php文件夹下的文件

/**
 * Class str
 * @package test\php
 * 功能：字符串'open_door'转换成：'OpenDoor'
 * 思路：先判断字符串内是否含有'_',然后以‘_’分隔字符串为数组，再for循环数组内的元素，将第一个元素的字母大写，最后将这些元素再拼接成字符串返回。
 * 知识点：strstr:查找字符串的首次出现 explod:此函数返回由字符串组成的数组 implode:把数组元素组合为字符串：
 */

class ChangeStr{
    var $string;                               //属性
    public function __construct($str){         //该类被实例化时自动加载
        $this->string = $str;                  //字符串由外部传入
        echo $this->get_str();                 //执行get_str()方法 并打印
    }

    private function get_str(){              //方法
        if (strstr($this->string,'_')){        //如果字符串内含有'_'字符
            $arr = explode('_',$this->string); //将'_'分隔成不同的字符串放入数组
            for($i = 0; $i<count($arr);$i++){  //循环数组
                $arr[$i] = ucfirst($arr[$i]);  //将数组内的每个元素（字符串）的首字母大写
            }
            return $str = implode("",$arr);    // 将数组内的元素拼接成一个字符串 并作为函数返回值
        }else{
            return '该字符串不在转换范围';
        }
    }

}

new ChangeStr('open_door');//实例化类 传参
