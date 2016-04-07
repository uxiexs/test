<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/7
 * Time: 10:34
 */

namespace test\php;

/**
 * Class IntToStr 类名
 * @package test\php 路径
 * 以下代码功能：转换int float成string
 */
class IntToStr
{
    public $action;

    //构造函数：外部传参，执行_run方法
    public function __construct($action)
    {
        $this->action = $action;
        $this->_run();
    }

    /**
     * @return string 返回字符串
     */
    protected function _run()
    {
        return $this->action = $this->action . '';
    }
}

$action = isset($_POST['action']) ? ($_POST['action'] + 0) : 870125;
echo '转换前:';
var_dump($action);
echo '转换后:';
$obj = new IntToStr($action);
var_dump($obj->action);
?>
<form action="" method="post">
    <input type="text" name="action"><br/>
    <input type="submit" value="提交">
</form>
<ul>
    <li>代码：<textarea id="content" rows='25' cols='60' style="resize:none">
class IntToStr
{
    public $action;

    //构造函数：外部传参，执行_run方法
    public function __construct($action)
    {
        $this->action = $action;
        $this->_run();
    }

    /**
     * @return string 返回字符串
     */
    protected function _run()
    {
        return $this->action = $this->action . '';
    }

$action = 25; //声明变量为int类型
$obj = new IntToStr($action); //实例化类 并传参
var_dump($obj->action;) //打印类属性
}
        </textarea></li>
    <li><em>解析：int float 转 string只需要在后面连接一个空字符串即可 $int = $int.'';</em></li>
</ul>
