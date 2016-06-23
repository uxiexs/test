<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
<meta name="Generator" content="TPshop v1.1" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>首页-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="/Template/mobile/new/Static/css/public.css"/>
<link rel="stylesheet" type="text/css" href="/Template/mobile/new/Static/css/index.css"/>
<script type="text/javascript" src="/Template/mobile/new/Static/js/jquery.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/TouchSlide.1.1.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/jquery.json.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/touchslider.dev.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/layer.js" ></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/common.js"></script>

</head>
<body>
<div id="page" class="showpage">
<div>
<!--<header id="header"> -->
<!--<a href="<?php echo U('Goods/categoryList');?>" class="top_bt"></a><a href="<?php echo U('Cart/cart');?>" class='user_btn'></a>-->
<!--<span href="javascript:void(0)" class="logo">TPshop商城</span> -->
<!--</header>-->

<div id="scrollimg" class="scrollimg">
  <div class="bd">
	 <ul>
	 	<?php $pid =2;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("5")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 5- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><li><a href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> ><img src="<?php echo ($v[ad_code]); ?>" title="<?php echo ($v[title]); ?>"width="100%" style="<?php echo ($v[style]); ?>"/></a></li><?php endforeach; ?>                        
     </ul>
  </div>
  <div class="hd">
	<ul></ul>
  </div>
</div>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#scrollimg",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPage:true,//自动分页
		autoPlay:true //自动播放
	});
</script> 
<div id="fake-search" class="index_search">
  <div class="index_search_mid">
  <span><img src="/Template/mobile/new/Static/images/xin/icosousuo.png"></span>
    <input  type="text" id="search_text" class="search_text" value="请输入您所搜索的商品"/>
  </div>
</div>
<div class="entry-list clearfix">
	<nav>
		<ul>
			<li>
				<a href="<?php echo U('Goods/categoryList');?>">
					<img alt="全部分类" src="/Template/mobile/new/Static/images/1440437165699930301.png" />
					<span>全部分类</span>
				</a>
			</li>		 
			<li>
				<a href="<?php echo U('User/order_list');?>">
					<img alt="我的订单" src="/Template/mobile/new/Static/images/1440439318451279676.png" />
					<span>我的订单</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Cart/cart');?>">
					<img alt="购物车" src="/Template/mobile/new/Static/images/1440439353048484531.png" />
					<span>购物车</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('User/index');?>">
					<img alt="个人中心" src="/Template/mobile/new/Static/images/1440439367001464442.png" />
					<span>个人中心</span>
				</a>
			</li>
		</ul>
	</nav>
</div>
 
<div class="floor_images">
	  <dl>
	    <dt><a href="javascript:void(0);"><img src="/Template/mobile/new/Static/images/jmpic/1442452784680942491.jpg" width="1" height="1" border="0"></a> </dt><dd> 
	    <span class="Edge"><a href="javascript:void(0);"><img src="/Template/mobile/new/Static/images/jmpic/1442452795423958325.jpg" width="1" height="1" border="0"></a> </span> 
		<span><a href="javascript:void(0);"><img src="/Template/mobile/new/Static/images/jmpic/1442452805449188441.jpg" width="1" height="1" border="0"></a> </span> </dd>
	  </dl>
	  <ul>
	    <li class="brom"><a href="javascript:void(0);"><img src="/Template/mobile/new/Static/images/jmpic/1442452825847922639.jpg" width="1" height="1" border="0"></a></li>
	    <li><a href="javascript:void(0);"><img src="/Template/mobile/new/Static/images/jmpic/1442452879563390604.jpg" width="1" height="1" border="0"></a></li>
	  </ul>
