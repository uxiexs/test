<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/17
 * Time: 14:11
 */

$str = "mail@sohu.com";
$patten = '/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/';
$result = array();
preg_match_all($patten,$str,$result);
var_dump($result);