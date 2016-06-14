<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/6/14
 * Time: 16:12
 */
$unique_id = '123456';    //手机端唯一标识
$username = '18670953667';//用户名
$password = '870125xx';   //密码
$api_secret_key = 'uxeix';//app 调用的签名秘钥
$time = time();           //时间撮
echo '时间戳：'.$time;
echo '<p/>';
echo '签名秘钥：'.md5($password.$unique_id.$username.$time.$api_secret_key); //加密