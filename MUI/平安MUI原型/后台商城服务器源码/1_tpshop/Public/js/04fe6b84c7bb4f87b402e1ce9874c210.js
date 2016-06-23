(function(){
	var hotwords="<strong>\u70ed\u95e8\u641c\u7d22\uff1a</strong><a href='http://search.jd.com/Search?keyword=%E9%AD%94%E9%94%A5%E8%80%B3%E6%9C%BA&enc=utf-8&jdr=hot' target='_blank'>\u9b54\u9525\u8033\u673a</a><a href='http://search.jd.com/Search?keyword=%E6%99%BA%E8%83%BD%E7%94%B5%E8%A7%86&enc=utf-8&jdr=hot' target='_blank'>\u667a\u80fd\u7535\u89c6</a><a href='http://search.jd.com/Search?keyword=%E8%A1%A5%E6%B0%B4%E9%9D%A2%E8%86%9C&enc=utf-8&jdr=hot' target='_blank'>\u8865\u6c34\u9762\u819c</a><a href='http://search.jd.com/Search?keyword=%E6%91%84%E5%BD%B1&enc=utf-8&jdr=hot' target='_blank'>\u6444\u5f71</a>";
	var keywords="\u4f73\u80fd";
	$("#hotwords").html(hotwords);
	$("#key").val(keywords).bind("focus",function(){
		if (this.value==keywords){this.value="";this.style.color="#333"}
	}).bind("blur",function(){
		if (this.value==""){this.value=keywords;this.style.color="#999"}
	});
})();