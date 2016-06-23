var clubHost = 'http://club.jd.com';
(function($) {
    $.extend({
        _jsonp: {
            scripts: {},
            //charset: 'utf-8',
            counter: 1,
            head: document.getElementsByTagName("head")[0],
            name: function(callback) {
                var name = '_jsonp_' + (new Date).getTime()
					+ '_' + this.counter;
                this.counter++;
                var cb = function(json) {
                    eval('delete ' + name);
                    callback(json);
                    $._jsonp.head.removeChild($._jsonp.scripts[name]);
                    delete $._jsonp.scripts[name];
                };
                eval(name + ' = cb');
                return name;
            },
            load: function(url, name) {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.charset = this.charset;
                script.src = url;
                this.head.appendChild(script);
                this.scripts[name] = script;
            }
        },

        getJSONP: function(url, callback) {
            var name = $._jsonp.name(callback);
            var url = url.replace(/{callback}/, name);
            $._jsonp.load(url, name);
            return this;
        }
    });
})(jQuery);

(function(jQuery) { jQuery.each(['backgroundColor', 'borderBottomColor', 'borderLeftColor', 'borderRightColor', 'borderTopColor', 'color', 'outlineColor'], function(i, attr) { jQuery.fx.step[attr] = function(fx) { if (fx.state == 0) { fx.start = getColor(fx.elem, attr); fx.end = getRGB(fx.end) } fx.elem.style[attr] = "rgb(" + [Math.max(Math.min(parseInt((fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0]), 255), 0), Math.max(Math.min(parseInt((fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1]), 255), 0), Math.max(Math.min(parseInt((fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2]), 255), 0)].join(",") + ")" } }); function getRGB(color) { var result; if (color && color.constructor == Array && color.length == 3) return color; if (result = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color)) return [parseInt(result[1]), parseInt(result[2]), parseInt(result[3])]; if (result = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(color)) return [parseFloat(result[1]) * 2.55, parseFloat(result[2]) * 2.55, parseFloat(result[3]) * 2.55]; if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color)) return [parseInt(result[1], 16), parseInt(result[2], 16), parseInt(result[3], 16)]; if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color)) return [parseInt(result[1] + result[1], 16), parseInt(result[2] + result[2], 16), parseInt(result[3] + result[3], 16)]; if (result = /rgba\(0, 0, 0, 0\)/.exec(color)) return colors['transparent']; return colors[jQuery.trim(color).toLowerCase()] } function getColor(elem, attr) { var color; do { color = jQuery.curCSS(elem, attr); if (color != '' && color != 'transparent' || jQuery.nodeName(elem, "body")) break; attr = "backgroundColor" } while (elem = elem.parentNode); return getRGB(color) }; var colors = { pink: [205, 250, 250], white: [255, 255, 255], transparent: [255, 255, 255]} })(jQuery);


$(
	function() {
	    $.fn.pagination.options =
			{
			    items_per_page: 20,
			    num_display_entries: 5,
			    current_page: 0,
			    num_edge_entries: 2,
			    link_to: "#comment",
			    prev_text: "上一页",
			    next_text: "下一页",
			    ellipse_text: "...",
			    prev_show_always: false,
			    next_show_always: false,
			    callback: pageSelected
			};

	    refreshComments();

	    function pageSelected(page_id, jq) {
	        $.fn.pagination.options.current_page = page_id;
	        refreshComments();
	    }

	    function refreshComments() {
	        var referenceId = $.query.get("id");
	        if (referenceId != "") {
	            $.getJSONP(
	            		clubHost+"/clubservice.aspx?callback=getComments&method=GetComments&referenceId={0}&referenceType=News&pageIndex={1}&pageSize={2}&visible={3}".format(referenceId, $.fn.pagination.options.current_page, $.fn.pagination.options.items_per_page, $("#CommentVisible").val() == "True"),
					getComments);
	        }
	    }

	    $("#login,#commentContent").livequery(
			"click",
			function() {
			   $.getJSON(
						"http://passport.360buy.com/loginservice.aspx?callback=?",
						{
							method: "Login"
						},
						function(result)
						{
							if (!result.Identity.IsAuthenticated && confirm("尚未登录，不能发表新话题，现在登录？"))
							{
								$.login();
							}
						});
			});	   

	    $("#saveComment").livequery(
			"click",
			function() {
			    $.login(
					{
					    complete:
							function(result) {
							    if (result.IsAuthenticated) {

							        $("#commentinsert").validate();
							        if ($("#commentinsert").valid()) {
							            $("#saveComment").hide();
							            $("#savingComment").show();
							            var referenceId = $.query.get("id");
							            var title = encodeURI($("h1").text(), "utf-8");
							            var newcontent = encodeURI($("#commentContent").val(), "utf-8");
							            if (referenceId != "" && title != "") {
							                $.getJSON(
							                		clubHost+"/index.php?mod=Comment&action=saveNewsComment&callback=?",
											        {
											            referenceId: referenceId,
											            referenceType: "News",
											            commentTitle: title,
											            content: newcontent
											        },
											        function(json) {
											            var re = json;

											            $("#commentContent").val("");
											            if (re.status == 1) {
											                alert(re.info);
											                var newItem = "<div class=\"item\"><div class=\"user\"><span class=\"u-name\">" + re.data.uremark + "</span><span class=\"u-level\">会员级别：<span style=\"color: " + re.data.userLevelColor + ";\">" + re.data.userLevelName + "</span></span><span class=\"date-ask\">" + re.data.creationTime + "</span></div><div class=\"content\">" + re.data.content + "</div></div>";

											                if ($("#comment .mc").find(".item").length > 0) {
											                    ScrollToBottom("#comment .mc .item:last");
											                    $("#comment .mc .item:last").after(newItem);
											                    $("#comment .mc .item:last").animate({ backgroundColor: 'pink' }, 1000).animate({ backgroundColor: 'white' }, 1000);
											                }
											                else {
											                    $("#nonewscode").hide();
											                    var htmltxt = "<div class='mc'>" + newItem + "</div>";
											                    $("#comment .mt").after(htmltxt);
											                    $("#comment .mc .item:last").animate({ backgroundColor: 'pink' }, 1000).animate({ backgroundColor: 'white' }, 1000);
											                }
											            }
											            else {
											                alert(re.info);
											            }
											            $("#saveComment").show();
											            $("#savingComment").hide();
											        });
							            }
							        }
							    }
							}
					});
			});
	});

function getComments(result) {
    if (result.GetNewsComments != null && result.SearchParameter != null && result.Visible) {
        $("#container").html(result.GetNewsComments.process(result));
        $("#newspage").pagination(result.SearchParameter.Count, $.fn.pagination.options);
        $("#commentinsert").validate(
			{
			    rules:
				{
				    commentContent:
						{
						    required: true,
						    rangelength: [4, 100],
						    specialWord: true,
						    badWord: true
						}
				},
			    messages:
				{
				    commentContent:
						{
						    required: "请填写评论内容，长度在4-100位字符之间",
						    rangelength: "评论内容长度只能在4-100位字符之间",
						    specialWord: "评论内容含有特殊字符",
						    badWord: "评论内容含有敏感词语"
						}
				}
			});

    }
}
function ScrollToBottom(divContent) {
    if ($(divContent)[0].scrollHeight > $(divContent).height())
        $(divContent).scrollTop($(divContent)[0].scrollHeight);
}

