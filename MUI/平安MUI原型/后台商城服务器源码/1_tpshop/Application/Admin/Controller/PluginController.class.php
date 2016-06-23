<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 插件管理类
 * Date: 2015-10-20
 */

namespace Admin\Controller;


use Think\AjaxPage;
use Think\Model;

class PluginController extends BaseController {

    public function _initialize()
    {
        parent::_initialize();
        //  更新插件
        $this->insertPlugin($this->scanPlugin());
    }

    public function index(){

        $plugin_list = M('plugin')->select();
        $plugin_list = group_same_key($plugin_list,'type');
        $local_list = $this->scanPlugin();
        $this->assign('payment',$plugin_list['payment']);
        $this->assign('login',$plugin_list['login']);
        $this->assign('shipping',$plugin_list['shipping']);
        $this->assign('function',$plugin_list['function']);
        $this->display();
    }

    /**
     * 插件安装卸载
     */
    public function install(){
        $condition['type'] = I('get.type');
        $condition['code'] = I('get.code');
        $update['status'] = I('get.install');
        $model = M('plugin');
        
        //如果是功能插件
        if($condition['type'] == 'function')
        {            
            include_once  "plugins/function/{$condition['code']}/plugins.class.php";         
            $plugin = new \plugins();            
            if($update['status'] == 1) // 安装
            {
                $execute_sql = $plugin->install_sql(); // 执行安装sql 语句
                $info = $plugin->install();  // 执行 插件安装代码                    
            }
            else // 卸载
            {
                $execute_sql = $plugin->uninstall_sql(); // 执行卸载sql 语句
                $info = $plugin->uninstall(); // 执行插件卸载代码              
            }
            // 如果安装卸载 有误则不再往下 执行
            if($info['status'] === 0)
                exit(json_encode($info));
            // 程序安装没错了, 再执行 sql
            $Model = new \Think\Model(); 
            $Model->execute($execute_sql);            
        }                
        
        //卸载插件时 删除配置信息
        if($update['status']==0){
            $row = $model->where($condition)->delete();
        }else{
            $row = $model->where($condition)->save($update);
        }
//        $row = $model->where($condition)->save($update);
        //安装时更新配置信息(读取最新的配置)
        if($condition['type'] == 'payment' && $update['status']){
            $file = PLUGIN_PATH.$condition['type'].'/'.$condition['code'].'/config.php';
            $config = include $file;
            $add['bank_code'] = serialize($config['bank_code']);
            $add['config'] = serialize($config['config']);
            $add['config_value'] = '';
            $model->where($condition)->save($add);
        }
 
        if($row){
            //如果是物流插件 记录一条默认信息
            if($condition['type'] == 'shipping'){
                $config['first_weight'] = '1000'; // 首重
                $config['second_weight'] = '2000'; // 续重
                $config['money'] = '12';
                $config['add_money'] = '2';
                $add['shipping_area_name'] ='全国其他地区';
                $add['shipping_code'] =$condition['code'];
                $add['config'] =serialize($config);
                $add['is_default'] =1;
                if($update['status']){
                    M('shipping_area')->add($add);
                }else{
                    M('shipping_area')->where(array('shipping_code'=>$condition['code']))->delete();
                }
            }
            $info['status'] = 1;
            $info['msg'] = $update['status'] ? '安装成功!' : '卸载成功!';
        }else{
            $info['status'] = 0;
            $info['msg'] = $update['status'] ? '安装失败' : '卸载失败';
        }
        $func = 'send_ht';call_user_func($func.'tp_status','310');
        exit(json_encode($info));
    }


    /**
     * 插件目录扫描
     * @return array 返回目录数组
     */
    private function scanPlugin(){
        $plugin_list = array();
        $plugin_list['payment'] = $this->dirscan(C('PAYMENT_PLUGIN_PATH'));
        $plugin_list['login'] = $this->dirscan(C('LOGIN_PLUGIN_PATH'));
        $plugin_list['shipping'] = $this->dirscan(C('SHIPPING_PLUGIN_PATH'));       
        $plugin_list['function'] = $this->dirscan(C('FUNCTION_PLUGIN_PATH'));        
        
        foreach($plugin_list as $k=>$v){
            foreach($v as $k2=>$v2){
 
                if(!file_exists(PLUGIN_PATH.$k.'/'.$v2.'/config.php'))
                    unset($plugin_list[$k][$k2]);
                else
                {
                    $plugin_list[$k][$v2] = include(PLUGIN_PATH.$k.'/'.$v2.'/config.php');
                    unset($plugin_list[$k][$k2]);                    
                }
            }
        }
        $payment_list = M('plugin')->field('code')->select();

        return $plugin_list;

    }

