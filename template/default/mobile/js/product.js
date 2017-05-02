$(function () {
    $(".tab-head").click(function () {
        location.href = "index.html";
    });
    $(".sildeup-content").click(function () {
        $(".side-menu").stop().slideUp();
    });
    $(".policy-title").click(function () {
        var index = $(this).index() - 1;
        if (index > 1) {
            $(".policy-pro-wrap").hide()
        } else {
            $(".policy-pro-wrap").show()
        }
        $(this).siblings(".policy-title").removeClass("policy-on");
        $(".policy-list").children(".item-wrap").eq(index).siblings(".item-wrap").hide();
        $(".policy-pro-wrap").children(".policy-pro").eq(index).siblings(".policy-pro").hide();
        $(this).addClass("policy-on");
        $(".policy-list").children(".item-wrap").eq(index).show();
        $(".policy-pro-wrap").children(".policy-pro").eq(index).show();
    });
    
});