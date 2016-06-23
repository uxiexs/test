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
use Api\Logic\GoodsLogic;
use Think\Page;
class GoodsController extends BaseController {
    public function index(){
       // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display();
    }
    
    /**
     * 获取商品分类列表
     */
    public function goodsCategoryList(){        
        $parent_id = I("parent_id",0);
        $goodsCategoryList = M('GoodsCategory')->where("parent_id = $parent_id AND is_show=1")->order("parent_id_path,sort_order desc")->select();
        $json_arr = array('status'=>1,'msg'=>'获取成功','result'=>$goodsCategoryList );
        $json_str = json_encode($json_arr);            
        exit($json_str);
    }
 
    
    /**
     * 商品列表页 ajax 翻页请求 搜索
     
    public function goodsList() {
                                    
        $goodsLogic = new GoodsLogic(); // 前台商品操作逻辑类                
        $brand_id_arr = I("brand_id"); // 品牌 id
        $spec_item_id = I("spec_item_id"); // 规格项id
        $attr_id  = I("attr_id"); // 属性 id
        $filter_price = I("filter_price"); // 帅选价格
        $filter_price1 = I("filter_price1"); // 帅选价格 filter_price1
        $filter_price2 = I("filter_price2"); // 帅选价格 filter_price2
        $search_key = I("search_key");  // 关键词搜索 
        $where = " where 1 = 1 ";
        $orderby =I('orderby','goods_id'); // 排序
        $orderdesc = I('orderdesc','desc'); // 升序 降序
        
        $search_key && $where .= " and (goods_name like '%$search_key%' or keywords like '%$search_key%')";
        
        $cat_id  = I("cat_id",0); // 所选择的商品分类id                
        if($cat_id > 0)
        {
            $grandson_ids = getCatGrandson($cat_id); 
            $where .= " and cat_id in(".  implode(',', $grandson_ids).") "; // 初始化搜索条件
        }
        // 品牌
        $brand_id_arr && $where .= " and brand_id in(".  implode(',', $brand_id_arr).")"; 
        
        // 如果根据规格项帅选
        if($spec_item_id)
        {
            $goods_id_arr = $goodsLogic->get_spec_item_goods_id($spec_item_id,1); // 根据规格项找出对应的id            
            
            if(!$goods_id_arr) // 如果没查到商品id 直接就返回空魔板
            {
                $this->display('ajax_goods_list');
                exit;
            }                
             $where .= " and goods_id in(".  implode(',', $goods_id_arr).")";                 
        }        
        // 如果根据属性帅选
        if($attr_id)
        {            
            $goods_id_arr  = $goodsLogic->get_attr_goods_id($attr_id,1); // 根据属性找出对应的id                        
            
            if(!$goods_id_arr) // 如果没查到商品id 直接就返回空魔板
            {
                $this->display('ajax_goods_list');
                exit;
            }                           
            $where .= " and goods_id in(".  implode(',', $goods_id_arr).")";     
        }  
        // 价格帅选
        if($filter_price && empty($filter_price1) && empty($filter_price2))
        {  
            $filter_price = explode('-', $filter_price);
            $where .= " and shop_price > $filter_price[0] and  shop_price <  $filter_price[1] ";
        }
        // 手动输入价格 filter_price1  filter_price2
        $filter_price1 && $where .= " and shop_price > $filter_price1"; 
        $filter_price2 && $where .= " and shop_price < $filter_price2"; 
                
        $Model  = new \Think\Model();
        $result = $Model->query("select count(1) as count from __PREFIX__goods $where ");
        $count = $result[0]['count'];
        $_GET['p'] = $_REQUEST['p'];
        $page = new Page($count,10);
      
        $order = " order by $orderby $orderdesc "; // 排序        
        $limit = " limit ".$page->firstRow.','.$page->listRows;
        $list = $Model->query("select *  from __PREFIX__goods $where $order $limit");
        
        $json_arr = array('status'=>1,'msg'=>'获取成功','result'=>$list );
        $json_str = json_encode($json_arr);            
        exit($json_str);
                                      
    }    
    */
    
