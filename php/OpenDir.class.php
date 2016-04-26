<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/19
 * Time: 22:57
 */

namespace test\php;

$dir_name = 'weixin'; //目录名
$obj = new OpenDir($dir_name); //实例化
$tip_data = $obj->tip; //提示信息
$len = count($tip_data); //提示信息长度
for($i = 0;$i<$len;$i++){
    echo "<ul><li><em>".$tip_data[$i]."</em></li></ul>";
}
class OpenDir
{
    public $dir_name, //目录名
           $tip=[];   //提示信息

    public function __construct($dir_name)
    {
        $this->dir_name = $dir_name;
        $this->_run();
    }

    private function _run(){
        $this->tip[] = '使用readdir()浏览目录内容<p>';
        $dir = "$this->dir_name";
        $handle = opendir($dir);  //打开目录返回句柄
        $i = 0; //序号标记
        while($file_name = readdir($handle)){ //如果没有指向到最后,则执行
            if($file_name!="." and $file_name!=".."){//排除本级目录与上级目录
                $i++; //标记自增
                $this->tip[] = "第".$i."个文件为:".$file_name."<p>"; //输出文件名
            }
        }
        closedir($handle); //关闭目录
    }
}