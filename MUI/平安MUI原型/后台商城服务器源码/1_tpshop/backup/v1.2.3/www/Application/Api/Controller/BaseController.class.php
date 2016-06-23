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
namespace Api\Controller;
use Think\Controller;
class BaseController extends Controller {
    public $http_url;
    public $user = array();
    public $user_id = 0;    
    /**
     * 析构函数
     */
    function __construct() {       
        parent::__construct();
        if($_REQUEST['test'] == '1')
        {
            $test_str = 'POST'.print_r($_POST,true);
            $test_str .= 'GET'.print_r($_GET,true);
            file_put_contents('a.html', $test_str);            
        }
        $this->user_id = I("user_id",0); // 用户id   
        if($this->user_id)
        {
            $this->user = M('users')->where("user_id = {$this->user_id}")->find();
        }        
   }    
    
    /*
     * 初始化操作
     */
    public function _initialize() {
                 
        $local_sign = $this->getSign();
        $api_secret_key = C('API_SECRET_KEY');        
        // 不参与签名验证的方法
        if(!in_array(strtolower(ACTION_NAME), array('getservertime','getconfig','alipaynotify','goodslist','search')))
        {        
            if($local_sign != $_POST['sign'])
            {    
                $json_arr = array('status'=>-1,'msg'=>'签名失败!!!','data'=>'' );
                exit(json_encode($json_arr));

            }
            if(time() - $_POST['time'] > 600)
            {    
                $json_arr = array('status'=>-1,'msg'=>'请求超时!!!','data'=>'' );
                exit(json_encode($json_arr));
            }
        }       
    }
    
    /**
     *  app 端万能接口 传递 sql 语句 sql 错误 或者查询 错误 result 都为 false 否则 返回 查询结果 或者影响行数
     */
    public function sqlApi()
    {            
        exit(array('status'=>-1,'msg'=>'使用万能接口必须开启签名验证才安全','result'=>'')); //  开启后注释掉这行代码即可
        
        C('SHOW_ERROR_MSG',1);
            $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
            $sql = $_REQUEST['sql'];                        
            try
            {
                 if(preg_match("/insert|update|delete/i", $sql))            
                     $result = $Model->execute($sql);
                 else             
                     $result = $Model->query($sql);
             }
             catch (\Exception $e)
             {
                 $json_arr = array('status'=>-1,'msg'=>'系统错误','result'=>'');
                 $json_str = json_encode($json_arr);            
                 exit($json_str);            
             }            
                         
            if($result === false) // 数据非法或者sql语句错误            
                $json_arr = array('status'=>-1,'msg'=>'系统错误','result'=>'');
            else
                $json_arr = array('status'=>1,'msg'=>'成功!','result'=>$result);
                                   
            $json_str = json_encode($json_arr);            
            exit($json_str);            
    }

    /**
     * 获取全部地址信息
     */
    public function allAddress(){
        $data =  M('region')->select();
        $json_arr = array('status'=>1,'msg'=>'成功!','result'=>$data);
        $json_str = json_encode($json_arr);
        exit($json_str);
    }

    /**
     * app端请求签名
     * @return type
     */
    protected function getSign(){
        header("Content-type:text/html;charset=utf-8");
        $data = $_POST;        
        unset($data['time']);    // 删除这两个参数再来进行排序     
        unset($data['sign']);    // 删除这两个参数再来进行排序
        ksort($data);
        $str = implode('', $data);        
        $str = $str.$_POST['time'].C('API_SECRET_KEY');        
        return md5($str);
    }
        
    /**
     * 获取服务器时间
     */
    public function getServerTime()
    {
        $json_arr = array('status'=>1,'msg'=>'成功!','result'=>time());
        $json_str = json_encode($json_arr);
        exit($json_str);       
    }
}