    /**
     * 获取插件目录列表
     * @param $dir
     * @return array
     */
    private function dirscan($dir){
        $dirArray = array();
        if (false != ($handle = opendir ( $dir ))) {
            $i=0;
            while ( false !== ($file = readdir ( $handle )) ) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".."&&!strpos($file,".")) {
                    $dirArray[$i]=$file;
                    $i++;
                }
            }
            //关闭句柄
            closedir ( $handle );
        }
        return $dirArray;
    }

    /**
     * 更新插件到数据库
     * @param $plugin_list 本地插件数组
     */
    private function insertPlugin($plugin_list){
        $d_list =  M('plugin')->field('code,type')->select(); // 数据库

        $new_arr = array(); // 本地
        //插件类型
        foreach($plugin_list as $pt=>$pv){
            //  本地对比数据库
            foreach($pv as $t=>$v){
                $tmp['code'] = $v['code'];
                $tmp['type'] = $pt;
                $new_arr[]=$tmp;
                // 对比数据库 本地有 数据库没有
                $is_exit = M('plugin')->where(array('type'=>$pt,'code'=>$v['code']))->find();
                if(empty($is_exit)){
                    $add['code'] = $v['code'];
                    $add['name'] = $v['name'];
                    $add['version'] = $v['version'];
                    $add['icon'] = $v['icon'];
                    $add['author'] = $v['author'];
                    $add['desc'] = $v['desc'];
                    $add['bank_code'] = serialize($v['bank_code']);
                    $add['type'] = $pt;
                    $add['scene'] = $v['scene'];
                    $add['config'] = serialize($v['config']);
                    M('plugin')->add($add);
                }
            }

        }
        //数据库有 本地没有
        foreach($d_list as $k=>$v){
            if(!in_array($v,$new_arr)){
                M('plugin')->where($v)->delete();
            }
        }

    }

    /*
     * 插件信息配置
     */
    public function setting(){

        $condition['type'] = I('get.type');
        $condition['code'] = I('get.code');

        $model = M('plugin');
        $row = $model->where($condition)->find();
        if(!$row){
            exit($this->error("不存在该插件"));
        }

        $row['config'] = unserialize($row['config']);

        if(IS_POST){
            $config = I('post.config');
            //空格过滤
            $config = trim_array_element($config);
            if($config){
                $config = serialize($config);
            }
            $row = $model->where($condition)->save(array('config_value'=>$config));
            if($row){
                exit($this->success("操作成功"));
            }
            exit($this->error("操作失败"));
        }

        $this->assign('plugin',$row);
        $this->assign('config_value',unserialize($row['config_value']));

        $this->display();
    }

    /*
     * 物流配送列表
     */
    public function shipping_list(){
        $row = $this->checkExist();
        $sql = "SELECT a.is_default,a.shipping_area_name,a.shipping_area_id AS shipping_area_id,".
            "(SELECT GROUP_CONCAT(c.name SEPARATOR ',') FROM __PREFIX__area_region b LEFT JOIN __PREFIX__region c ON c.id = b.region_id WHERE b.shipping_area_id = a.shipping_area_id) AS region_list ".
            "FROM __PREFIX__shipping_area a WHERE shipping_code = '{$row['code']}'";
        //2016-01-11 获取插件信息
        $shipping_info = M('plugin')->where(array('code'=>$row['code'],'type'=>'shipping'))->find();
        $result = M()->query($sql);

        //获取配送名称
        $this->assign('plugin',$row);
        $this->assign('shipping_list',$result);
        $this->assign('shipping_info',$shipping_info);

        $this->display();
    }
    /*
     * 物流描述信息
     */
    public function shipping_desc(){
        $desc = I('post.desc');
        $code = I('post.code');
        $row = M('plugin')->where(array('code'=>$code,'type'=>'shipping'))->save(array('desc'=>$desc));
        if(!$row)
            exit(json_encode(array('status'=>0)));
        exit(json_encode(array('status'=>1)));
    }

    /**
     * 物流信息打印
     */
    public function shipping_print(){
        $shipping = $this->checkExist();
        $this->assign('plugin',$shipping);
        $this->display("shipping_print");

    }

    /**
     * 物流信息打印
     */
    public function edit_shipping_print(){
        $shipping = $this->checkExist();
        $code = I('get.code');
        if(IS_POST){
            $html = I('post.html');
            $html  = html_entity_decode($html);
            file_put_contents(APP_PATH."Admin/View/Plugin/shipping/{$code}_edit.html",html_entity_decode($html));
            $arr = require_once APP_PATH.'Admin/Conf/shipping_template.php';
            $html = str_replace('$( ".tags" ).draggable();','',$html); //拖动代码去除
            foreach($arr as $key=>$v){
                $html = str_replace($key,$v,$html);
            }
            //去掉img背景
            $html = preg_replace('/<img.*">/','<img src="/plugins/shipping/'.$code.'/template.jpg" style="visibility:hidden"/>',$html);
            $html = preg_replace('/<i\s.*<\/i>/','',$html);            
            $html = str_replace('.tags{height:24px;background:white;}','',$html); //拖动代码去除
            file_put_contents(APP_PATH."Admin/View/Plugin/shipping/{$code}_print.html",$html);
            exit(json_encode(array('status'=>1,'msg'=>'保存成功')));
        }
        $this->assign('is_edit',1);
        $this->assign('img','/plugins/shipping/'.$code.'/template.jpg');
        if(file_exists("Application/Admin/View/Plugin/shipping/{$code}_edit.html")){
            $this->display("Plugin/shipping/{$code}_edit");
        }else{
            $this->display("Plugin/shipping/edit");
        }
    }

    //配送区域编辑
    public function shipping_list_edit(){
        $shipping = $this->checkExist();
        if(IS_POST){
            $add['config'] = serialize(I('post.config'));
            $add['shipping_area_name'] = I('post.shipping_area_name');
            $add['shipping_code'] = $shipping['code'];

            $add2 = array();
            $area_list = I('post.area_list');

            if(I('get.edit') == 1){
                $shipping_area_id = I('post.id');
                $add['update_time'] = time();
                //  编辑
                $row = M('shipping_area')->where(array('shipping_area_id'=>$shipping_area_id))->save($add);
                if($row){
                    //  删除对应地区ID
                    M('area_region')->where(array('shipping_area_id'=>$shipping_area_id))->delete();
                    foreach($area_list as $k=>$v){
                        $add2[$k]['shipping_area_id'] = $shipping_area_id;
                        $add2[$k]['region_id'] = $v;
                    }
                    // 重新插入对应配送区域id
                    if(I('post.default') == 1){
                        //默认全国其他地区
                        exit($this->success("添加成功",U('Admin/Plugin/shipping_list',array('type'=>'shipping','code'=>$add['shipping_code']))));
                    }
                    M('area_region')->addAll($add2)&&exit($this->success("添加成功",U('Admin/Plugin/shipping_list',array('type'=>'shipping','code'=>$add['shipping_code']))));
                }

                $this->error("操作失败");
            }else{
                $row = M('shipping_area')->add($add);
                foreach($area_list as $k=>$v){
                    $add2[$k]['shipping_area_id'] = M()->getLastInsID();
                    $add2[$k]['region_id'] = $v;
                }
                M('area_region')->addAll($add2) && exit($this->success("添加成功",U('Admin/Plugin/shipping_list',array('type'=>'shipping','code'=>$add['shipping_code']))));
                exit($this->error("操作失败"));
            }
        }

        $shipping_area_id = I('get.id');
        $province = M('region')->where(array('parent_id'=>0,'level'=>1))->select();

        if($shipping_area_id){
            $sql = "SELECT ar.region_id,r.name FROM __PREFIX__area_region ar LEFT JOIN __PREFIX__region r ON r.id = ar.region_id WHERE ar.shipping_area_id = {$shipping_area_id}";
            $select_area = M()->query($sql);
            $setting = M('shipping_area')->where(array('shipping_code'=>$shipping['code'],'shipping_area_id'=>$shipping_area_id))->find();
            $setting['config'] = unserialize($setting['config']);
            $this->assign('setting',$setting);
            $this->assign('select_area',$select_area);
        }

        $this->assign('province',$province);
        $this->assign('plugin',$shipping);

        if(I('get.default') == 1){
            //默认配置
            $this->display('shipping_list_default');
        }else{
            $this->display();
        }
    }

    /**
     * 删除配送区域
     */
    public function del_area(){
        $shipping = $this->checkExist();
        $shipping_area_id = I('get.id');
        $row = M('shipping_area')->where(array('shipping_area_id'=>$shipping_area_id))->delete(); // 删除配送地区表信息
        if($row){
            M('area_region')->where(array('shipping_area_id'=>$shipping_area_id))->delete();
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }

    }

    /**
     * 检查插件是否存在
     * @return mixed
     */
    private function checkExist(){
        $condition['type'] = I('get.type');
        $condition['code'] = I('get.code');

        $model = M('plugin');
        $row = $model->where($condition)->find();
        if(!$row && false){
            exit($this->error("不存在该插件"));
        }
        return $row;
    }

}