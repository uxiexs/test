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
class UserController extends BaseController {
    public $userLogic;
    public function _initialize(){
        parent::_initialize();
        $this->userLogic = new \Home\Logic\UsersLogic();
    }
    /**
     *  登录
     */
    public function login(){
        $username = I('username','');
        $password = I('password','');
        $unique_id = I("unique_id"); // 唯一id  类似于 pc 端的session id
        $data = $this->userLogic->login($username,$password);
        
        $cartLogic = new \Home\Logic\CartLogic();        
        $cartLogic->login_cart_handle($unique_id,$data['result']['user_id']); // 用户登录后 需要对购物车 一些操作               
        exit(json_encode($data));
    }
    /*
     * 第三方登录
     */
    public function thirdLogin(){
        $map['openid'] = I('openid','');
        $map['oauth'] = I('from','');
        $map['nickname'] = I('nickname','');
        $data = $this->userLogic->thirdLogin($map);
        exit(json_encode($data));
    }

    /**
     * 用户注册
     */
    public function reg(){
        $username = I('post.username','');
        $password = I('post.password','');
        $password2 = I('post.password2','');
        $unique_id = I('unique_id');
        //是否开启注册验证码机制
        if(check_mobile($username) && TpCache('sms.regis_sms_enable')){
            $code = I('post.code');
            if(empty($code))
                exit(json_encode(array('status'=>-1,'msg'=>'请输入验证码','result'=>'')));                
            $check_code = $this->userLogic->sms_code_verify($username,$code,$unique_id);
            if($check_code['status'] != 1)
                exit(json_encode(array('status'=>-1,'msg'=>$check_code['msg'],'result'=>'')));
        }        
        $data = $this->userLogic->reg($username,$password,$password2);
        exit(json_encode($data));
    }

    /*
     * 获取用户信息
     */
    public function userInfo(){
        $user_id = I('user_id');
        $data = $this->userLogic->get_info($user_id);
        exit(json_encode($data));
    }

    /*
     *更新用户信息
     */
    public function updateUserInfo(){
        if(IS_POST){
            $user_id = I('user_id');
            if(!$user_id)
                exit(json_encode(array('status'=>-1,'msg'=>'缺少参数','result'=>'')));

            I('post.nickname') ? $post['nickname'] = I('post.nickname') : false; //昵称
            I('post.qq') ? $post['qq'] = I('post.qq') : false;  //QQ号码
            I('post.head_pic') ? $post['head_pic'] = I('post.head_pic') : false; //头像地址
            I('post.sex') ? $post['sex'] = I('post.sex') : false;  // 性别
            I('post.birthday') ? $post['birthday'] = strtotime(I('post.birthday')) : false;  // 生日
            I('post.province') ? $post['province'] = I('post.province') : false;  //省份
            I('post.city') ? $post['city'] = I('post.city') : false;  // 城市
            I('post.district') ? $post['district'] = I('post.district') : false;  //地区

            if(!$this->userLogic->update_info($user_id,$post))
                exit(json_encode(array('status'=>-1,'msg'=>'更新失败','result'=>'')));
            exit(json_encode(array('status'=>1,'msg'=>'更新成功','result'=>'')));

        }
    }

    /*
     * 修改用户密码
     */
    public function password(){
        if(IS_POST){
            $user_id = I('user_id');
            if(!$user_id)
                exit(json_encode(array('status'=>-1,'msg'=>'缺少参数','result'=>'')));
            $data = $this->userLogic->password($user_id,I('post.old_password'),I('post.new_password'),I('post.confirm_password')); // 获取用户信息
            exit(json_encode($data));
        }
    }

    /**
     * 获取收货地址
     */
    public function getAddressList(){
        $user_id = I('user_id');
        if(!$user_id)
            exit(json_encode(array('status'=>-1,'msg'=>'缺少参数','result'=>'')));
            $address = M('user_address')->where(array('user_id'=>$user_id))->select();
        if(!$address)
            exit(json_encode(array('status'=>1,'msg'=>'没有数据','result'=>'')));
        exit(json_encode(array('status'=>1,'msg'=>'获取成功','result'=>$address)));
    }

