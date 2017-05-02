/**
 * Created by WXhuiyuan on 2017/3/30.
 */
$(function () {
    $(".logo").click(function () {
        location.href = "index.html";
    });
    $(".slidetoggle").click(function () {
        $(".menu-detail").stop().slideUp();
        $(".side-menu>li>span").text("+");
        $(".side-menu").stop().slideToggle();
    });
    $(".side-menu>li").click(function () {
        $(this).siblings().children(".menu-detail").stop().slideUp();
        $(this).siblings().children("span").text("+");
        $(this).children(".menu-detail").stop().slideToggle();
        if ($(this).children("span").text() == "+") {
            $(this).children("span").text("-");
        } else {
            $(this).children("span").text("+");
        }
    });
    $(".top").click(function () {
        $("body").animate({scrollTop: "0"}, 500);
        $("html").animate({scrollTop: "0"}, 500);
    });
    $(".index-cont").click(function () {
        $(".side-menu").stop().slideUp();
    });
    for (var i = 0; i < document.getElementsByClassName("pb80").length; i++) {
        document.getElementsByClassName("pb80")[i].addEventListener("touchstart", slideUp, false);
    }
});
function slideUp() {
    $(".side-menu").stop().slideUp()
}