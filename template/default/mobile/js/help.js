/**
 * Created by Administrator on 2017/3/26.
 */
$(function () {
    $(".help-item p").click(function () {
        $(this).parent(".help-item").siblings(".help-item").find("span").text("+");
        $(this).parent().siblings().children(".item-text").stop().slideUp();
        if ($(this).children("span").text() == "+") {
            $(this).siblings(".item-text").stop().slideDown();
            $(this).children("span").text("-")
        } else {
            $(this).siblings(".item-text").stop().slideUp();
            $(this).children("span").text("+");
        }
    });
    $(".tab-head").click(function () {
        location.href = "admin.html";
    });
    $(".feedback").click(function () {
        location.href = "feedback.html";
    });
    $(".send").click(function () {
        location.href = "e-detail.html";
    });
    $(".received").click(function () {
        location.href = "e-detail.html";
    });
});