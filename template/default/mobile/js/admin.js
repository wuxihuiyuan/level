$(function () {
    $(".admin-item").click(function () {
        var URL = $(this).attr("data-url");
        location.href = URL + ".html";
    });
    $(".sildeup-content").click(function () {
        $(".side-menu").stop().slideUp();
    });
    $(".logout").click(function () {
        location.href = "login.html";
    });


});