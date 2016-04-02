<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/3/9
 * Time: 23:56
 */
echo '当前正在执行的脚本文件为：'.$_SERVER["PHP_SELF"].'<p>';
echo '当前服务器的IP地址为：'.$_SERVER["SERVER_ADDR"].'<p>';
echo '当前正在浏览的客户机IP地址为：'.$_SERVER["REMOTE_ADDR"].'<P>';
echo '当前系统的CPU核心为：'.$_ENV["NUMBER_OF_PROCESSORS"].'<P>';
echo '当前系统的cpu标识为：'.$_ENV["PROCESSOR_IDENTIFIER"].'<P>';
echo '当前系统可直接运行的文件扩展名为：'.$_ENV["PATHEXT"];
