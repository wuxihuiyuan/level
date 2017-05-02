/**
 * Created by WXhuiyuan on 2017/3/22.
 */
$(function () {
    $(".slidetoggle").click(function () {
        $(".menu-detail").stop().slideUp();
        $(".side-menu>li>span").text("+");
        $(".side-menu").stop().slideToggle()
    })
    //有 $(".side-menu>li>span").click(function () {
    //B    // $(".menu-detail").stop().slideUp();
    //U    $(this).parent().siblings().children(".menu-detail").stop().slideUp();
    //G    $(this).parent().siblings("li").children("span").text("+");
    //     $(this).siblings(".menu-detail").stop().slideToggle();
    //     if($(this).text()=="+"){
    //         $(this).text("-")
    //     }else{
    //         $(this).text("+")
    //     }
    // })
    $(".side-menu>li").click(function () {
        $(this).siblings().children(".menu-detail").stop().slideUp();
        $(this).siblings().children("span").text("+");
        $(this).children(".menu-detail").stop().slideToggle();
        if($(this).children("span").text() == "+"){
            $(this).children("span").text("-")
        }else{
            $(this).children("span").text("+")
        }

    })










})