/**
 * Created by WXhuiyuan on 2017/3/23.
 */
$(function () {
    $(".tab-head").click(function () {
        location.href = "admin.html"
    });
    $(".sildeup-content").click(function () {
        $(".side-menu").stop().slideUp()
    });


});