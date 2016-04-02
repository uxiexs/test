<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/16
 * Time: 23:48
 */

/*将字符串open_door转化为OpenDoor，将abc_bcd_cde转化成AbcBcdCde*/

    function str($string)
    {
            if (strstr($string, "_")) {
                $arr = explode("_", $string);
                for ($i = 0; $i < count($arr); $i++) {
                    $arr[$i] = ucfirst($arr[$i]);
                }
                $str = implode("", $arr);
                return $str;

//            } else {
//
//                $array = str_split($string);
//
//                for ($i = 0; $i < count($array); $i++) {
//
//                    $str = ucfirst($array[$i]);
//
//                    if ($str == $array[$i]) {
//
//                        $array[$i] = "_" . strtolower($array[$i]);
//
//                    }
//
//                }
//
//                $str1 = implode("", $array);
//
//                return $str1;
//
            }


    }
echo str('open_door');