/**
 * Created by WXhuiyuan on 2017/4/1.
 */
$(function () {
    $(".tab-title>li").click(function () {
        var index = $(this).index()
        $(this).siblings().removeClass("tab-title-on");
        $(this).addClass("tab-title-on");
        $(".tab-list").eq(index).siblings().removeClass("tab-list-on");
        $(".tab-list").eq(index).addClass("tab-list-on")
    });
    $(".tab-item").click(function () {
        location.href = "order_details.html"
    })
});