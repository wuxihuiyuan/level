//轮播
$(function() {
	bannerInterval = setInterval(function () {
        $(".mall-right").click()
    },2000);
	$(".mall-banner-box").hover(function () {
		$(".mall-banner-box>span").css("opacity",1);
		clearInterval(bannerInterval)
    },function () {
        $(".mall-banner-box>span").css("opacity",0);
        bannerInterval = setInterval(function () {
            $(".mall-right").click()
        },2000);
    });
	$(".mall-right").click(function () {
		var index = $(".bannerNav-on").index();
        if(index>2){
            index = -1
        }
		$(".mall-banner-box>img").eq(index+1).siblings("img").stop().hide();
        $(".mall-banner-box>img").eq(index+1).stop().fadeIn();
        $(".bannerNav>li").removeClass("bannerNav-on");
        $(".bannerNav>li").eq(index+1).addClass("bannerNav-on");
    });
    $(".mall-left").click(function () {
        var index = $(".bannerNav-on").index();
        if(index<0){
            index = 3
        }
        $(".mall-banner-box>img").eq(index-1).siblings("img").stop().hide();
        $(".mall-banner-box>img").eq(index-1).stop().fadeIn();
        $(".bannerNav>li").removeClass("bannerNav-on");
        $(".bannerNav>li").eq(index-1).addClass("bannerNav-on");
    });
    $(".bannerNav>li").click(function () {
		var index = $(this).index();
		$(this).siblings("li").removeClass("bannerNav-on");
        $(this).addClass("bannerNav-on");
        $(".mall-banner-box>img").eq(index).siblings("img").stop().hide();
        $(".mall-banner-box>img").eq(index).stop().fadeIn();
    });
	//点击滚动
	var list_mt = $(".mall-product-list").css("margin-top");
	var item_mt = $(".mall-product-item").css("margin-top");
	var banner_height = $(".mall-banner-box").css("height");
	$(".product-nav").click(function() {
		var index = $(this).index();
		var height = 0;
		for(var i = 0; i < index; i++) {
			var height = parseInt($(".mall-product-item").eq(i).css("height")) + height
		}
		$("#main").stop().animate({
			scrollTop: parseInt(list_mt) + index * parseInt(item_mt) + height + parseInt(banner_height)
		}, 500);
		$(this).siblings().css("color", "#5f5f5f");
		$(this).css("color", "red")
	});
	var nav = document.getElementsByClassName("product-nav");
	var main = $("#main");
	//滑轮滚动
	window.onmousewheel = function(e) {
		var e = window.event || event;
		var height = 0;
		for(var i = 0; i < nav.length; i++) {
			if(nav[i].style.color == "red") {
				var index = i
			}
		}
		if(index == undefined) {
			nav[0].style.color = "red";
			var index = 0
		}
		for(var l = 0; l < index; l++) {
			var height = parseInt($(".mall-product-item").eq(l).css("height")) + height
		}
		console.log(index)
		console.log(height)
		var scrollTop = parseInt(list_mt) + index * parseInt(item_mt) + height + parseInt(banner_height);
		var scrollTopAfter = parseInt(list_mt) + (index + 1) * parseInt(item_mt) + height + parseInt($(".mall-product-item").eq(index + 1).css("height")) + parseInt(banner_height);
		var scrollTopBefore = parseInt(list_mt) + (index - 1) * parseInt(item_mt) + height - parseInt($(".mall-product-item").eq(index - 1).css("height")) + parseInt(banner_height);
		if(e.wheelDelta < 0) {
			if($("#main").scrollTop() >= scrollTop && $("#main").scrollTop() <= scrollTopAfter) {
				for(var j = 0; j < nav.length; j++) {
					nav[j].style.color = "rgb(95, 95, 95)"
				}
				if(index > nav.length - 1) {
					nav[nav.length - 1].style.color = "red";
				} else {
					nav[index + 1].style.color = "red";
				}
			}
		} else {
			if($("#main").scrollTop() <= scrollTop && $("#main").scrollTop() >= scrollTopBefore) {
				for(var k = 0; k < nav.length; k++) {
					nav[k].style.color = "rgb(95, 95, 95)"
				}
				if(index < 1) {
					nav[0].style.color = "red";
				} else {
					nav[index - 1].style.color = "red";
				}
			}
		}
	};
	//返回顶部
	$(".mall-toTop").click(function() {
		$("#main").stop().animate({
			scrollTop: 0
		}, 500)
		$(".product-nav").css("color", "rgb(95, 95, 95)");
		nav[0].style.color = "red"
	})
});