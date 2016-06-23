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
 * Author: 当燃      
 * Date: 2015-10-09
 */

namespace Admin\Controller;
use Admin\Logic\GoodsLogic;
class SystemController extends BaseController{
	
	/*
	 * 配置入口
	 */
	public function index()
	{          
		/*配置列表*/
		$group_list = array('shop_info'=>'网站信息','basic'=>'基本设置','sms'=>'短信设置','shopping'=>'购物流程设置','smtp'=>'邮件设置','water'=>'水印设置');		
		$this->assign('group_list',$group_list);
		$inc_type =  I('get.inc_type','shop_info');
		$this->assign('inc_type',$inc_type);
		$this->assign('config',tpCache($inc_type));//当前配置项
		$this->display($inc_type);
	}
	
	/*
	 * 新增修改配置
	 */
	public function handle()
	{
		$param = I('post.');
		$inc_type = $param['inc_type'];
		//unset($param['__hash__']);
		unset($param['inc_type']);
		tpCache($inc_type,$param);
		$this->success("操作成功",U('System/index',array('inc_type'=>$inc_type)));
	}        
        
       /**
        * 自定义导航
        */
    public function navigationList(){
           $model = M("Navigation");
           $navigationList = $model->order("id desc")->select();            
           $this->assign('navigationList',$navigationList);
           $this->display('navigationList');          
     }
    
    /**
     * 添加修改编辑 前台导航
     */
    public  function addEditNav(){                        
            $model = D("Navigation");            
            if(IS_POST)
            {
                    $model->create();
                    // $model->url = strstr($model->url, 'http') ? $model->url : "http://".$model->url; // 前面自动加上 http://
                    if($_GET['id'])
                        $model->save();
                    else
                        $model->add();
                    
                    $this->success("操作成功!!!",U('Admin/System/navigationList'));               
                    exit;
            }                    
           // 点击过来编辑时                 
           $id = $_GET['id'] ? $_GET['id'] : 0;       
           $navigation = $model->find($id);      
           
           // 系统菜单
           $GoodsLogic = new GoodsLogic();
           $cat_list = $GoodsLogic->goods_cat_list();
           $select_option = array();                       
            foreach ($cat_list AS $key => $value)
            {
                    $strpad_count = $value['level']*4;
                    $select_val = U("/Home/Index/goodsList",array('id'=>$key));
                    $select_option[$select_val] = str_pad('',$strpad_count,"-",STR_PAD_LEFT).$value['name'];                                        
            }           
           $system_nav = array(
               'http://www.tp-shop.cn' => 'tpshop官网',
               'http://www.dscxy.com' => '屌丝程序员网',
               'http://bbs.dscxy.com' => '屌丝程序员论坛',
               'http://www.99soubao.com' => '搜豹公司',
           );           
           $system_nav = array_merge($system_nav,$select_option);
           $this->assign('system_nav',$system_nav);
           
           $this->assign('navigation',$navigation);
           $this->display('_navigation');
    }   
    
    /**
     * 删除前台 自定义 导航
     */
    public function delNav()
    {     
        // 删除导航
        M('Navigation')->where("id = {$_GET['id']}")->delete();   
        $this->success("操作成功!!!",U('Admin/System/navigationList'));
    }
	
    
    public function menu(){
    	$this->assign('tree',$this->tree());
    	$this->display();
    }
    
	public function create_menu(){
		$this->assign('tree',$this->tree());
		$action = I('get.action','add');
		$mod_id = I('get.mod_id',0);
		if($mod_id>0){
			$menu = D('system_module')->where("mod_id=$mod_id")->find();
			$this->assign('menu',$menu);
		}
		$this->assign('pid',$mod_id);		
		$this->assign('tree',$this->tree());
		$this->assign('action',$action);
		$this->display();
	}
	
