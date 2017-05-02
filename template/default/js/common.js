$(document).ready(function() { //公用接口函数
	$.getScript(appdir + "placeholder.js");
	$(".pow-layer > .ngx > .fr").click(function() {
		$(this).prev('.pl-box').toggle(300);
	});
	$(document).keydown(function(event) {
		if(event.keyCode == 13) { //绑定回车 
			$('.ok').click();
		}
	});
	$(".ok").click(function() {
		$(this).removeAttr('href')
	})


//	$("a").each(function() {
//		var arr = location.href.split("/");
//		var nowHref = "/"+arr.pop();
//		if($(this).attr('href') == nowHref) {
//			$(this).css('background', '#997f41');
//		}
//	})

});