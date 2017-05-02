/**
 * Created by WXhuiyuan on 2017/4/13.
 */
$(function () {
    $(".tab-head>span").click(function () {
        location.href = "integral.html";
    });
    $(".integral-product").click(function () {
        location.href = "integralPro.html"
    });
    $(".jia").click(function () {
        var val = $("#pronumb").val();
        var num = parseInt(val) + 1;
        $("#pronumb").val(num)
    });
    $(".jian").click(function () {
        var val = $("#pronumb").val();
        if (val == 0) {
            $("#pronumb").val(0)
        } else {
            var num = parseInt(val) - 1;
            $("#pronumb").val(num)
        }
    })
})