    /**
     * 商品列表页
     */
    public function goodsList(){
    	
    	$filter_param = array(); // 帅选数组
    	$id = I('get.id',1); // 当前分类id
    	$brand_id = I('brand_id',0);
    	$spec = I('spec',0); // 规格
    	$attr = I('attr',''); // 属性
    	$sort = I('sort','goods_id'); // 排序
    	$sort_asc = I('sort_asc','asc'); // 排序
    	$price = I('price',''); // 价钱
    	$start_price = trim(I('start_price','0')); // 输入框价钱
    	$end_price = trim(I('end_price','0')); // 输入框价钱
    	if($start_price && $end_price) $price = $start_price.'-'.$end_price; // 如果输入框有价钱 则使用输入框的价钱   	 
    	$filter_param['id'] = $id; //加入帅选条件中
    	$brand_id  && ($filter_param['brand_id'] = $brand_id); //加入帅选条件中
    	$spec  && ($filter_param['spec'] = $spec); //加入帅选条件中
    	$attr  && ($filter_param['attr'] = $attr); //加入帅选条件中
    	$price  && ($filter_param['price'] = $price); //加入帅选条件中
         
    	$goodsLogic = new \Home\Logic\GoodsLogic(); // 前台商品操作逻辑类
    	// 分类菜单显示
    	$goodsCate = M('GoodsCategory')->where("id = $id")->find();// 当前分类
    	//($goodsCate['level'] == 1) && header('Location:'.U('Home/Channel/index',array('cat_id'=>$id))); //一级分类跳转至大分类馆
    	$cateArr = $goodsLogic->get_goods_cate($goodsCate);
    	 
    	// 帅选 品牌 规格 属性 价格
    	$cat_id_arr = getCatGrandson ($id);
        
    	$filter_goods_id = M('goods')->where("is_on_sale=1 and cat_id in(".  implode(',', $cat_id_arr).") ")->cache(true)->getField("goods_id",true);
    	
    	// 过滤帅选的结果集里面找商品
    	if($brand_id || $price)// 品牌或者价格
    	{
    		$goods_id_1 = $goodsLogic->getGoodsIdByBrandPrice($brand_id,$price); // 根据 品牌 或者 价格范围 查找所有商品id
    		$filter_goods_id = array_intersect($filter_goods_id,$goods_id_1); // 获取多个帅选条件的结果 的交集
    	}
    	if($spec)// 规格
    	{
    		$goods_id_2 = $goodsLogic->getGoodsIdBySpec($spec); // 根据 规格 查找当所有商品id
    		$filter_goods_id = array_intersect($filter_goods_id,$goods_id_2); // 获取多个帅选条件的结果 的交集
    	}
    	if($attr)// 属性
    	{
    		$goods_id_3 = $goodsLogic->getGoodsIdByAttr($attr); // 根据 规格 查找当所有商品id
    		$filter_goods_id = array_intersect($filter_goods_id,$goods_id_3); // 获取多个帅选条件的结果 的交集
    	}
    	 
    	$filter_menu  = $goodsLogic->get_filter_menu($filter_param,'goodsList'); // 获取显示的帅选菜单
    	$filter_price = $goodsLogic->get_filter_price($filter_goods_id,$filter_param,'goodsList'); // 帅选的价格期间
    	$filter_brand = $goodsLogic->get_filter_brand($filter_goods_id,$filter_param,'goodsList',1); // 获取指定分类下的帅选品牌
    	$filter_spec  = $goodsLogic->get_filter_spec($filter_goods_id,$filter_param,'goodsList',1); // 获取指定分类下的帅选规格
    	$filter_attr  = $goodsLogic->get_filter_attr($filter_goods_id,$filter_param,'goodsList',1); // 获取指定分类下的帅选属性
    	
    	$count = count($filter_goods_id);
    	$page = new Page($count,2);
    	if($count > 0)
    	{
    		$goods_list = M('goods')->field('goods_id,cat_id,goods_sn,goods_name,shop_price')->where("goods_id in (".  implode(',', $filter_goods_id).")")->order("$sort $sort_asc")->limit($page->firstRow.','.$page->listRows)->select();
    		$filter_goods_id2 = get_arr_column($goods_list, 'goods_id');
    		if($filter_goods_id2)
    			$goods_images = M('goods_images')->where("goods_id in (".  implode(',', $filter_goods_id2).")")->cache(true)->select();
    	}
    	$goods_category = M('goods_category')->where('is_show=1')->cache(true)->getField('id,name,parent_id,level'); // 键值分类数组
    	$list['goods_list'] = $goods_list;
    	//$list['goods_category'] = $goods_category;
    	//$list['goods_images'] = $goods_images;  // 相册图片
    	//$list['filter_menu'] = $filter_menu;  // 帅选菜单
        foreach($filter_spec as $k => $v) // 依照app端的要求 去掉 键名
            $list['filter_spec'][] = $v;  // 帅选规格
        
    	$list['filter_attr'] = $filter_attr;  // 帅选属性
    	$list['filter_brand'] = $filter_brand;// 列表页帅选属性 - 商品品牌
    	$list['filter_price'] = $filter_price;// 帅选的价格期间
    	//$list['goodsCate'] = $goodsCate;
    	//$list['cateArr'] = $cateArr;
    	$list['filter_param'] = $filter_param; // 帅选条件
    	$list['cat_id'] = $id;
    	$list['sort_asc'] =  $sort_asc == 'asc' ? 'desc' : 'asc';
    	C('TOKEN_ON',false);
        
        $json_arr = array('status'=>1,'msg'=>'获取成功','result'=>$list );
        $json_str = json_encode($json_arr,true);            
        exit($json_str);
    }    

