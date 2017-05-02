/**
 * Created by WXhuiyuan on 2017/3/23.
 */
$(function () {
    $(".top").click(function () {
        $("body").animate({scrollTop:"0"},500);
        $("html").animate({scrollTop:"0"},500);
    })
    $(".index-cont").click(function () {
        $(".side-menu").stop().slideUp()
    })
});