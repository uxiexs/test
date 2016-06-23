(function(){
	var hotwords="<strong>\u70ed\u95e8\u641c\u7d22\uff1a</strong><a href='http://sale.jd.com/act/JKXDYAGHfj0T.html' target='_blank'>\u4e09\u661fNote 5</a><a href='http://sale.jd.com/act/7jyYKBuJ6pgekixD.html' target='_blank'>919\u4e50\u8ff7\u8282</a><a href='http://sale.jd.com/act/se8E6pClSVL0vGdY.html' target='_blank'>\u5947\u9177\u9752\u6625\u7248</a><a href='http://sale.jd.com/act/oAdqn7ZuClg3QrTp.html' target='_blank'>79\u51433\u4ef6</a><a href='http://sale.jd.com/act/I8DQikJSaYr.html' target='_blank'>R7\u5df4\u8428\u5b9a\u5236\u7248</a><a href='http://sale.jd.com/act/JQEejltvBDkm02Y.html' target='_blank'>\u4e2d\u5174\u5a01\u6b663</a>"; 
	var keywords="\u8363\u80007i";
	$("#hotwords").html(hotwords);
	$("#key").val(keywords).bind("focus",function(){
		if (this.value==keywords){this.value="";this.style.color="#333"}
	}).bind("blur",function(){
		if (this.value==""){this.value=keywords;this.style.color="#999"}
	});
})();