     /**
     * 商品搜索列表页
     */
    public function search(){
    	
    	$filter_param = array(); // 帅选数组
    	$id = I('get.id',0); // 当前分类id
    	$brand_id = I('brand_id',0);    	    	
    	$sort = I('sort','goods_id'); // 排序
    	$sort_asc = I('sort_asc','asc'); // 排序
    	$price = I('price',''); // 价钱
    	$start_price = trim(I('start_price','0')); // 输入框价钱
    	$end_price = trim(I('end_price','0')); // 输入框价钱
    	if($start_price && $end_price) $price = $start_price.'-'.$end_price; // 如果输入框有价钱 则使用输入框的价钱   	 
    	$filter_param['id'] = $id; //加入帅选条件中
    	$brand_id  && ($filter_param['brand_id'] = $brand_id); //加入帅选条件中    	    	
    	$price  && ($filter_param['price'] = $price); //加入帅选条件中
        $q = urldecode(trim(I('q',''))); // 关键字搜索
        $q  && ($_GET['q'] = $filter_param['q'] = $q); //加入帅选条件中
        if(empty($q))
            $this->error ('请输入搜索关键词');
        
    	$goodsLogic = new \Home\Logic\GoodsLogic(); // 前台商品操作逻辑类    	     
    	$filter_goods_id = M('goods')->where("is_on_sale=1 and goods_name like '%{$q}%'  ")->cache(true)->getField("goods_id",true);
    	
    	// 过滤帅选的结果集里面找商品
    	if($brand_id || $price)// 品牌或者价格
    	{
    		$goods_id_1 = $goodsLogic->getGoodsIdByBrandPrice($brand_id,$price); // 根据 品牌 或者 价格范围 查找所有商品id
    		$filter_goods_id = array_intersect($filter_goods_id,$goods_id_1); // 获取多个帅选条件的结果 的交集
    	}
    	  
    	$filter_menu  = $goodsLogic->get_filter_menu($filter_param,'goodsList'); // 获取显示的帅选菜单
    	$filter_price = $goodsLogic->get_filter_price($filter_goods_id,$filter_param,'goodsList'); // 帅选的价格期间
    	$filter_brand = $goodsLogic->get_filter_brand($filter_goods_id,$filter_param,'goodsList',1); // 获取指定分类下的帅选品牌    	 
    	
    	$count = count($filter_goods_id);
    	$page = new Page($count,4);
    	if($count > 0)
    	{
    		$goods_list = M('goods')->where("goods_id in (".  implode(',', $filter_goods_id).")")->order("$sort $sort_asc")->limit($page->firstRow.','.$page->listRows)->select();
    		$filter_goods_id2 = get_arr_column($goods_list, 'goods_id');
    		if($filter_goods_id2)
    			$goods_images = M('goods_images')->where("goods_id in (".  implode(',', $filter_goods_id2).")")->cache(true)->select();
    	}
    	$goods_category = M('goods_category')->where('is_show=1')->cache(true)->getField('id,name,parent_id,level'); // 键值分类数组
    	    	
    	$list['goods_list'] = $goods_list;
    	//$list['goods_category'] = $goods_category;
    	//$list['goods_images'] = $goods_images;  // 相册图片
    	//$list['filter_menu'] = $filter_menu;  // 帅选菜单    	    	
    	$list['filter_brand'] = $filter_brand;// 列表页帅选属性 - 商品品牌
    	$list['filter_price'] = $filter_price;// 帅选的价格期间
    	//$list['goodsCate'] = $goodsCate;
    	//$list['cateArr'] = $cateArr;
    	$list['filter_param'] = $filter_param; // 帅选条件
    	$list['cat_id'] = $id;
    	$list['sort_asc'] =  $sort_asc == 'asc' ? 'desc' : 'asc';
    	C('TOKEN_ON',false);
        
        $json_arr = array('status'=>1,'msg'=>'获取成功','result'=>$list );
        $json_str = json_encode($json_arr,true);            
        exit($json_str);

    }    
    