</div>
<script>
/* 
var Tday = new Array();
var daysms = 24 * 60 * 60 * 1000
var hoursms = 60 * 60 * 1000
var Secondms = 60 * 1000
var microsecond = 1000
var DifferHour = -1
var DifferMinute = -1
var DifferSecond = -1
function clock(key)
{
   var time = new Date()
   var hour = time.getHours()
   var minute = time.getMinutes()
   var second = time.getSeconds()
   var timevalue = ""+((hour > 12) ? hour-12:hour)
   timevalue +=((minute < 10) ? ":0":":")+minute
   timevalue +=((second < 10) ? ":0":":")+second
   timevalue +=((hour >12 ) ? " PM":" AM")
   var convertHour = DifferHour
   var convertMinute = DifferMinute
   var convertSecond = DifferSecond
   var Diffms = Tday[key].getTime() - time.getTime()
   DifferHour = Math.floor(Diffms / daysms)
   Diffms -= DifferHour * daysms
   DifferMinute = Math.floor(Diffms / hoursms)
   Diffms -= DifferMinute * hoursms
   DifferSecond = Math.floor(Diffms / Secondms)
   Diffms -= DifferSecond * Secondms
   var dSecs = Math.floor(Diffms / microsecond)
  
   if(convertHour != DifferHour) a=DifferHour+":";
   if(convertMinute != DifferMinute) b=DifferMinute+":";
   if(convertSecond != DifferSecond) c=DifferSecond+"分"
     d=dSecs
     if (DifferHour>0) {a=a}
     else {a=''}
   document.getElementById("jstimerBox"+key).innerHTML = a + b + c ; //显示倒计时信息
}
*/
 
 
	// 倒计时
	function GetRTime2(){
		//var text = GetRTime('2016/02/27 17:34:00');
	   <?php
 $md5_key = md5("select * from __PREFIX__goods as g inner join __PREFIX__flash_sale as f on g.goods_id = f.goods_id limit 3"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods as g inner join __PREFIX__flash_sale as f on g.goods_id = f.goods_id limit 3"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?>var text<?php echo ($v[goods_id]); ?> = GetRTime('<?php echo (date("Y/m/d H:i:s",$v["end_time"])); ?>');								
		$("#surplus_text<?php echo ($v[goods_id]); ?>").text(text<?php echo ($v[goods_id]); ?>);<?php endforeach; ?>
	}
	setInterval(GetRTime2,1000);
</script>
<section class="index_floor_lou">
	  <div class="floor_body">
	    <h2>
	      <em></em>促销商品<div class="geng"><a href="<?php echo U('Goods/search',array('q'=>'促销'));?>">更多</a><span></span></div>
	    </h2>
	    <div id="scroll_promotion">
	        <ul>
	         <?php
 $md5_key = md5("select * from __PREFIX__goods as g inner join __PREFIX__flash_sale as f on g.goods_id = f.goods_id limit 3"); $sql_result_val = S("sql_".$md5_key); if(empty($sql_result_val)) { $Model = new \Think\Model(); $result_name = $sql_result_val = $Model->query("select * from __PREFIX__goods as g inner join __PREFIX__flash_sale as f on g.goods_id = f.goods_id limit 3"); S("sql_".$md5_key,$sql_result_val,TPSHOP_CACHE_TIME); } foreach($sql_result_val as $key=>$val): ?><li>
	            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" title="<?php echo ($val["goods_name"]); ?>"></a>
	            <div class="index_pro">
		            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$val[goods_id]));?>" title="<?php echo ($val["goods_name"]); ?>"> 
		              <div class="products_kuang">
		              	<div class="timerBox" id="surplus_text<?php echo ($val[goods_id]); ?>">1时 59分 59秒</div>
		                <img src="<?php echo (goods_thum_images($val["goods_id"],400,400)); ?>">
		              </div>
		              <div class="goods_name"><?php echo ($val["goods_name"]); ?></div>
		            </a>
		              <div class="price">
                      <a href="javascript:AjaxAddCart(<?php echo ($val[goods_id]); ?>,1,0);" class="btns">
		                  <img src="/Template/mobile/new/Static/images/index_flow.png">
                      </a>
		                <span class="price_pro">￥<?php echo ($val["price"]); ?>元</span>
		              </div>
				</div>
	          </li><?php endforeach; ?>
	        </ul>
	    </div>
	</div>
</section>
  
