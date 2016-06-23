seajs.use('jdf/1.0.0/unit/globalInit/1.0.0/globalInit');
seajs.use(['jdf/1.0.0/ui/switchable/1.0.0/switchable'],function(switchable){
  $('#tab').switchable({
          navItem:'list-item',
          navSelectedClass:'current',
          mainClass:'tabcon'
      });
  $('#faq-tabs').switchable({
    navItem:'list-item',
    navSelectedClass:'current',
    mainClass:'tabcon'
  });
  $('#tabs-flex').switchable({
    navItem:'list-item',
    navSelectedClass:'current',
    mainClass:'tabcon'
  });
  $('#tabs-flex2015').switchable({
    navItem:'list-item',
    navSelectedClass:'current',
    mainClass:'tabcon'
  });
  $('.tab-g-it').switchable({
    navItem:'list-item',
    navSelectedClass:'current',
    mainClass:'tabcon'
  });
});
$('#checkLogin').bind('click',function(){ 
    seajs.use('jdf/1.0.0/unit/login/1.0.0/login',function(login){ 
        login({ 
            //firstCheck:false, 
            modal: true,//false
            complete: function() {
         $('body').dialog({
            title:'',
            width:760,
			height:568,
			autoIframe:false,   
            type:'iframe',
            source:orderListUrl
        }); 
         fillPin();
            } 
        }) 
    }) 
});
seajs.use(['jdf/1.0.0/ui/placeholder/1.0.0/placeholder'], function(){
    $('.f-text[placeholder]').placeholder({
     color:'#9e9e9e',
         isValue: true
    });
});
$(function(){
  $(".all-selfservice-box .lump-list").hover(function(){$(this).addClass("hover")},function(){$(this).removeClass("hover")})
  $(".subside-mod .title").click(
    function(){
      if($(this).parent(".subside-mod").hasClass("on")){$(this).parent(".subside-mod").removeClass("on")}else{
        $(this).parent(".subside-mod").addClass("on")
      }
    });
  
})
