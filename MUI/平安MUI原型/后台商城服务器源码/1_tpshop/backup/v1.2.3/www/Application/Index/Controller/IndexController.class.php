<?php
/**
 * tpshop
 * ============================================================================
 * * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: IT宇宙人 2015-08-10 $
 */ 
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
    /*
     * 初始化操作
     */
    public function _initialize() {
        $this->public_assign();
    }    
    
    public function index(){ 
        $this->display();
    }    
    public function product(){ 
        $this->display();
    }        
    public function download(){ 
        $this->display();
    }        
    public function error_page(){ 
        header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
/**
 * //Svn 提交后 tpshop 必须注意以下事项
// 1  index.php  define('APP_DEBUG',True); 改成false
// 2  config.php    'LOAD_EXT_CONFIG'=>'db,route', // 加载数据库配置文件 加上 route
// 3 config  'ERROR_PAGE'=>'/Index/Index/error_page.html',
// 4 Application\Runtime  删除缓存文件
// 5 chmod -Rf 777 /web/tpshop2/Public/upload     // 给上传文件夹加上可写权限
// 6 chmod -Rf 777 /web/tpshop2/Application/Runtime     // 给缓存文件夹加上可写权限
 */        
        $this->display();
    }        
    /**
     * 保存公告变量到 smarty中 比如 导航 
     */
    public function public_assign()
    {
        
       $tpshop_config = array();
       $tp_config = M('config')->cache(true,TPSHOP_CACHE_TIME)->select();       
       foreach($tp_config as $k => $v)
       {
       	  if($v['name'] == 'hot_keywords'){
       	  	 $tpshop_config['hot_keywords'] = explode('|', $v['value']);
       	  }       	  
          $tpshop_config[$v['inc_type'].'_'.$v['name']] = $v['value'];
       }                                         
       $this->assign('tpshop_config', $tpshop_config);          
    }      
    
    /**
     * 授权查询
     */
    public function  b()
    {
        if(IS_POST)
        {
            $this->success('服务器繁忙, 请稍后查询...');
            exit();
        }
            
        $this->display();
    }
    
    public function mquery(){
    	$domain = I('domain');
    	if($domain){
    		$url = "http://service.tp-shop.cn/index.php/SoubaoAdmin/Member/mquery";
    		$res = httpRequest($url,'post',array('domain'=>trim($domain)));
    		exit($res);
    	}else{
    		exit(json_encode(array('status'=>0,"请输入查询域名")));
    	}
    }
    
}