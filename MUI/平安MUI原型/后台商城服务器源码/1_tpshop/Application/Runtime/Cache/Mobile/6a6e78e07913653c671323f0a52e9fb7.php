<?php if (!defined('THINK_PATH')) exit();?>
 <?php if(is_array($cartList)): foreach($cartList as $k=>$v): ?><div  class="block" style="margin-top:0px;">
      <div class="shop_title" >
        <div class="fl"><a class="shopLink eclipse" href="supplier.php?suppId=7">供货商：TPshop商城</a>
        <input type="hidden" name="supplierid" id="supplierid" value="7"></div>
      </div>   
      <div class="item-list">
       <div class="item">
         <div class="inner">
           <div style="width:60%; float:left; height:98px;">
             <div class="check-wrapper">
              <span  class="cart-checkbox  <?php if($v[selected] == 1): ?>checked<?php endif; ?>">
                 <input type="checkbox" autocomplete="off" name="cart_select[<?php echo ($v["id"]); ?>]" <?php if($v[selected] == 1): ?>checked="checked"<?php endif; ?>  style="display:none;" value="1" onclick="ajax_cart_list();">
              </span>
             </div>
             <div  class="pic">
                 <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img src="<?php echo (goods_thum_images($v["goods_id"],200,200)); ?>"></a>
             </div>
             
             <div class="name">
               <span>  <?php echo ($v["goods_name"]); ?> </span>
             </div>
             <div class="attr">
                 <span><?php echo ($v["spec_key_name"]); ?></span>
             </div>
             <div class="num">
                 <div class="xm-input-number">
                   <div class="act_wrap">
                     <a href="javascript:;" onclick="switch_num(-1,<?php echo ($v["id"]); ?>,<?php echo ($v["store_count"]); ?>);" id="jiannum6" class="input-sub active"></a>
                     		<input id="goods_num[<?php echo ($v["id"]); ?>]" type="text" onKeyDown='if(event.keyCode == 13) event.returnValue = false' name="goods_num[<?php echo ($v["id"]); ?>]"  value="<?php echo ($v["goods_num"]); ?>"  class="input-num"  onblur="ajax_cart_list()"/>
                     	<a href="javascript:;" onclick="switch_num(1,<?php echo ($v["id"]); ?>,<?php echo ($v["store_count"]); ?>);"  class="input-add active"></a>
                     </div>
                  </div>                 
             </div>
           </div>
           <div style=" position:absolute; right:0px; top:20px; width:100px; height:98px;">
             <div class="price">
               <span class="mar_price">￥<?php echo ($v["market_price"]); ?>元</span>
               <br>
               <span>￥<?php echo ($v["member_goods_price"]); ?>元</span>
              </div>
             <div class="delete">
               <a href="javascript:void(0);" onclick="del_cart_goods(<?php echo ($v["id"]); ?>)">
                 <div class="icon-shanchu"></div>
               </a>
             </div>
           </div>
           <div style="height:0px; line-height:0px; clear:both;"></div>
         </div>
         <div class="append"></div>
       </div>
     </div>
    </div><?php endforeach; endif; ?>
<?php if(empty($cartList)): ?><div class="screen-wrap fullscreen login">
<section id="cart-content">
      <div class="qb_tac" style="padding:50px 0">
        <img src="/Template/mobile/new/Static/images/flow/empty_cart.png" width="100" height="95">
        <br>购物车还是空的</div>
      <div class="qb_gap" style="width:60%; margin:0 auto;">
        <a href="<?php echo U('Index/index');?>" class="mod_btn btn_strong">马上逛逛</a>
      </div>
</section>
<div style="height:72px;"></div>
<section class="f_mask" style="display: none;"></section>
<section class="f_block" id="choose" style="height:0px;"></section> 
<script type="text/javascript">
  function showCheckoutOther(obj)
  {
    var otherParent = obj.parentNode;
    otherParent.className = (otherParent.className=='checkout_other') ? 'checkout_other2' : 'checkout_other';
    var spanzi = obj.getElementsByTagName('span')[0];
    spanzi.className= spanzi.className == 'right_arrow_flow' ? 'right_arrow_flow2' : 'right_arrow_flow';
  }
</script> 
</div>
 <?php else: ?>
	 <div class="bottom-panel">
	    <div class="quanxuan">
	     <div class="check-wrapper">
	        <span class="cart-checkbox" onclick="chkAll_onclick()"></span><span class="cart-checktext">全选</span>
	     </div>
	   </div>
	   <div class="info">
	     <span class="hot" id="cart_amount_desc"><em>总计：</em>￥<?php echo ($total_price["total_fee"]); ?>元</span>
	     <br>
	     <span class="hot_text">不含运费</span>
	   </div>
	   <div class="right">
	     <input type="button" href="javascript:void();"  onclick="return selcart_submit();" class="xm-button " value="去结算"></div>
	</div><?php endif; ?> 
<script type="text/javascript">
$(".check-wrapper .cart-checkbox").click(function(){
	if($(this).hasClass('checked')){
		$(this).removeClass('checked');
		$(this).find('input').attr('checked',false);
	}else{
		$(this).addClass('checked');
		$(this).find('input').attr('checked',true);
	}
	ajax_cart_list();
})

var is_checked = true;
$('.inner .cart-checkbox').each(function(){
	  if(!$(this).hasClass('checked'))
	  {
	       is_checked = false;
	       return false;
	  }
});
if(is_checked){
  	$('.quanxuan .cart-checkbox').addClass('checked'); 
}else
{
  	$('.quanxuan .cart-checkbox').removeClass('checked'); 
} 
	
function chkAll_onclick() 
{
  if($('.quanxuan .cart-checkbox').hasClass('checked')){	  
    $('.quanxuan .cart-checkbox').removeClass('checked');
    $('.inner .cart-checkbox').removeClass('checked');
    $("input[name^='cart_select']").prop('checked',false);
    is_checked = false;
  }   
  else{
    $('.quanxuan .cart-checkbox').addClass('checked');
    $('.inner .cart-checkbox').addClass('checked');
    $("input[name^='cart_select']").prop('checked',true);
    is_checked = true;
  }
  ajax_cart_list();
}

function del_cart_goods(goods_id)
{
    if(!confirm('确定要删除吗?'))
        return false;
    var chk_value = [];
    chk_value.push(goods_id);
    // ajax调用删除
    if(chk_value.length > 0)
        ajax_del_cart(chk_value.join(','));
}


function selcart_submit()
{
     var j=0;
	 $('input[name^="cart_select"]:checked').each(function(){
	       j++;
	 });
     if (j>0)
     {
		  window.location.href="<?php echo U('Mobile/Cart/cart2');?>"
     }
     else
     {   
	     alert('请选择要结算的商品！');
	     return false;
    }
}
</script>