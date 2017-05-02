/**
 * Created by WXhuiyuan on 2017/3/22.
 */
$(function () {
    $(".content").click(function () {
        $(".side-menu").slideUp();
        $(".menu-detail").stop().slideUp();
        $(".side-menu>li>span").text("+");
    });
    // $(".more").click(function () {
    //     $(this).parent().parent().siblings().children().children(".more").text("查看更多");
    //     $(".income-row-child").find(".more-slide").stop().slideUp();
    //     $(this).parent().siblings(".more-slide").stop().slideToggle();
    //     if($(this).text() == "查看更多"){
    //         $(this).text("收起↑");
    //     }else{
    //         $(this).text("查看更多");
    //     }
    // });
    $(".more").click(function () {
        if (parseInt($(this).parent().siblings("ul").css("height")) > 0) {
            $(this).parent().siblings("ul").css("height", 0);
            $(this).text("查看更多");
        } else {
            $(this).parent().siblings("ul").css("height", "150px");
            $(this).text("收起↑");
        }
    });
    $(".tab-head").click(function () {
        location.href = "index.html";
    })
});