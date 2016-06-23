<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($goods["goods_name"]); ?>-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
</head>

<body>
<!--------头部开始-------------->
<script src="/Template/pc/default/Static/js/jquery-1.10.2.min.js"></script>
<!--最顶部-->
<link rel="stylesheet" href="/Template/pc/default/Static/css/index.css" type="text/css">
<div class="site-topbar">
    <div class="layout">
        <div class="t1-l">
            <ul class="t1-l-ul">
                <li class="t1font"><a target="_blank" href="<?php echo U('/Home/Article/detail',array('article_id'=>22));?>">在线客服</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a target="_blank" href="http://www.99soubao.com">搜豹官网</a></li>
                <li class="t1img">&nbsp;</li>
            </ul>
        </div>
        <div class="t1-r">
            <ul class="t1-r-ul islogin" style="display:none;">
                <li class="t1font"> <a href="javascript:void(0);" class="logon userinfo"></a></li>
                <li class="t1img"><a href="<?php echo U('Home/user/logout');?>">安全退出</a></li>                    
                <li class="t1img">&nbsp;</li>
                <li class="t1img">&nbsp;</li>                
                <li class="t1font"><a href="/index.php/Home/User/order_list">我的订单</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="/index.php/Home/Cart/cart">购物车</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="#">网站地图</a></li>
                <li class="t1img">&nbsp;</li>                
            </ul>
            <ul class="t1-r-ul nologin" style="display:none;">
                <li class="t1font"><a href="<?php echo U('Home/user/login');?>">登录</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="/index.php/Home/Cart/cart">购物车</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="#">网站地图</a></li>
                <li class="t1img">&nbsp;</li> 
            </ul>
        </div>
    </div>
</div>

 <!--------在线客服-------------->
