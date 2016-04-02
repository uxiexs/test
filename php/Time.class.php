<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/2
 * Time: 15:23
 */

namespace test\php;

/**
 * Class Time
 * @package test\php
 * 获取当前时间
 */
class Time
{
    public function __construct()
    {
        $this->_getTime();
    }

    //获取时间
    protected function _getTime(){
        $t = date('Y-m-d H:i:s',time());
        echo '当前系统时间：'.$t;
    }
}
new Time();