/**
 * Created by WXhuiyuan on 2017/4/14.
 */
$(function () {
    $(".upload input").change(function (evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function () {
                return function (e) {
                    $(".goPay>p").css("visibility", "hidden");
                    $(".uploadImg").show();
                    $(".uploadImg img").attr("src", e.target.result);  //预览图片的位置
                };
            })(f);
            reader.readAsDataURL(f);
        }
    });
    $(".goPay .pay_btn").click(function () {
        if ($(".uploadImg img").attr("src") == "") {
            $(".goPay>p").css("visibility", "visible")
        } else {
            location.href = "purchase.html"
        }
    });
    $(".clearPic").click(function () {
        $(".uploadImg").hide();
        $(".uploadImg img").attr("src", "");
    });
});