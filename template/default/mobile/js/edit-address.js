/**
 * Created by WXhuiyuan on 2017/3/23.
 */
$(function () {
    $(".tab-head").click(function () {
        location.href = "address.html";
    });
    $(".head").click(function () {
        $(".edit").stop().slideToggle();
    });
    $("input[type='text']").keyup(function () {
        if ($(this).val() != "") {
            $(this).siblings(".clear").show();
        } else {
            $(this).siblings(".clear").hide();
        }
    });
    $(".clear").click(function () {
        console.log($(this).siblings("input[type='text']").val());
        $(this).siblings("input[type='text']").val("");
        $(this).hide()
    });
    $(".sildeup-content").click(function () {
        $(".side-menu").stop().slideUp()
    })
});