<style>
*{margin:0;padding:0;list-style:none;border:none;}
body{font-size:12px;}
a{color:#666;text-decoration:none;}
/*客服代码部分*/
.qqserver .qqserver-header:after,.qqserver .qqserver-header:before,.qqserver li a:after,.qqserver li a:before{display:table;content:' '}
.qqserver .qqserver-header:after,.qqserver li a:after{clear:both}
.qqserver .qqserver-header,.qqserver li a,.tabs,.user-main,.view-category,.view-category-list>li{*zoom:1}
.qqserver{position:fixed;top:50%;right:0;height:209px;margin-top:-104px}
.qqserver.unfold .qqserver-body{right:0;z-index:100;}
.qqserver .qqserver-body{position:absolute;right:-144px;width:122px;height:183px;padding:12px 10px;-webkit-transition:.3s cubic-bezier(.19,1,.22,1);-o-transition:.3s cubic-bezier(.19,1,.22,1);transition:.3s cubic-bezier(.19,1,.22,1);border:1px solid #e63547;border-radius:4px;background:#f4f7fa}
.qqserver .qqserver_fold{position:absolute;right:0;padding:14px 7px;cursor:pointer;border-top-left-radius:4px;border-bottom-left-radius:4px;background:#e63547}
.qqserver .qqserver-header{padding-bottom:10px;padding-left:6px;border-bottom:1px dashed #d1d4cc}
.qqserver .qqserver-header *{float:left}
.qqserver .qqserver_arrow{margin-top:-1px;margin-left:7px;cursor:pointer}
.qqserver li{margin-top:6px}
.qqserver li a{display:block;padding:6px 12px 4px}
.qqserver li a div{font-size:14px;float:left;margin-right:11px;color:#697466}
.qqserver li a span{font-size:12px;line-height:18px;float:left;text-indent:4px;color:#fff}
.qqserver li a span.qqserver-service-alert{font-weight:400;display:block}
.qqserver li a:hover{text-decoration:none;border-radius:4px;background:#eaebe9}
.qqserver li a:hover div{color:#e63547}
.qqserver .qqserver-footer{margin-top:10px;padding-top:14px;padding-bottom:14px;padding-left:11px;border-top:1px dashed #d1d4cc}
.qqserver .qqserver-footer .text-primary{color:#e63547;font-size:14px;}
.qqserver .qqserver_icon-alert{display:inline-block;margin-right:10px;vertical-align:-3px;*display:inline;*zoom:1;*vertical-align:-1px}
.qqserver-header div{width:90px;height:18px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-419px -80px}
.qqserver_icon-alert{width:16px;height:14px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-595px -85px}
.qqserver li a span{width:30px;height:23px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-265px 0}
.qqserver li a .qqserver-service-alert{width:30px;height:22px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-342px 0}
.qqserver_fold div{width:26px;height:132px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:0 0}
.qqserver_fold:hover div{width:26px;height:132px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-27px 0}
.qqserver_arrow{width:18px;height:18px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-435px 0}
.qqserver_arrow:hover{width:18px;height:18px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-435px -38px}
</style>
<!-- 代码部分begin -->
<div class="qqserver">
  <div class="qqserver_fold">
    <div></div>
  </div>
  <div class="qqserver-body" style="display: block;">
    <div class="qqserver-header">
      <div></div>
      <span class="qqserver_arrow"></span> </div>
    <ul>
      <li> <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($tpshop_config['shop_info_qq']); ?>&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
        <div>客服咨询</div>
        <span>琳琳</span> </a> </li>
      <li> <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($tpshop_config['shop_info_qq2']); ?>&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
        <div>客服咨询</div>
        <span>云云</span> </a> </li>
      <li> <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($tpshop_config['shop_info_qq3']); ?>&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
        <div>技术咨询</div>
        <span class="qqserver-service-alert">TPshop</span> </a> </li>
    </ul>
    <div class="qqserver-footer"><span class="qqserver_icon-alert"></span><a class="text-primary" href="javascript:;">大家都在说</a> </div>
  </div>
</div>
<!--<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>-->
<script>
$(function(){
	var $qqServer = $('.qqserver');
	var $qqserverFold = $('.qqserver_fold');
	var $qqserverUnfold = $('.qqserver_arrow');
	$qqserverFold.click(function(){
		$qqserverFold.hide();
		$qqServer.addClass('unfold');
	});
	$qqserverUnfold.click(function(){
		$qqServer.removeClass('unfold');
		$qqserverFold.show();
	});
	//窗体宽度小鱼1024像素时不显示客服QQ
	function resizeQQserver(){
		$qqServer[document.documentElement.clientWidth < 1024 ? 'hide':'show']();
	}
	$(window).bind("load resize",function(){
		resizeQQserver();
	});
});
</script>
<!-- 代码部分end -->
 <!--------在线客服-------------->

<!--顶部banner开始-->    
<?php if(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME == 'Home/Index/index' && $_COOKIE["top-banner"] == null){ ?>
<div class="top-banner" id="top-banner-block">
    <div class="top-banner-max">
    <!---广告 select * from __PREFIX__ad where position_id = 1 limit 1-->
    <?php $pid =1;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><a href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?>> <img src="<?php echo ($v[ad_code]); ?>"  title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/></a>    
    <a class="button-top-banner-close" href="javascript:;" title="关闭" id="top-banner-min-close" onClick="javascript:$('#top-banner-block').hide();">－</a><?php endforeach; ?>
   </div>
</div>
<?php  setcookie("top-banner", "1", time()+ 3600); } ?>
<!--顶部banner结束-->    

<header>
    
    <div class="layout">
    
    <!--logo开始-->
        <div class="logo"><a href="/" title="TPshop"><img src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>" alt="TPshop"></a></div>
    <!--logo结束-->
    
    <!-- 搜索开始-->
        <div class="searchBar">
            <div class="searchBar-form">
                <form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
                    <input type="text" class="text" name="q" id="q" value="<?php echo I('q'); ?>"  placeholder="  搜索关键字"/>
                    <input type="button" class="button" value="搜索" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();"/>
                </form>
            </div>
            <div class="searchBar-hot">
                <b>热门搜索</b>
               	<?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><a target="_blank" href="<?php echo U('Home/Goods/search',array('q'=>$wd));?>" <?php if($k == 0): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a><?php endforeach; endif; ?>
            </div>
        </div>
        <!-- 搜索结束-->
        
        <div class="ri-mall">
            <div class="my-mall">
            <!---我的商城-开始 -->
                <div class="mall">
                    <div class="le"><a href="<?php echo U('/Home/User');?>" >我的商城</a></div> 
                </div>
                <!---我的商城-结束 -->
            </div>
            <div class="my-mall" id="header_cart_list">
                <!---购物车-开始 -->
                <div class="micart">
                    <div class="le les">
                    	<a href="<?php echo U('Home/Cart/cart');?>" >
                            我的购物车
                            <span class="shopping-num">
                                <em id="cart_quantity"><?php echo ($cart_total_price[anum]); ?></em>
                                <b></b>
                            </span>
                        </a>                       
                    </div>
                    
                    <div class="ri ris" style="display:">
                       <?php if(count($cartList) == 0): ?><div class="micart-about">
                                <span class="micart-xg">您的购物车是空的，赶紧选购吧！</span>
                            </div><?php endif; ?>
                        <div class="commod">
                        <ul>
                        <?php if(is_array($cartList)): foreach($cartList as $k=>$v): ?><li class="goods">
                                <div>
                                    <div class="p-img">
                                        <a href="">
                                            <img src="<?php echo (goods_thum_images($v["goods_id"],428,428)); ?>" alt="">
                                        </a>
                                     </div>
                                     <div class="p-name">
                                        <a href="">
                                            <span class="p-slogan"><?php echo ($v[goods_name]); ?></span>
                                            <span class="p-promotions hide"></span>
                                        </a>
                                     </div>
                                     <div class="p-status">
                                        <div class="p-price">
                                            <b>¥&nbsp;<?php echo ($v[goods_price]); ?></b>
                                            <em>x</em>
                                            <span><?php echo ($v[goods_num]); ?></span>
                                        </div>
                                        <div class="p-tags"></div>
                                     </div>
                                     <!--
                                     <a href="" class="icon-minicart-del" title="删除">删除</a>
                                       -->
                                </div>
                            </li><?php endforeach; endif; ?>   							
                        </ul>
                        </div>
                        <div class="settle">
                            <p>共<em><?php echo ($cart_total_price[anum]); ?></em>件商品，金额合计<b>¥&nbsp;<?php echo ($cart_total_price[total_fee]); ?></b></p>
                            <a class="js-button" href="<?php echo U('Home/Cart/cart');?>">去结算</a>
                        </div>
                    </div>
                </div>
                <!---购物车-结束 -->
                
            </div>
        </div>
        <div class="qr-code">
            <img src="/Template/pc/default/Static/images/qrcode_vmall_app01.png" alt="二维码" />
            <p>扫一扫</p>
        </div>
    </div>
</header>
   <!-- 导航-开始-->
   
   
   	<div class="navigation">
    	<div class="layout">
        	<!--全部商品-开始-->
        	<div class="allgoods">
            	<div class="goods_num"><h2>全部商品</h2><i class="trinagle"></i></div>
            	<div class="list" <?php if(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME == 'Home/Index/index') echo 'style="display:block;"'; ?> >
                   <ul class="list_ul"> 
                       <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$v): if($v[level] == 1): ?><li class="list-li">
                                    <div class="list_a">
                                        <h3><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"><span><?php echo ($v['name']); ?></span></a></h3>
                                        <p> <!--$v[id][name] 数组中括号 里面的 id name 不能有 引号 sql 参数 必须双引号-->
	                                       <?php $index = '1'; ?>
                                           <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if($v2[parent_id] == $v[id]): if($index++ > 3) break; ?>
                                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2['name']); ?></a><?php endif; endforeach; endif; ?>
                                        </p>
                                    </div>
                                    <div class="list_b">
                                        <div class="list_bigfl">
	                                       <?php $index = '1'; ?>                                        
                                           <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if($v2[parent_id] == $v[id]): if($index++ > 6) break; ?>
                                                    <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2['name']); ?><i>＞</i></a><?php endif; endforeach; endif; ?>                                                                                    
                                        </div>
                                        <div class="subitems">                                        
                                           <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if($v2[parent_id] == $v[id]): ?><dl class="ma-to-20 cl-bo">
                                                        <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2['name']); ?></a><i>＞</i></dt>
                                                        <dd class="ma-le-100">
                                                           <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): if($v3[parent_id] == $v2[id]): ?><a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3['name']); ?></a><?php endif; endforeach; endif; ?>
                                                        </dd>
                                                    </dl><?php endif; endforeach; endif; ?>
                                        </div>
                                    </div>
                                    <i class="list_img"></i>
                                </li><?php endif; endforeach; endif; ?>	
                	</ul>
                </div>
            </div>
            <!--全部商品-结束-->
            
            <div class="ongoods">
            	<ul class="navlist">
            		<li class="homepage"><a href="/"><span>首页</span></a></li>
                    <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li class="page"><a href="<?php echo ($v[url]); ?>" <?php if($v[is_new] == 1): ?>target="_blank"<?php endif; ?><span><?php echo ($v[name]); ?></span></a></li><?php endforeach; ?> 
            	</ul>
            </div>
        </div>
    </div>
   <!-- 导航-结束-->
<script>
$(function(){
    var active_li = '<?php echo ($active); ?>';
    if(active_li){
        $('li').remove('curr-res');
        $('#'+active_li).addClass('curr-res');
    }
   	
    var uname= getCookie('uname');
    if(uname == ''){
    	$('.islogin').remove();
    	$('.nologin').show();
    }else{
    	$('.nologin').remove();
    	$('.islogin').show();
    	$('.userinfo').html(uname);
    }
})

function getCookie(c_name)
{
	if (document.cookie.length>0)
	{
	  c_start = document.cookie.indexOf(c_name + "=")
	  if (c_start!=-1)
	  { 
	    c_start=c_start + c_name.length+1 
	    c_end=document.cookie.indexOf(";",c_start)
	    if (c_end==-1) c_end=document.cookie.length
	    	return unescape(document.cookie.substring(c_start,c_end))
	  } 
	}
	return "";
}
/**
* 鼠标移动端到头部购物车上面 就ajax 加载
*/
// 鼠标是否移动到了上方
var header_cart_list_over = 0; 
$("#header_cart_list > .micart > .les").hover(function(){	 

       if(header_cart_list_over == 1) 
			return false;
			
        header_cart_list_over = 1; 
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
			 		$("#header_cart_list > .micart > .ris").html(data);										 
			}
		});			
}).mouseout(function(){
	
	 (typeof(t) == "undefined") || clearTimeout(t); 	 
	 t = setTimeout(function () { 
			header_cart_list_over = 0; /// 标识鼠标已经离开
		}, 1000);		
});
</script>
<!--------头部结束-------------->
<link rel="stylesheet" href="/Template/pc/default/Static/css/page.css" type="text/css">
<script src="/Public/js/common.js"></script>
<script src="/Public/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/--> 
<link rel="stylesheet" href="/Template/pc/default/Static/css/jqzoom.css" type="text/css">
<script src="/Template/pc/default/Static/js/jquery.jqzoom.js"></script>
	<div class="layout">
    	<div class="breadcrumb-area">
        	<a href="/">首页</a> >>
            <?php if(is_array($navigate_goods)): foreach($navigate_goods as $k=>$v): ?><a  href="<?php echo U('/Home/Goods/goodsList',array('id'=>$k));?>"><?php echo ($v); ?></a> >><?php endforeach; endif; ?>
            <span><?php echo ($goods["goods_name"]); ?></span>
        </div>
        <div class="layout pa-to-10">            
            <!--商品图片轮播-->            
            <div class="left-area">
              <div class="left-area-tb">
               <div class="pro-gallery-img">
                	<div class="jqzoom"> <img id="zoomimg" src="<?php echo (goods_thum_images($goods["goods_id"],400,400)); ?>" jqimg="<?php echo (goods_thum_images($goods["goods_id"],800,800)); ?>" id="bigImage" width="480px" height="480px" alt=""/> </div>
               </div>
                <!-- 修改的部分-start -->
                <div class="pro-gallery-area">
					<div class="pro-gallery-nav">
	                	<a href="javascript:;" class="pro-gallery-back next-left disabled"></a>
	                	<div class="pro-gallery-thumbs">
	                        <ul class="small-pic" id="pro-gallerys" style="left: 0px;">
	                         <?php if(is_array($goods_images_list)): foreach($goods_images_list as $k=>$v): ?><li class="small-pic-li <?php if($k == 0): ?>current<?php endif; ?>"> 
	                            	<a href="javascript:void(0);">
	                                	<img src="<?php echo (get_sub_images($v,$v[goods_id],60,60)); ?>" data-img="<?php echo (get_sub_images($v,$v[goods_id],400,400)); ?>" data-big="<?php echo (get_sub_images($v,$v[goods_id],800,800)); ?>">
	                                </a>
	                            </li><?php endforeach; endif; ?>
	                        </ul>
	                    </div>
	                    <a href="javascript:;" class="pro-gallery-forward next-right"></a>
	                </div>
				</div>
                <!-- 修改的部分-end --> 
              </div>
            </div>      
            <!--商品图片轮播 end-->        
                
            <div class="right-area-num">
                <div class="right-area">
                    <div class="right-area-le30">
                        <h1><?php echo ($goods["goods_name"]); ?></h1>
                        <div class="cpxq-explain"><?php echo ($goods["goods_remark"]); ?></div>
                    </div>	
                </div>
                <div class="right-area ma-to--1">
                	
                    <!--商品促销 start-->	
                    <?php if($goods['prom_type'] == 1): ?><div class="bef_fo2" style="font-size:14px; background-color:#F60; color:#FFFFFF; line-height:30px; position:absolute; width:100%">
                            <p style="background-color:#f72862">
                              <span style="font-size:20px; padding:0px 16px 0px 26px; vertical-align:middle; ">抢购价￥<?php echo ($goods['flash_sale']['price']); ?></span>
                                <img class="clock_w" src="/Template/pc/default/Static/images/lz.png"/><span id="surplus_text">300天 01时 01分 01秒</span> 后结束，请快购买
                             </p>
                        </div>
						<script>
                            // 倒计时
                            function GetRTime2(){
								//var text = GetRTime('2016/02/27 17:34:00');
								var text = GetRTime('<?php echo (date("Y/m/d H:i:s",$goods['flash_sale']['end_time'])); ?>');								
                                $("#surplus_text").text(text);
                            }
                            setInterval(GetRTime2,1000);
                        </script><?php endif; ?>
                    <!--商品促销 end-->               
                	<div class="right-area-le30 pa-3-0-0-30">
                    	
                    	<div class="pro-promotions-area">
                            <table class="promotions-tab" width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="60px" align="right">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</td>
                                <td>
                                	<p class="co-red fo-si-24 ma-le-6">
                                    	￥<span class="co-red fo-si-24" id="goods_price"><?php echo ($goods["shop_price"]); ?></span>
                                    </p>                                    
                                </td>
                              </tr>
                              <tr>
                                <td width="60px" align="right">商品编号：</td>
								<td>
	                                <p class=" ma-le-6"><?php echo ($goods["goods_sn"]); ?> <a onClick="collect_goods(<?php echo ($goods["goods_id"]); ?>);" style="color:#00F;">收藏</a></p>                      
                            		<!--------用户评价-end---------------->                           
                                </td>
                              </tr>
                              <tr>
                                <td width="60px" align="right">商品评分：</td>
                                <td>
                                <p class="ma-le-6">
                                <span class="pf-comment"><i class="score"></i></span>
                                &nbsp;<a href=""><span>(共&nbsp;<?php echo ($goods["comment_count"]); ?>&nbsp;条评论)</span></a></p>
                                </td>
                              </tr>
                              <tr>
                                <td width="60px" align="right">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</td>
                                <td><p class="ma-le-6">满99免运费</p></td>
                              </tr>
                              <tr>
                                <td width="60px" align="right">服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：</td>
                                <td><p class="ma-le-6">由tpshop商城负责发货，并提供售后服务</p></td>
                                <td><!-- JiaThis Button BEGIN -->
									<div class="jiathis_style">
										<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt" target="_blank"><img src="http://v3.jiathis.com/code_mini/images/btn/v1/jiathis1.gif" border="0" /></a>
									</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
								<!-- JiaThis Button END -->
								</td>
                              </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <form name="buy_goods_form" method="post" id="buy_goods_form" >
                <div class="right-area he315 ma-to--1">
                	<div class="right-area-le30 pa-3-0-0-30">
                    	<div class="pro-promotions-area">
                            <table class="promotions-tab he40-tr-td" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <?php if(is_array($filter_spec)): foreach($filter_spec as $k=>$v): ?><tr>
                                <td width="60px" align="right"><?php echo ($k); ?>：</td>
                                <td>
                                    <ul class="choice-colol ma-le-6">
                                    <?php if(is_array($v)): foreach($v as $k2=>$v2): if($v2[src] != ''): ?><li>
                                        	<div class="color-sku-fant">
                                                <div class="sku <?php if($k2 == 0 ): ?>sku-bo-blo<?php endif; ?>">
													<a onClick="switch_spec(this)"><img src="<?php echo ($v2[src]); ?>"  onClick="$('#bigImage').attr('src','<?php echo ($v2[src]); ?>');$('#bigImage').attr('jqimg','<?php echo ($v2[src]); ?>');"/></a>
                                                    <input type="radio" style="display:none;" name="goods_spec[<?php echo ($k); ?>]" value="<?php echo ($v2[item_id]); ?>"  <?php if($k2 == 0 ): ?>checked="checked"<?php endif; ?>/>
                                                    <s></s>
                                                </div>
												<p><?php echo ($v2[item]); ?></p>
                                            </div>                                            
                                        </li>
								       <?php else: ?>                                        
										<li>
                                            <div class="sku  <?php if($k2 == 0 ): ?>sku-bo-blo<?php endif; ?>">
                                                <a onClick="switch_spec(this);" class="choice-size"><?php echo ($v2[item]); ?></a>
                                                <input type="radio"  style="display:none;" name="goods_spec[<?php echo ($k); ?>]" value="<?php echo ($v2[item_id]); ?>" <?php if($k2 == 0 ): ?>checked="checked"<?php endif; ?>  />
                                                <s></s>
                                            </div>
                                        </li><?php endif; endforeach; endif; ?>
                                    </ul>
                                </td>
                              </tr><?php endforeach; endif; ?>   
                              <tr>
                                <td width="60px" align="right">购买数量：</td>
                                <td>
                                    <ul class="choice-colol ma-le-6">
                                        <li>
                                            <a onClick="switch_num(-1);" class="choice-number fl" title="减" style="width:24px">-</a>
                                            <input class="wi43 fl" type="text" value="1" name="goods_num" id="goods_num" readonly/>
                                            <a onClick="switch_num(1);" class="choice-number fl" title="加" style="width:24px">+</a>
                                        </li>
                                    </ul>
                                </td>
                              </tr>
                              <?php if(empty($filter_spec)): ?><tr>
                              	<td align="right" style="vertical-align:top">送&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;货：</td>
                                <td>由TPshop商城从 全国最近点 发货，并提供售后服务。如有问题咨询在线客服~!<br/>上午08:30前完成下单下午送达,下午下单隔日第二天送达.</td>
                              </tr><?php endif; ?>
                            </table>
                        </div>
                        <div class="join-a-shopping-cart fl"><!-- location.href='<?php echo U('Home/Cart/cart');?>-->
                            <a class="jrgwc-shopping-img jrgwc-shopping-img2" onClick="javascript:AjaxAddCart(<?php echo ($goods["goods_id"]); ?>,1,1);">
                                <span>立即购买</span>
                            </a>
                    	</div>
                        <div class="join-a-shopping-cart ma-le-210 fl">
                            <a class="jrgwc-shopping-img2" onClick="javascript:AjaxAddCart(<?php echo ($goods["goods_id"]); ?>,1,0);">
                                <span>加入购物车</span>
                            </a>
                    	</div>
                    	
                    </div>
                </div>
	                <input type="hidden" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>" />
                </form>
            </div>
        </div>
    </div>
    
    <div style="display:none;" id="shopdilog">
	        <div class="ui-popup ui-popup-modal ui-popup-show ui-popup-focus">
	        <div i="dialog" class="ui-dialog">
	        <div class="ui-dialog-arrow-a"></div>
	        <div class="ui-dialog-arrow-b"></div>
	        <table class="ui-dialog-grid">
		        <tbody>
		        <tr>
			        <td i="body" class="ui-dialog-body">
				        <div i="content" class="ui-dialog-content" id="content:1459321729418" style="width: 450px; height: auto;">
					        <div id="addCartBox" class="collect-public" style="display: block;">
					        	<div class="colect-top">
					                <i class="colect-icon"></i>
					                <!--<i class="colect-fail"></i>-->
					                <div class="conect-title">
					                    <span>添加成功</span>
					                    <div class="add-cart-btn fn-clear">
					                        <a href="javascript:;" class="ui-button ui-button-f80 fl go-shopping">继续购物</a>
					                        <a href="<?php echo U('Home/Cart/index');?>" class="ui-button ui-button-122 fl">去购物车结算</a>
					                    </div>
					                </div>
					            </div>
					            <div id="watch">
					                <span>购买此宝贝的用户还购买了：</span>
					                <ul class="fn-clear buy-list">				
					                <li><a href="http://www.tp-shop.cn/item/201512CM310001099" class="watch-img" target="_blank"><img src="http://img01.fn-mart.com/C/item/2015/1231/201512C310000310/201512C310000245_134377335_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201512CM310001099" target="_blank">巨圣冬季2015新款马丁靴女 中跟粗跟保暖英伦骑士风短靴流苏套筒圆头L854174068</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">89</strong></p></li><li><a href="http://www.tp-shop.cn/item/201504CM150040438" class="watch-img" target="_blank"><img src="http://img02.fn-mart.com/C/item/2015/0415/201504C150036513/201504C150002841_817918286_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201504CM150040438" target="_blank">百依恋歌 夏装新款大码显瘦短袖T恤女士韩版图案棉打底衫</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">89</strong></p></li><li><a href="http://www.tp-shop.cn/item/201505CM210000863" class="watch-img" target="_blank"><img src="http://img03.fn-mart.com/C/item/2015/0521/201505C210000474/_328370304_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201505CM210000863" target="_blank">洁婷透气双U日用纤巧棉柔卫生巾尝4片/包</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">4.2</strong></p></li><li><a href="http://www.tp-shop.cn/item/201508CM240002876" class="watch-img" target="_blank"><img src="http://img04.fn-mart.com/C/item/2015/0824/201508C240000788/201508C240000750_047866800_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201508CM240002876" target="_blank">美纳福 真空收纳压缩袋 2特大4大4中2手卷送电泵</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">135</strong></p></li></ul>
					            </div>
					        </div>
				        </div>
			        </td>
		        </tr>
		        <tr>
			        <td i="footer" class="ui-dialog-footer" style="display: none;">
			        	<div i="statusbar" class="ui-dialog-statusbar" style="display: none;"></div>
			        	<div i="button" class="ui-dialog-button"></div>
			        </td>
		        </tr>
		        </tbody>
	        </table>
        </div>
       </div>
    </div>
    <div class="layout ma-to-20 ov-hi">
    	<div class="wi240 ov-hi fl">
        	<div class="product-history-area">
            	<div class="hi47 co-grey">
                	<h3 class="fl browse-his">推荐商品</h3>
                    <!--<span class="fr pa-15-16-0-0"><a class="del-dust cu-po"></a></span>-->
                </div>
                <div class="history-bott">
                	<ul class="history-comm">
                     <?php
 $md5_key = md5("select * from `__PREFIX__goods` where is_recommend = 1 order by goods_id desc limit 10"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__goods` where is_recommend = 1 order by goods_id desc limit 10"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li>
                        	<div>
                        		<p class="p-img-comm fl">
                                	<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img class="img-comm" src="<?php echo (goods_thum_images($v["goods_id"],60,60)); ?>" alt=""></a>
                                </p>
                        		<p class="p-name-comm">
                                	<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><?php echo ($v["goods_name"]); ?></a>
                                </p>
                        		<p class="p-price-comm">
                                	<b>¥<?php echo ($v["shop_price"]); ?></b>
                                </p>
                        	</div>
                        </li><?php endforeach; ?>
                	</ul>
                </div>                
            </div>
        </div>
    	<div class="wi940 ov-hi fr">
        	<div class="comm-param">
            	<div class="parame-title">
                	<div class="par-titles co-grey">
                    	<ul class="commodity-xq tab_li">
                    		<li class="current cliks" onClick="switch_tab(this,'tab1')">
                            	<a>商品详情</a>
                            </li>
                            <li class="cliks" onClick="switch_tab(this,'tab2')">
                            	<a>用户评价（<?php echo ($commentStatistics['c0']); ?>）</a>
                            </li>
                            <li class="cliks" onClick="switch_tab(this,'tab3')">
                            	<a>规格参数</a>
                            </li>
                            <li class="cliks" onClick="switch_tab(this,'tab4')">
                            	<a>售后服务</a>
                            </li>
                    	</ul>
                    </div>
                </div>
                	<!-------------------商品详情------------------>
            	<div class="parame-bott cliks-bn" style="display:" id="tab1">
                    <div class="commodity-num pro-feature-area">                    	
                        <div class="pro-disclaimer-area ma-to-20">
							<?php echo (htmlspecialchars_decode($goods["goods_content"])); ?>
                        </div>
                    </div>
                </div>
                    <!-------------------规格参数------------------>
                <div class="parame-bott cliks-bn" style="display:none"  id="tab3">
                    <div class="commodity-num pro-feature-area wi850">
                    	<table class="modity-zhut" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th colspan="2"><h3>商品属性</h3></th>
                          </tr>                          
                          <?php if(is_array($goods_attr_list)): foreach($goods_attr_list as $k=>$v): ?><tr>
                            <td class="wi143"><?php echo ($goods_attribute[$v[attr_id]]); ?></td>
                            <td class="pa-5-0"><?php echo ($v[attr_value]); ?></td>
                          </tr><?php endforeach; endif; ?>
                        </table>
                    </div>
                </div>
                    <!-------------------售后服务------------------>
                <div class="parame-bott cliks-bn" style="display:none"  id="tab4">
                     <div class="commodity-num pro-feature-area wi850 padding36-0-36-0">
                    	<p class="fo-si-14 li-hi-1-5 fo-fa">
                        	本产品全国联保，享受三包服务，质保期为：一年质保
                            <br>
                            如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7天内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！
                            <br>
                            售后服务电话：400-830-8300
                            <br>
                            <span>TPshop消费者官网： <a href="">http://www.tp-shop.com</a></span>
                            <br>
                        </p>
                    </div>
                </div>
                    <!-------------------用户评价------------------>
                <div class="parame-bott ov-hi" style="display:none"  id="tab2">
                            <div class="evaluation-top fo-fa di-in-bl">
                            	<div class="eval-le1 fl wi146 te-al">
                                	<span><b><?php echo ($commentStatistics['rate1']); ?></b>%</span>
                                    <em>好评度</em>
                                </div>
                            	<div class="eval-le2 fl wi123 pa-to-7">
                                	<dl>
                                		<dt>好评<em>(<?php echo ($commentStatistics['rate1']); ?>%)</em></dt>
                                		<dd><s style=" width:94%"></s></dd>
                                	</dl>
                                	<dl>
                                		<dt>中评<em>(<?php echo ($commentStatistics['rate2']); ?>%)</em></dt>
                                		<dd><s style=" width:2%"></s></dd>
                                	</dl>
                                	<dl>
                                		<dt>差评<em>(<?php echo ($commentStatistics['rate3']); ?>%)</em></dt>
                                		<dd><s style=" width:4%"></s></dd>
                                	</dl>
                                </div>
                            	<div class="eval-le3 fl wi516">
                                	<dl>
                                		<dt>买家评论事项：购买后有什么问题, 满意, 或者不不满, 都可以在这里评论出来, 这里评论全部源于真实的评论.</dt>
                                	</dl>
                                </div>
                            	<div class="eval-le4 fl wi150 pa-to-43 te-al">
                                	<a href="<?php echo U('Home/User/comment');?>">发表评价</a>
                                </div>
                            </div>
                            <div class="evaluation-cen fo-fa">
                            	<div class="eval-cen-le fl pa-le-12">
                                	<ul>
                                		<li class="curres cliks">
                                            <a href="javascript:void(0);" data-t='1'>
                                                <span>
                                                    全部评价
                                                    <em>(<?php echo ($commentStatistics['c0']); ?>)</em>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="cliks">
                                            <a href="javascript:void(0);" data-t='2'>
                                                <span>
                                                    好评
                                                    <em>(<?php echo ($commentStatistics['c1']); ?>)</em>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="cliks">
                                            <a href="javascript:void(0);" data-t='3'>
                                                <span>
                                                    中评
                                                    <em>(<?php echo ($commentStatistics['c2']); ?>)</em>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="cliks">
                                            <a href="javascript:void(0);" data-t='4'>
                                                <span>
                                                    差评
                                                    <em>(<?php echo ($commentStatistics['c3']); ?>)</em>
                                                </span>
                                            </a>
                                        </li>
                                	</ul>
                                </div>
                            </div>
                            <!--------用户评价-start--------------->
                            <!--<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.min.css" type="text/css">--->
                            <div class="evaluation-bott pa-to-25 cliks-bn" style="display:block" id="ajax_comment_return">
                            <!--ajax 然后分页数据-->
                            </div>
							<script>
                                $(document).ready(function(){
									commentType = 1; // 评论类型
                                    ajaxComment(1,1);// ajax 加载评价列表
                                });
								
								// 好评差评 切换
								$(".eval-cen-le a").click(function(){
										$(".eval-cen-le li").removeClass('curres');	
										$(this).parent().addClass('curres');	
										commentType = $(this).data('t');// 评价类型   好评 中评  差评
										ajaxComment(commentType,1);
							    });
							    								
                                 // 用ajax分页显示评论
                                function ajaxComment(commentType,page){
                                        $.ajax({
                                            type : "GET",
                                            url:"/index.php?m=Home&c=Goods&a=ajaxComment&goods_id=<?php echo ($goods['goods_id']); ?>&commentType="+commentType+"&p="+page,//+tab,
                                            success: function(data){
                                                $("#ajax_comment_return").html('');
                                                $("#ajax_comment_return").append(data);
                                            }
                                        });
                                    }	
                            </script>	
                            <!--------用户评价-end---------------->
                </div>
            </div>
            <div class="comm-param">
            	<div class="parame-title">
                	<div class="par-titles co-grey">
                    	<ul class="commodity-xq ask_tab_li consult_ul">
                    		<li class="current cliks">
                            	<a data-t='0'>全部咨询</a>
                            </li>
                            <li class="cliks">
                            	<a data-t='1'>商品咨询</a>
                            </li>
                            <li class="cliks">
                            	<a data-t='2'>支付</a>
                            </li>
                            <li class="cliks">
                            	<a data-t='3'>配送</a>
                            </li>
                            <li class="cliks">
                            	<a data-t='4'>售后</a>
                            </li>                            
                    	</ul>
                    </div>
                </div>
                <!-------------------咨询列表----------------->
            	<div class="parame-bott cliks-bn" style="display:block" id="ask_tab1">
                    <div class="commodity-num" id="ajax_consult_return">
             		<!--ajax return-->
                    </div>
                </div>    
				<script>
                    $(document).ready(function(){
                        consult_type = 0; // 咨询类型
                        ajaxConsult(consult_type,1);// ajax 加载咨询列表
                    });                   
					// 咨询类型切换
					$(".consult_ul a").click(function(){
							$(".consult_ul li").removeClass('current');	
							$(this).parent().addClass('current');	
							consult_type = $(this).data('t');// 咨询类型 商品咨询 支付咨询 配送咨询 售后咨询
							ajaxConsult(consult_type,1);
					});
					                                                                        
                     // 用ajax分页显示咨询
                    function ajaxConsult(consult_type,page){
                            $.ajax({
                                type : "GET",
                                url:"/index.php?m=Home&c=Goods&a=ajax_consult&goods_id=<?php echo ($goods['goods_id']); ?>&consult_type="+consult_type+"&p="+page,//+tab,
                                success: function(data){
                                    $("#ajax_consult_return").html('');
                                    $("#ajax_consult_return").append(data);
                                }
                            });
                        }	
                </script>                
                <!-------------------咨询列表-end---------------->                                                
                <!-------------------发表咨询------------------>
                <div class="parame-bott ma-to--21">
                    <div class="commodity-num">
                    	<div class="spxqer-top-t">
                        	<h3 class="spxqer-topt-h3">发表咨询</h3>
                        </div>
                        <div class="spxqer-cen">
                            <div class="spxqer-top pa-17-0-14">
                                <span class="colo-ora">温馨提示：</span>
                               		 因产线可能更改商品包装、产地、附配件等未及时通知，且每位咨询者购买、提问时间等不同。为此，客服给到的回复仅对提问者3天内有效，其他网友仅供参考！给您带来的不便还请谅解，谢谢！
                            </div>
                            <div class="form-edit-area">
                        		<form action="<?php echo U('Home/Goods/goodsConsult');?>" method="post" id="form_consult" name="form_consult" onSubmit="return check_form_consult(this);">
                                    <div class="form-table">
                                        <p>
                                            <b>商品咨询：</b>
                                            <input type="radio" name="consult_type" value="1" checked /><label for="">商品咨询</label>
                                            <input type="radio" name="consult_type" value="2" /><label for="">支付</label>
                                            <input type="radio" name="consult_type" value="3" /><label for="">配送</label>
                                            <input type="radio" name="consult_type" value="4" /><label for="">售后</label>
                                        </p>
                                        <p>网&nbsp;名:<input type="text" name="username" id="username" placeholder="请输入网名" /></p> 
                                        <p>内&nbsp;容:<textarea name="content" id="content"  class="textarea"></textarea></p>
                                        <p>
                                           	 验证码:<input  type="text" name="verify_code" placeholder="不区分大小写"/>
                                            <img  id="verify_code" width="80" height="40" src="/index.php?m=Home&c=Index&a=verify&type=consult&fontSize=20&length=4" />
                                            <a><img  src="/Template/pc/default/Static/images/chg_image.png"  onclick="verify(this)" /></a>                                    
                                        </p>
                                    </div>                                    
                                    <div class="form-butt">
	                                    <input type="hidden" name="goods_id" id="goods_id"  value="<?php echo ($goods['goods_id']); ?>"/>
                                        <input type="submit" class="bu-tj" value="提交">                                        
                                    </div>                                
                              </form>
                        	</div>
                        </div>
                    </div>
                </div>
                <script>
						// 商品咨询表单验证
		                function check_form_consult(f){
							if($.trim($('input[name="username"]').val()).length == 0)
							{								
								layer.msg('请填写一个网名', {
								  icon: 1,   // 成功图标
								  time: 2000 //2秒关闭（如果不配置，默认是3秒）
								});			
								
								return false;
							}
							if($.trim($('textarea[name="content"]').val()).length == 0)
							{

								layer.msg('请填输入咨询内容', {
								  icon: 1,   // 成功图标
								  time: 2000 //2秒关闭（如果不配置，默认是3秒）
								});											
								return false;
							}
							if($.trim($('input[name="verify_code"]').val()).length == 0)
							{
								layer.msg('请填输入验证码', {
								  icon: 1,   // 成功图标
								  time: 2000 //2秒关闭（如果不配置，默认是3秒）
								});																			
								return false;
							}														
								return true;							
						}
                </script>
                <!-------------------发表咨询 end----------------->  
        </div>
    </div>
    </div>

<script>





$(document).ready(function(){	
	// 更新商品价格
	get_goods_price();
    $(".jqzoom").jqueryzoom({
		xzoom: 480,
		yzoom: 480,
		offset: 30,
        position: "right",
        preload: 1,
        lens: 1
    });
});

/**
* 切换规格
*/
function switch_spec(spec)
{
	$(spec).siblings('input').trigger('click');	 // 让隐藏的 单选按钮选中
	$(spec).parent().parent().parent().parent().find("div.sku").removeClass('sku-bo-blo'); //   清空勾选图标
	$(spec).parent().addClass('sku-bo-blo'); // 当前 加上勾选图标				
	// 更新商品价格
	get_goods_price();							
}

/**
* 购买商品数量加加减减
*/
function switch_num(num)
{
	var num2 = parseInt($("#goods_num").val());
	num2 += num;
	if(num2 < 1) num2 = 1; // 保证购买数量不能少于 1
	$("#goods_num").val(num2); // 修改商品购买数量
	// 更新商品价格
	//get_goods_price();
}
// 用作 sort 排序用
function sortNumber(a,b) 
{ 
	return a - b; 
} 
 /*** 查询商品价格*/  
 function get_goods_price()
 {	 	 	

	var goods_price = <?php echo ($goods["shop_price"]); ?>; // 商品起始价
	var store_count = <?php echo ($goods["store_count"]); ?>; // 商品起始库存	

	var spec_goods_price = <?php echo ($spec_goods_price); ?>;  // 规格 对应 价格 库存表   //alert(spec_goods_price['28_100']['price']);	
	// 如果有属性选择项
	if(spec_goods_price != null)
	{
		goods_spec_arr = new Array();
		$("input[name^='goods_spec']:checked").each(function(){
			 goods_spec_arr.push($(this).val());
		});    
		var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key			
		goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格		
		store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
	}
	
	var goods_num = parseInt($("#goods_num").val()); 
	// 库存不足的情况
	if(goods_num > store_count)
	{
	   goods_num = store_count;	   
	   layer.msg('库存仅剩 '+store_count+' 件', {icon: 2}); //alert('库存仅剩 '+store_count+' 件');
	   $("#goods_num").val(goods_num);
	}	
	$("#goods_price").html(goods_price * goods_num); // 变动价格显示
 }
  
/**
* 切换 商品详情  用户评价  规格参数  包装清单  售后服务
*/
function switch_tab(cur,tab)
{
	$("#tab1,#tab2,#tab3,#tab4").hide(); // 先全部隐藏
	$("#"+tab).show();	// 再显示其中一个	
	$("ul.tab_li li").removeClass("current"); // 先全部样式去除
	$(cur).addClass("current"); //  单独的给当前点击这个加上		
}
 
// 验证码切换
function verify(){
   $('#verify_code').attr('src','/index.php?m=Home&c=Index&a=verify&type=consult&fontSize=20&length=4&r='+Math.random());
}

//缩略图切换
$('.small-pic-li').each(function(i,o){
	var lilength = $('.small-pic-li').length;
	$(o).hover(function(){
		$(o).siblings().removeClass('current');
		$(o).addClass('current');
		$('#zoomimg').attr('src',$(o).find('img').attr('data-img'));
		$('#zoomimg').attr('jqimg',$(o).find('img').attr('data-big'));
		if(i==0){
			$('.next-left').addClass('disabled');
		}
		if(i+1==lilength){
			$('.next-right').addClass('disabled');
		}
	});
})

//前一张缩略图
$('.next-left').click(function(){
	var newselect = $('.small-pic>.current').prev();
	$('.small-pic-li').removeClass('current');
	$(newselect).addClass('current');
	$('#zoomimg').attr('src',$(newselect).find('img').attr('data-img'));
	$('#zoomimg').attr('jqimg',$(newselect).find('img').attr('data-big'));
	var index = $('.small-pic>li').index(newselect);
	if(index==0){
		$('.next-left').addClass('disabled');
	}
	$('.next-right').removeClass('disabled');
})

//后前一张缩略图
$('.next-right').click(function(){
	var newselect = $('.small-pic>.current').next();
	$('.small-pic-li').removeClass('current');
	$(newselect).addClass('current');
	console.log(newselect)
	$('#zoomimg').attr('src',$(newselect).find('img').attr('data-img'));
	$('#zoomimg').attr('jqimg',$(newselect).find('img').attr('data-big'));
	var index = $('.small-pic>li').index(newselect);
	if(index+1 == $('.small-pic>li').length){
		$('.next-right').addClass('disabled');
	}
	$('.next-left').removeClass('disabled');
})
</script>
<!--------footer-开始-------------->
<div class="footer">
    <div class="layout quality layer">
        <ul class="footer_quality">
            <li><i></i>品质保证</li>
            <li  class="f2"><i></i>7天退换 15天换货</li>
            <li  class="f3"><i></i>100元起免运费</li>
            <li  class="f4"><i></i>448家维修网点 全国联保</li>
        </ul>
    </div>
    <div class="helpful layout">
    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where cat_id in(1,2,3,4,7)"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where cat_id in(1,2,3,4,7)"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><dl <?php if($k != 0): ?>class="jszc"<?php endif; ?> >
                <dt><?php echo ($v[cat_name]); ?></dt>
                <dd>
                    <ol>
                    	<?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); S("sql_".$md5_key,$sql_result_v2,TPSHOP_CACHE_TIME); } foreach($sql_result_v2 as $k2=>$v2): ?><li><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank"><?php echo ($v2[title]); ?></a></li><?php endforeach; ?>                        
                    </ol>
                </dd>
            </dl><?php endforeach; ?>
     </div>
     <div class="keep-on-record">
        <p>Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?></p>
     </div>
 </div>
 

<!--------footer-结束-------------->
</body>
</html>