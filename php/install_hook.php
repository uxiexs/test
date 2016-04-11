<?php
/**
 * Created by PhpStorm.
 * User: uxeix
 * Date: 2016/4/9
 * Time: 9:56
 */
//将下列代码放在onethink的插件的install中 可安装钩子
$hookModel = M('hooks');
$where['name'] = 'Advs';
$hookTest = $hookModel->where($where)->find();
if (empty($hookTest)) {
    $data = array(
        'name' => 'Advs',
        'description' => 'Advs 插件所需钩子',
        'type' => 1,
        'update_time' => NOW_TIME,
        'addons' => 'Advs'
    );
    $hookTest = $hookModel->add($data);
    if (flase === $hookTest) {
        session('addons_install_error', ',Advs 钩子创建错误，请检查是否重复。');
        return false;
    }
}