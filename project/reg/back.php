<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/5
 * Time: 9:03
 * 获取前台表单所提交的内容并显示
 */
var_dump($_POST);
if($_POST){
    echo '提交内容为：<p />';
    /*使用$_POST预定义变量获取用户输入*/
    echo '用户名:'.$_POST['user'].'<p />';
    echo '密码:'.$_POST['pass'].'<p />';
    echo '性别:'.$_POST['sex'].'<p />';
    echo '学历:'.$_POST['degree'].'<p />';
    echo "业余爱好:";
    /*获取爱好(数组)长度,遍历数组内容*/
    $len = count($_POST['fav']);
    for($i = 0; $i<$len ;$i++){
        /*为除最后一位数组元素以外的所有数组元素添加分隔符','*/
        if($i<$len-1){
            $_POST['fav'][$i] = $_POST['fav'][$i].',';
        }
        echo $_POST['fav'][$i];
    }
    echo '<p />';
    echo '其它事项:'.$_POST['other'].'<p />';
    echo '隐藏元素:'.$_POST['hide'].'<p />';
}else{
    echo '没有任何提交内容!<p />';
}
echo "<a href='reg.html'>返回</a>";
?>
<ul>
    <li><em>该页面的作用是获取前面表单所提交的内容并显示</em></li>
</ul>