    /*
     * 添加地址
     */
    public function addAddress(){
        $user_id = I('user_id',0);
        $address_id = I('address_id',0);
        $data = $this->userLogic->add_address($user_id,$address_id,I('post.')); // 获取用户信息
        exit(json_encode($data));
    }

    /*
     * 设置默认收货地址
     */
    public function setDefaultAddress(){
        $user_id = I('user_id',0);
        $address_id = I('address_id',0);
        $data = $this->userLogic->set_default($user_id,$address_id); // 获取用户信息
        if(!$data)
            exit(json_encode(array('status'=>-1,'msg'=>'操作失败','result'=>'')));
        exit(json_encode(array('status'=>1,'msg'=>'操作成功','result'=>'')));
    }

    /*
     * 获取优惠券列表
     */
    public function getCouponList(){
        $user_id = I('user_id',0);
        if(!$user_id > 0)
            exit(json_encode(array('status'=>-1,'msg'=>'参数有误','result'=>'')));
        $data = $this->userLogic->get_coupon($user_id,$_REQUEST['type']);
        unset($data['show']);
        exit(json_encode($data));
    }
    /*
     * 获取商品收藏列表
     */
    public function getGoodsCollect(){
        $user_id = I('user_id',0);
        if(!$user_id > 0)
            exit(json_encode(array('status'=>-1,'msg'=>'参数有误','result'=>'')));
        $data = $this->userLogic->get_goods_collect($user_id);
        foreach($data['result'] as &$r){

        }
        unset($data['show']);
        exit(json_encode($data));
    }

    /*
     * 用户订单列表
     */
    public function getOrderList(){
        $user_id = I('user_id',0);
        $type = I('type','');
        if(!$user_id > 0)
            exit(json_encode(array('status'=>-1,'msg'=>'参数有误','result'=>'')));
        //条件搜索
        //I('field') && $map[I('field')] = I('value');
        //I('type') && $map['type'] = I('type');
        //$map['user_id'] = $user_id;
        $map = " user_id = $user_id ";        
        $map = $type ? $map.C($type) : $map;   
        
        
        if(I('type') )
        $count = M('order')->where($map)->count();
        $Page       = new \Think\Page($count,10);

        $show = $Page->show();
        $order_str = "order_id DESC";
        $order_list = M('order')->order($order_str)->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

        //获取订单商品
        foreach($order_list as $k=>$v){     
            $order_list[$k] = set_btn_order_status($v);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
            //订单总额
            $order_list[$k]['total_fee'] = $v['goods_amount'] + $v['shipping_fee'] - $v['integral_money'] -$v['bonus'] - $v['discount'];
            $data = $this->userLogic->get_order_goods($v['order_id']);
            $order_list[$k]['goods_list'] = $data['result'];            
        }
        exit(json_encode(array('status'=>1,'msg'=>'获取成功','result'=>$order_list)));
    }
    /*
     * 获取订单详情
     */
    public function getOrderDetail(){
        $user_id = I('user_id',0);
        $id = I('id');
        if(I('id')){
            $map['order_id'] = $id;
        }else{
            $map['order_sn'] = I('sn');
        }
        $map['user_id'] = $user_id;
        $order_info = M('order')->where($map)->find();
        $order_info = set_btn_order_status($order_info);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
        
        if(!$user_id > 0 || !$user_id > 0)
            exit(json_encode(array('status'=>-1,'msg'=>'参数有误','result'=>'')));
        if(!$order_info){
            exit(json_encode(array('status'=>-1,'msg'=>'订单不存在','result'=>'')));
        }
        //获取订单商品
        $data = $this->userLogic->get_order_goods($order_info['order_id']);
        $order_info['goods_list'] = $data['result'];
        $order_info['total_fee'] = $order_info['goods_price'] + $order_info['shipping_price'] - $order_info['integral_money'] -$order_info['coupon_price'] - $order_info['discount'];
        exit(json_encode(array('status'=>1,'msg'=>'获取成功','result'=>$order_info)));
    }