	public function menuSave(){
		$data = I('post.');
		if($data['action'] == 'add'){
			if($data['mod_id']>0 || $data['parent_id']>0){
				$data['level'] = 2;
				$data['module'] = 'menu';				
			}else{
				$data['level'] = 1;
				$data['module'] = 'top';
			}
			unset($data['mod_id']);
			$r = D('system_module')->add($data);
		}
		if($data['action'] == 'edit'){
			$r = D('system_module')->where('mod_id='.$data['mod_id'])->save($data);
		}

		if($data['action'] == 'del'){
			$res = D('system_module')->where('parent_id='.$data['mod_id'])->select();
			if($res){
				$res = array('stat'=>'fail','msg'=>'要删除的菜单中含有子项目,请先移动或删除子项目');
				exit(json_encode($res));
			}else{
				$r = D('system_module')->where('mod_id='.$data['mod_id'])->delete();				
			}
		}
		
		if($r){	
			adminLog('管理系统菜单',__ACTION__);
			$res = array('stat'=>'ok');
		}else{
			$res = array('stat'=>'fail','msg'=>'操作失败');
		}
		exit(json_encode($res));
	}
	
	public function module(){
		$this->assign('tree',$this->tree());
		$this->display();
	}
	
	public function ctl_detail(){
		$mod_id = I('get.mod_id');		
		$tree = $this->tree();
		$rs = D('system_module')->order('mod_id ASC')->select();
		if($rs){
			foreach($rs as $k=>$v){
				if($v['parent_id'] == $mod_id && $v['module'] == 'module'){
					$modules[$k] = $v;
				}
			}
			$this->assign('pid',$mod_id);
			$this->assign('modules',$modules);
		}
		$this->assign('menu_tree',$this->tree());
		$this->display();
	}

	public function ctlSave(){
		$data = I('post.');
		$t = false;
		if($data['module']){
			foreach ($data['module'] as $k=>$v){
				$v['visible'] = empty($v['visible']) ? 0 : 1;
				$r = D('system_module')->where("mod_id=$k")->save($v);
				if($r) $t = $r;
			}
		}
				
		if($data['data']){
			foreach ($data['data'] as  $k=>$v){
				if($v['title'] && $v['ctl'] && $v['act']){
					$v['level'] = 3;
					$v['module'] = 'module';
					$v['orderby'] = $v['orderby'] ? $v['orderby'] : 50;
					$r = D('system_module')->add($v);
				}
			}
		}
		if($r || $t){
			$res = array('stat'=>'ok');
		}else{
			$res = array('stat'=>'fail');
		}
		exit(json_encode($res));
	}
 
	
	public function tree()
	{
		$modules = array();
		$rs = D('system_module')->order('mod_id ASC')->select();
		if(is_array($rs)){
			foreach($rs as $row){
				$modules[$row['mod_id']] = $row;
			}		
		}
		if($modules){
			$tree = array();
			foreach($modules as $k=>$v){
				if($v['module'] == 'top'){
					$tree[$k] = $v;
				}
			}
			foreach($modules as $k=>$v){
				if($v['module'] == 'menu'){
					$tree[$v['parent_id']]['menu'][$k] = $v;
				}
			}
			foreach($modules as $k=>$v){
				if($v['module'] == 'module'){
					$ppk = $modules[$v['parent_id']]['parent_id'];
					$tree[$ppk]['menu'][$v['parent_id']]['menu'][$k] = $v;
				}
			}
			return $tree;
		}
		return false;
	}
	
	public function refreshMenu(){
		$pmenu = $arr = array();
		$rs = M('system_module')->where('level>1 AND visible=1')->order('mod_id ASC')->select();
		foreach($rs as $row){
			if($row['level'] == 2){
				$pmenu[$row['mod_id']] = $row['title'];//父菜单
			}
		}

		foreach ($rs as $val){
			if($row['level']==2){
				$arr[$val['mod_id']] = $val['title'];
			}
			if($row['level']==3){
				$arr[$val['mod_id']] = $pmenu[$val['parent_id']].'/'.$val['title'];
			}
		}
		return $arr;
	}
        
        /**
         * 清空系统缓存
         */
        public function cleanCache(){              
             //$img_arr = glob('./Public/upload/goods/thumb/*'); //$aa = scandir('./Public/upload/goods/thumb/');
             //foreach($img_arr as $key => $val)
             //   unlink ($val);// 删除缩略图
             delFile('./Public/upload/goods/thumb');// 删除缩略图
             if(delFile(RUNTIME_PATH))// 删除缓存 删除 \Application\Runtime 下面的所有文件
                $this->success("清除成功!!!");
             else
                $this->error("操作完成!!");
        }
	
}