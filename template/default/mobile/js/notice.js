/**
 * Created by WXhuiyuan on 2017/3/29.
 */
$(function () {
    $(".notice-list>div").click(function () {
        location.href = "notice_details.html"
    })
    $(".tab-title>li").click(function () {
        var index = $(this).index();
        $(this).siblings().removeClass("tab-title-on");
        $(this).addClass("tab-title-on");
        $(".notice-list").eq(index).siblings().hide();
        $(".notice-list").eq(index).show()
    })
});