    /**
     * 取消订单
     */
    public function cancelOrder(){
        $id = I('order_id');
        $user_id = I('user_id',0);
        if(!$user_id > 0 || !$id > 0)
            exit(json_encode(array('status'=>-1,'msg'=>'参数有误','result'=>'')));
        $data = $this->userLogic->cancel_order($user_id,$id);
        exit(json_encode($data));
    }
    
    /**
     * 发送手机注册验证码
     * http://www.tp-shop.cn/index.php?m=Api&c=User&a=send_sms_reg_code&mobile=13800138006&unique_id=123456
     */
    public function send_sms_reg_code(){
        $mobile = I('mobile');     
        $unique_id = I('unique_id');
        if(!check_mobile($mobile))
            exit(json_encode(array('status'=>-1,'msg'=>'手机号码格式有误')));
        $code =  rand(1000,9999);
        $send = $this->userLogic->sms_log($mobile,$code,$unique_id);
        if($send['status'] != 1)
            exit(json_encode(array('status'=>-1,'msg'=>$send['msg'])));
        exit(json_encode(array('status'=>1,'msg'=>'验证码已发送，请注意查收')));
    }    

    public function orderConfirm(){
        $id = I('order_id');
        $user_id = I('user_id',0);
        if(!$user_id > 0 || !$id > 0)
            exit(json_encode(array('status'=>-1,'msg'=>'参数有误','result'=>'')));
        $data = $this->userLogic->confirm_order($user_id,$id);
        if($data['status'] != 1)
            exit(json_encode(array('status'=>-1,'msg'=>$data['msg'])));
        exit(json_encode(array('status'=>1,'msg'=>$data)));
    }
    
    
    /*
     *添加评论
     */
    public function add_comment(){                
      
            // 晒图片        
            if($_FILES[comment_img_file][tmp_name][0])
            {
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize   =    $map['author'] = (1024*1024*3);// 设置附件上传大小 管理员10M  否则 3M
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath  =     './Public/upload/comment/'; // 设置附件上传根目录
                    $upload->replace  =     true; // 存在同名文件是否是覆盖，默认为false
                    //$upload->saveName  =   'file_'.$id; // 存在同名文件是否是覆盖，默认为false
                    // 上传文件 
                    $info   =   $upload->upload();                 
                    if(!$info) {// 上传错误提示错误信息                                                                                                
                        exit(json_encode(array('status'=>-1,'msg'=>$upload->getError()))); //$this->error($upload->getError());
                    }else{
                        foreach($info as $key => $val)
                        {
                            $comment_img[] = '/Public/upload/comment/'.$val['savepath'].$val['savename'];                            
                        }   
                        $comment_img = serialize($comment_img); // 上传的图片文件
                    }                     
            }         
         
         
            
            $unique_id = I("unique_id"); // 唯一id  类似于 pc 端的session id
            $user_id = I('user_id'); // 用户id
            $user_info = M('users')->where("user_id = $user_id")->find();            

            $add['goods_id'] = I('goods_id');
            $add['email'] = $user_info['email'];
            //$add['nick'] = $user_info['nickname'];
            $add['username'] = $user_info['nickname'];
            $add['order_id'] = I('order_id');
            $add['service_rank'] = I('service_rank');
            $add['deliver_rank'] = I('deliver_rank');
            $add['goods_rank'] = I('goods_rank');
           // $add['content'] = htmlspecialchars(I('post.content'));
            $add['content'] = I('content');
            $add['img'] = $comment_img;
            $add['add_time'] = time();
            $add['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $add['user_id'] = $user_id;                    
            
            //添加评论
            $row = $this->userLogic->add_comment($add);
            exit(json_encode($row));
    }    
}