    /**
     * 获取商品列表
     */
    public function goodsInfo(){

        $http = tpCache('shop_info.site_url'); // 网站域名
        $goods_id = $_REQUEST['id'];
        $where['goods_id'] = $goods_id;
        $model = M('Goods');

        $goods  = $model->where($where)->find();
        
        // 处理商品属性
        $goods_attribute = M('GoodsAttribute')->getField('attr_id,attr_name'); // 查询属性
        $goods_attr_list = M('GoodsAttr')->where("goods_id = $goods_id")->select(); // 查询商品属性表                        
        foreach($goods_attr_list as $key => $val)
        {
            $goods_attr_list[$key]['attr_name'] = $goods_attribute[$val['attr_id']];
        }                
        $goods['goods_attr_list'] = $goods_attr_list ? $goods_attr_list : '';
        
        // 处理商品规格
        $Model = new \Think\Model();        
        // 商品规格 价钱 库存表 找出 所有 规格项id
        $keys = M('SpecGoodsPrice')->where("goods_id = $goods_id")->getField("GROUP_CONCAT(`key` SEPARATOR '_') ");         
        if($keys)
        {
             $specImage =  M('SpecImage')->where("goods_id = $goods_id and src != '' ")->getField("spec_image_id,src");// 规格对应的 图片表， 例如颜色                
             $keys = str_replace('_',',',$keys);             
             $sql  = "SELECT a.name,a.order,b.* FROM __PREFIX__spec AS a INNER JOIN __PREFIX__spec_item AS b ON a.id = b.spec_id WHERE b.id IN($keys) ORDER BY a.order";
             $filter_spec2 = $Model->query($sql);             
             foreach($filter_spec2 as $key => $val)
             {                                  
                 $filter_spec[] = array(
                     'spec_name'=>$val['name'],
                     'item_id'=> $val['id'],
                     'item'=> $val['item'],
                     'src'=>$specImage[$val['id']] ? $http.$specImage[$val['id']] : '',
                     );                 
             }                        
             $goods['goods_spec_list'] = $filter_spec;
        }           
         
       // print_r($filter_spec);
        //print_r($goods_attr_list);
        //print_r($filter_spec);
                               
       $goods['goods_content'] = str_replace('/Public/upload/', $http."/Public/upload/", $goods['goods_content']);
        $goods['goods_content'] = htmlspecialchars_decode($goods['goods_content']);
       $goods['original_img'] = $http.$goods['original_img'];
        $return['goods'] = $goods;
        $return['spec_goods_price']  = M('spec_goods_price')->where("goods_id = $goods_id")->getField("key,price,store_count"); // 规格 对应 价格 库存表
        $return['gallery'] = M('goods_images')->field('image_url')->where(array('goods_id'=>$goods_id))->select();
        foreach($return['gallery'] as $key => $val){
           $return['gallery'][$key]['image_url'] = tpCache('shop_info.site_url').$return['gallery'][$key]['image_url'];
        }
        //获取最近的两条评论
        $latest_comment = M('comment')->where("goods_id={$goods_id} AND is_show=1 AND parent_id=0")->limit(2)->select();
        $return['comment'] = $latest_comment ? $latest_comment : '';
        
        if(!$goods){
            $json_arr = array('status'=>-1,'msg'=>'没有该商品','result'=>'');
        }else{
            $json_arr = array('status'=>1,'msg'=>'获取成功','result'=>$return);
        }
        $json_str = json_encode($json_arr);
        exit($json_str);
    }
    
