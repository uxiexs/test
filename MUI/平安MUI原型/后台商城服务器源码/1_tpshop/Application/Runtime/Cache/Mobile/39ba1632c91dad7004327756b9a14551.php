<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>所有分类-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="/Template/mobile/new/Static/css/public.css"/>
<link rel="stylesheet" type="text/css" href="/Template/mobile/new/Static/css/catalog.css"/>
<script type="text/javascript" src="/Template/mobile/new/Static/js/jquery.js"></script>
<style>
.goods_nav{ width:30%; float:right; right:5px; overflow:hidden; position:fixed;margin-top:25px; z-index:9999999}
</style>
</head>
<body>
<!--分类切换--> 
<div class="container">    
  <div class="category-box">
    <div class="category1" style="outline: none;" tabindex="5000">
      <ul class="clearfix" style="padding-bottom:50px;">
      <?php $m = '0'; ?>
	    <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$vo): if($vo[level] == 1): ?><li <?php if($m == 0): ?>class='cur' style='margin-top:46px'<?php endif; ?> data-id="<?php echo ($m++); ?>"><?php echo (getSubstr($vo['mobile_name'],0,12)); ?></li><?php endif; endforeach; endif; ?>
      </ul>
    </div>
    <div class="category2" style=" outline: none;" tabindex="5001">
    <?php $j = '0'; ?>
    <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $kk=>$vo): ?><dl style="margin-top:46px;padding-bottom:50px;<?php if($j == 0): ?>display:block;<?php else: ?>display:none;<?php endif; ?>" data-id="<?php echo ($j++); ?>"> 
        <span>
			<a href="category.php?id=<?php echo ($cat["id"]); ?>">
	        <em>全部>></em>
			<img src="/Template/mobile/new/Static/images/catalog.jpg"></a>
		</span>		
        <?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): ?><dt><a href="<?php echo U('Mobile/Goods/goodsList',array('id'=>$v2[id]));?>" ><?php echo ($v2['name']); ?></a></dt> 
        <dd> 
	        <div class="fenimg">
		        <?php if(is_array($v2["sub_menu"])): foreach($v2["sub_menu"] as $key=>$v3): ?><div class="fen">
			        	<a href="<?php echo U('Mobile/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3['name']); ?></a> 
			        </div><?php endforeach; endif; ?>
	    	</div>
        </dd><?php endforeach; endif; ?>
      </dl><?php endforeach; endif; ?>
    </div>
  </div>
</div>
<!---切换js----->
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
<script>

$(function () {
    //滚动条
    $(".category1,.category2").niceScroll({ cursorwidth: 0,cursorborder:0 });

    //图片延迟加载
 	//$(".lazyload").scrollLoading({ container: $(".category2") });
    //$('.category-box').height($(window).height());

    //点击切换2 3级分类
	var array=new Array();
	$('.category1 li').each(function(){ 
		array.push($(this).position().top-0);
	});
	
	$('.category1 li').click(function() {
		var index=$(this).index();
		$('.category1').delay(200).animate({scrollTop:array[index]},300);
		$(this).addClass('cur').siblings().removeClass();
		$('.category2 dl').eq(index).show().siblings().hide();
        $('.category2').scrollTop(0);
	});

});
</script>
<script src="/Template/mobile/new/Static/js/jquery.nicescroll.min.js"></script> 
</body>
</html>