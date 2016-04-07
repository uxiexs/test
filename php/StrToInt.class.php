<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/7
 * Time: 11:12
 */

namespace test\php;

/**
 * Class StrToInt
 * @package test\php
 * 代码功能：字符串转换成整型或浮点型
 */
class StrToInt
{
    public $action;

    /**
     * StrToInt constructor. 构造函数
     * @param $action 外部传参 执行类方法
     */
    public function __construct($action)
    {
        $this->action = $action;
        $this->_run();
    }

    /**
     * 功能：字符串转换成整型或浮点型
     * @return int float
     */
    protected  function _run(){
       return $this->action = $this->action + 0;
    }
}
//传值
$action = isset($_POST['action'])?$_POST['action']:'';
echo '传值前数据类型：';
var_dump($action);
echo '数据处理后类型：';
$obj = new StrToInt($action);
var_dump($obj->action);
?>
<form action="" method="post">
    <input type="text" name="action">
    <input type="submit" value="提交">
    <ul>
        <li><em>代码：</em>
        <textarea cols="60" rows="22">
class StrToInt
{
    public $action;

    /**
     * StrToInt constructor. 构造函数
     * @param $action 外部传参 执行类方法
     */
    public function __construct($action)
    {
        $this->action = $action;
        $this->_run();
    }

    /**
     * 功能：字符串转换成整型或浮点型
     * @return int float
     */
    protected  function _run(){
       return $this->action = $this->action + 0;
    }
}
        </textarea>
        </li>
        <li><em>string转int float，只需要+0即可</em></li>
    </ul>
</form>