<div class="floor_images">
	  <dl>
        <dt><a href="javascript:void(0);" ><img src="/Template/mobile/new/Static/images/jmpic/1442452886830104584.jpg" width="1" height="1" border="0"></a> </dt><dd> 
        <span class="Edge"><a href="javascript:void(0);" ><img src="/Template/mobile/new/Static/images/jmpic/1442452895055966978.jpg" width="1" height="1" border="0"></a> </span> 
        <span><a href="javascript:void(0);" ><img src="/Template/mobile/new/Static/images/jmpic/1442452904186438097.jpg" width="1" height="1" border="0"></a> </span> </dd> 
      </dl>
	<strong> <a href="javascript:void(0);" ><img src="/Template/mobile/new/Static/images/jmpic/1442451951800521976.jpg" width="1" height="1" border="0"></a> </strong>
</div>
 
<section class="index_floor">
  <div class="floor_body1">
    <h2><em></em>精品推荐<div class="geng"> <a href="<?php echo U('Goods/search',array('q'=>'精品'));?>">更多</a> <span></span></div></h2>
    <div id="scroll_best" class="scroll_hot">
      <div class="bd">
        <ul>
        <?php $fl = '1'; ?>
         <?php
 $md5_key = md5("select * from __PREFIX__goods where is_recommend=1 order by sort limit 9"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods where is_recommend=1 order by sort limit 9"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li>
            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" title="<?php echo ($v["goods_name"]); ?>">
             <div class="index_pro"> 
	              <div class="products_kuang">
	                <img src="<?php echo (goods_thum_images($v["goods_id"],400,400)); ?>"></div>
	              <div class="goods_name"><?php echo ($v["goods_name"]); ?></div>
	              <div class="price">
	                 <a href="javascript:AjaxAddCart(<?php echo ($v[goods_id]); ?>,1,0);" class="btns">
	                    <img src="/Template/mobile/new/Static/images/index_flow.png">
	                 </a>
	                 <span href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" class="price_pro">￥<?php echo ($v["shop_price"]); ?>元</span>
	              </div>
              </div>
            </a>
           </li>
           <?php if(($fl++%3 == 0) && ($fl < 9)): ?></ul><ul><?php endif; endforeach; ?>
           </ul>
       </div>
       <div class="hd">
          <ul></ul>
       </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    TouchSlide({ 
      slideCell:"#scroll_best",
      titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
      effect:"leftLoop", 
      autoPage:true, //自动分页
      //switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
  </script>
<section class="index_floor">
  <div class="floor_body1" >
    <h2>
      <em></em>
      新品上市      <div class="geng"><a href="<?php echo U('Goods/search',array('q'=>'新品'));?>" >更多</a> <span></span></div>
    </h2>
    <div id="scroll_new" class="scroll_hot">
      <div class="bd">
        <ul>
        <?php $fl = '1'; ?>
         <?php
 $md5_key = md5("select * from __PREFIX__goods where is_new=1 order by sort limit 9"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods where is_new=1 order by sort limit 9"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li>
            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" title="<?php echo ($v["goods_name"]); ?>">
             <div class="index_pro"> 
	              <div class="products_kuang">
	                <img src="<?php echo (goods_thum_images($v["goods_id"],400,400)); ?>"></div>
	              <div class="goods_name"><?php echo ($v["goods_name"]); ?></div>
	              <div class="price">
	                 <a href="javascript:AjaxAddCart(<?php echo ($v[goods_id]); ?>,1,0);" class="btns">
	                    <img src="/Template/mobile/new/Static/images/index_flow.png">
	                 </a>
	                 <span href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" class="price_pro">￥<?php echo ($v["shop_price"]); ?>元</span>
	              </div>
              </div>
            </a>
           </li>
           <?php if(($fl++%3 == 0) && ($fl < 9)): ?></ul><ul><?php endif; endforeach; ?></ul>
        </div>
        <div class="hd">
          <ul></ul>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    TouchSlide({ 
      slideCell:"#scroll_new",
      titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
      effect:"leftLoop", 
      autoPage:true, //自动分页
      //switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
  </script>
<section class="index_floor">
  <div class="floor_body1" >
    <h2><em></em>热销商品<div class="geng"><a href="<?php echo U('Goods/search',array('q'=>'热销'));?>" >更多</a> <span></span></div></h2>
    <div id="scroll_hot" class="scroll_hot">
      <div class="bd">
        <ul>
        <?php $fl = '1'; ?>
         <?php
 $md5_key = md5("select * from __PREFIX__goods where is_hot=1 order by sort limit 9"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods where is_hot=1 order by sort limit 9"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li>
            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" title="<?php echo ($v["goods_name"]); ?>">
             <div class="index_pro"> 
	              <div class="products_kuang">
	                <img src="<?php echo (goods_thum_images($v["goods_id"],400,400)); ?>"></div>
	              <div class="goods_name"><?php echo ($v["goods_name"]); ?></div>
	              <div class="price">
	                 <a href="javascript:AjaxAddCart(<?php echo ($v[goods_id]); ?>,1,0);" class="btns">
	                    <img src="/Template/mobile/new/Static/images/index_flow.png">
	                 </a>
	                 <span href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" class="price_pro">￥<?php echo ($v["shop_price"]); ?>元</span>
	              </div>
              </div>
            </a>
           </li>
           <?php if(($fl++%3 == 0) && ($fl < 9)): ?></ul><ul><?php endif; endforeach; ?></ul>
          </div>
        <div class="hd">
          <ul></ul>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    TouchSlide({ 
      slideCell:"#scroll_hot",
      titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
      effect:"leftLoop", 
      autoPage:true, //自动分页
      //switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
  </script>
 
 
<section class="index_floor_lou">
    <div class="floor_body ">
        <h2>
            <em></em><div class="geng"><a href="javascript:void(0);" >更多</a> <span></span></div>
         </h2>
        <ul>
         </ul>
    </div>
</section> 
 
<div id="index_banner" class="index_banner">
	<div class="bd">
		<ul>
	       <li><a href="javascript:void(0);"><img src="/Template/mobile/new/Static/images/jmpic/1442452784680942491.jpg" width="100%" /></a></li>
           <li><a href="javascript:void(0);"><img src="/Template/mobile/new/Static/images/jmpic/1442452886830104584.jpg" width="100%" /></a></li>           
	    </ul>
	</div>
	<div class="hd">
		<ul>         
        </ul>
	</div>
</div>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#index_banner",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPage:true,//自动分页
		autoPlay:true //自动播放
	});
</script>
   
<script type="text/javascript">
var url = "index.php?m=Mobile&c=Index&a=ajaxGetMore";
$(function(){
	//$('#J_ItemList').more({'address': url});
	getGoodsList();
});

var page = 1;
function getGoodsList(){
	$('.get_more').show();
	$.ajax({
		type : "get",
		url:"/index.php?m=Mobile&c=Index&a=ajaxGetMore&p="+page,
		dataType:'html',
		success: function(data)
		{
			if(data){
				$("#J_ItemList>ul").append(data);
				page++;
				$('.get_more').hide();
			}else{
				$('.get_more').hide();
				$('#getmore').remove();
			}
		}
	}); 
}
</script> 
<div class="floor_body2" >
  <h2>————&nbsp;猜你喜欢&nbsp;————</h2>
  <div id="J_ItemList">
    <ul class="product single_item info">
    </ul>
    <a href="javascript:;" class="get_more" style="text-align:center; display:block;"> 
    <img src='/Template/mobile/new/Static/images/category/loader.gif' width="12" height="12"> </a> 
  </div>
  <div id="getmore" style="font-size:.24rem;text-align: center;color:#888;padding:.25rem .24rem .4rem;">
  	<a href="javascript:void(0)" onClick="getGoodsList()">点击加载更多</a>
  </div>
</div>
<div class="footer" >
	      <div class="links"  id="TP_MEMBERZONE"> 
	      		<?php if($user_id > 0): ?><a href="<?php echo U('User/index');?>"><span><?php echo ($user["nickname"]); ?></span></a><a href="<?php echo U('User/logout');?>"><span>退出</span></a>
	      		<?php else: ?>
	      		<a href="<?php echo U('User/login');?>"><span>登录</span></a><a href="<?php echo U('User/reg');?>"><span>注册</span></a><?php endif; ?>
	      		<a href="#"><span>反馈</span></a><a href="javascript:window.scrollTo(0,0);"><span>回顶部</span></a>
		  </div>
	      <!--<ul class="linkss" >-->
		      <!--<li>-->
		        <!--<a href="#">-->
		        <!--<i class="footerimg_1"></i>-->
		        <!--<span>客户端</span></a></li>-->
		      <!--<li>-->
		      <!--<a href="javascript:;"><i class="footerimg_2"></i><span class="gl">触屏版</span></a></li>-->
		      <!--<li><a href="<?php echo U('Home/Index/index');?>" class="goDesktop"><i class="footerimg_3"></i><span>电脑版</span></a></li>-->
	      <!--</ul>-->
	  	 <!--<p class="mf_o4">备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?><br/>&copy; 2005-2016 TPshop多商户V1.2 版权所有，并保留所有权利。</p>-->
</div>
<script>
function goTop(){
	$('html,body').animate({'scrollTop':0},600);
}
</script>
<a href="javascript:goTop();" class="gotop"><img src="/Template/mobile/new/Static/images/topup.png"></a> 
</div>
 
 
 <div id="search_hide" class="search_hide">
 <h2> <span class="close"><img src="/Template/mobile/new/Static/images/close.png"></span>关键搜索</h2>
 <div id="mallSearch" class="search_mid">
        <div id="search_tips" style="display:none;"></div>
          <ul class="search-type">
          	<li  class="cur"  num="0">宝贝</li>
          	<!--<li  num="1">店铺</li>-->
          </ul>	
          <div class="searchdotm"> 
          <form class="set_ip"name="sourch_form" id="sourch_form" method="post" action="<?php echo U('Goods/search');?>">
              <div class="mallSearch-input">
                <div id="s-combobox-135">
                    <input class="s-combobox-input" name="q" id="q"  placeholder="请输入关键词"  type="text" value="<?php echo I('q'); ?>" />
                </div>                                                
                <input type="button" value="" class="button"  onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();" />
              </div>
          </form>
         </div> 
        </div>
 		<!--
		<div class="search_body">
		<div class="search_box">
		<form action="search.php" method="post" id="searchForm" name="searchForm">
		<div>
		<select id='search_type' name="search_type" style="width:15%;">
			<option value='search'>宝贝</option>
			<option value='stores'>店铺</option>
		</select>
		     <input class="text" type="search" name="keywords" id="keywordBox" autofocus>
		     <button type="submit" value="搜 索" ></button>
		</div>
		</form>
	    </div>
		</div>
       -->              
    	<section class="mix_recently_search"><h3>热门搜索</h3>
	     <ul>
            <?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><li><a href="<?php echo U('Goods/search',array('q'=>$wd));?>" <?php if($k == 0): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a></li><?php endforeach; endif; ?>         
	      </ul>
        </section>
    </div>
                                             
</div>
<div style="height:50px; line-height:50px; clear:both;"></div>
<div class="v_nav">
	<div class="vf_nav">
		<ul>
			<li> <a href="<?php echo U('Index/index');?>">
			    <i class="vf_1"></i>
			    <span>首页</span></a></li>
			<li><a href="tel:<?php echo ($tpshop_config['shop_info_phone']); ?>">
			    <i class="vf_2"></i>
			    <span>客服</span></a></li>
			<li><a href="<?php echo U('Goods/categoryList');?>">
			    <i class="vf_3"></i>
			    <span>分类</span></a></li>
			<li>
			<a href="<?php echo U('Cart/cart');?>">
			   <em class="global-nav__nav-shop-cart-num" id="ECS_CARTINFO" style="right:9px;"> <?php echo ($cart_total_price[anum]); ?> </em>
			   <i class="vf_4"></i>
			   <span>购物车</span>
			   </a>
			</li>
			<li><a href="<?php echo U('User/index');?>">
			    <i class="vf_5"></i>
			    <span>我的</span></a>
			</li>
		</ul>
	</div>
</div> 
 
<script type="text/javascript">
$(function() {
    $('#search_text').click(function(){
        $(".showpage").children('div').hide();
        $("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
    })
    $('#get_search_box').click(function(){
        $(".showpage").children('div').hide();
        $("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
    })
    $("#search_hide .close").click(function(){
        $(".showpage").children('div').show();
        $("#search_hide").hide();
    })
});
</script>
<script>
$('.search-type li').click(function() {
    $(this).addClass('cur').siblings().removeClass('cur');
    $('#searchtype').val($(this).attr('num'));
});
$('#searchtype').val($(this).attr('0'));
</script>
</body>
</html>