    /**
     *  goodsPriceBySpec 获取商品价格
     */
    /*
    public function goodsPriceBySpec()
    {        
        $goods_id = I("goods_id"); // 商品id
        $goods_num = I("goods_num");// 商品数量
        $goods = M('Goods')->where("goods_id = $goods_id")->find();
        $goods_price = $goods['shop_price']; // 商品价格 
        
        // 有选择商品规格
        if(!empty($_REQUEST['spec_list']))
        {
            $spec_item = explode(',', $_REQUEST['spec_list']);
            sort($spec_item);
            $spec_item_key = implode('_', $spec_item);
            $specGoodsPrice = M("SpecGoodsPrice")->where("goods_id = $goods_id and `key` = '$spec_item_key'")->find();
            if($specGoodsPrice)
                $goods_price = $specGoodsPrice['price'];
        }    
        $price = $goods_price * $goods_num; // 商品单价乘以数量        
        
        if(!$price){
            $json_arr = array('status'=>-1,'msg'=>'没有查询到价格','result'=>'');
        }else{
            $json_arr = array('status'=>1,'msg'=>'获取成功','result'=>$price);
        }
        $json_str = json_encode($json_arr);
        exit($json_str);         
    }
    */
    
    /**
     *  获取商品的缩略图
     */
    function goodsThumImages()
    {        
        $goods_id = I('goods_id');
        $width = I('width');
        $height = I('height');         
        $img_url = SITE_URL.goods_thum_images($goods_id,$width,$height);                
        $image = file_get_contents($img_url);  //假设当前文件夹已有图片001.jpg        
        header('Content-type: image/jpg');
        exit($image);
    }
    
    
    /**
     * 获取某个商品的评价
     */
    function getGoodsComment()
    {        
        $goods_id = I('goods_id');        
        $where = " goods_id = $goods_id  and is_show = 1";
        $count = M('comment')->where($where)->count();
        $_GET['p'] = $_REQUEST['p'];
        $page = new Page($count,10);        
        $list = M('comment')->where($where)->order("comment_id desc")->limit("{$page->firstRow},{$page->listRows}")->select();        
        foreach ($list as $key => $val)
        {
            if(empty($val['img']))
            {
                $list[$key]['img'] = '';
                continue;
            }

            $val['img'] = unserialize($val['img']);

            foreach ($val['img'] as $k => $v)
            {
                $val['img'][$k] = tpCache('shop_info.site_url').$v;
            }
            $list[$key]['img'] = $val['img']; 
        }
        exit(json_encode(array('status'=>1,'msg'=>'获取成功','result'=>$list )));
    }
    /**
     * 收藏商品
     */
    function collectGoods(){
        $user_id = I('user_id');
        $goods_id = I('goods_id');
        $type = I('type',0);
        $count = M('Goods')->where("goods_id = $goods_id")->count();
        if($count == 0)  exit(json_encode(array('status'=>1,'msg'=>'收藏商品不存在','result'=>array())));
        //删除收藏商品
        if($type==1){
            M('GoodsCollect')->where("user_id = $user_id and goods_id = $goods_id")->delete();
            exit(json_encode(array('status'=>1,'msg'=>'成功取消收藏','result'=>array() )));
        }
        $count = M('GoodsCollect')->where("user_id = $user_id and goods_id = $goods_id")->count();
        if($count > 0)        exit(json_encode(array('status'=>1,'msg'=>'您已收藏过该商品','result'=>array() )));
        M('GoodsCollect')->add(array(
            'goods_id'=>$goods_id,
            'user_id'=>$user_id,
            'add_time'=>time(),
        ));
        exit(json_encode(array('status'=>1,'msg'=>'收藏成功','result'=>array() )));
    }
}