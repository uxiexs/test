/*
* author :shi
*/
(function(window,$,undefined){
        
    if(!$.browser){
      $.extend({
        browser:function(){
            var ua = navigator.userAgent.toLowerCase();
            ret="";
            if(/Firefox/g.test(ua)){
                ua=ua.split(" ");
            ret="Firefox|"+ua[ua.length-1].split("/")[1];
            }else if(/MSIE/g.test(ua)){
                ua=ua.split(";");
                ret="IE|"+ua[1].split(" ")[2];
            }else if(/Opera/g.test(ua)){
                ua=ua.split(" ");
                ret="Opera|"+ua[ua.length-1].split("/")[1];
            }else if(/Chrome/g.test(ua)){
                ua=ua.split(" ");
                ret="Chrome|"+ua[ua.length-2].split("/")[1];
            }else if(/^apple\s+/i.test(navigator.vendor)){
                ua=ua.split(" ");
                ret="Safari|"+ua[ua.length-2].split("/")[1];
            }else{
                ret="unknown";
            }
         return ret.split("|");
        }
      });
    }
    $.extend($.browser,{
        ie6:function(){
            return !('maxHeight' in document.documentElement.style);
        },
        lteIe8:function(){
            return '\v'=='v';
        },
        msie:function(){
            return $.browser()[0] =='IE';
        },
        moz:function(){
            return $.browser()[0] =='Firefox';
        },
        chrome:function(){
            return $.browser()[0] =='Chrome';
        },
        opera:function(){
            return $.browser()[0] =='Opera';
        },
        safari:function(){
            return $.browser()[0] =='Safari';
        },
        name:function(){
            return $.browser()[0];
        },
        version:function(){
            //  防止360se、Sougou Browser等壳浏览器修改UA导致判断不准确
            if($.browser.msie){
                var v = 3,
                div = document.createElement('div'),
                all = div.getElementsByTagName('i');
                while (
                    div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
                    all[0]
                );  
                ieversion = v > 4 ? v : false;
                if(ieversion){
                    return ieversion;
                }
            }
            var v_num = $.browser()[1].split("."),
            v = 0;
            if(v_num[1]){
                v = v_num[0] + "." +v_num[1];
            }
            else{
                v = v_num[0] + ".0";
            }

            return parseInt(v);
        }
    });
})(window,jQuery)
