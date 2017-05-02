/**
 * Created by WXhuiyuan on 2017/3/24.
 */
$(function () {
    //正则条件
    var checkEmail = new RegExp(/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/);
    var checkPhone = new RegExp(/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/);
    $(".sildeup-content").click(function () {
        $(".side-menu").stop().slideUp()
    });
    //点击返回
    $(".tab-head").click(function () {
        location.href = "admin.html"
    });
    //点击确定后的操作
    $(".newinfo-submit").click(function () {
        if ($(".change-info-pw").css("display") == "block") {
            if ($("#oldpw").val() != "" && $("#newpw").val() == "" && $("#checkpw").val() == "") {
                $(".newinfo-err").text("请输入新密码").css("opacity", 1)
            } else if ($("#oldpw").val() != "" && $("#newpw").val() != "" && $("#checkpw").val() == "") {
                $(".newinfo-err").text("请确认新密码").css("opacity", 1)
            } else if ($("#oldpw").val() != "" && $("#newpw").val() == "" && $("#checkpw").val() != "") {
                $(".newinfo-err").text("请输入新密码").css("opacity", 1)
            } else if ($("#oldpw").val() == "") {
                $(".newinfo-err").text("请输入原密码").css("opacity", 1)
            } else if ($("#oldpw").val() != "" && $("#newpw").val() != $("#checkpw").val()) {
                $(".newinfo-err").text("两次输入的密码不一致").css("opacity", 1)
            } else if ($("#oldpw").val() == $("#newpw").val()) {
                $(".newinfo-err").text("新密码和旧密码不能一致").css("opacity", 1)
            } else {
                $(".newinfo-err").text("1").css("opacity", 0)
            }
        } else if ($(".change-info-pw").css("display") == "block") {
            if ($("#vl-email").val() == "") {
                $(".newinfo-err").text("请输入验证码").css("opacity", 1)
            } else {
                //缺少一个判断验证码
            }
        } else {
            if ($("#vl-email").val() == "") {
                $(".newinfo-err").text("请输入验证码").css("opacity", 1)
            } else {
                //缺少一个判断验证码
            }
        }
    });
    //点击发送后的操作
    $(".change-send").click(function () {
        if ($(".change-info-mail").css("display") == "block") {
            if ($("#newemail").val() == "") {
                $(".newinfo-err").text("请输入邮箱").css("opacity", 1)
            } else if (checkEmail.test($("#newemail").val()) == false) {
                $(".newinfo-err").text("您输入的邮箱格式不正确").css("opacity", 1)
            } else {
                $(".newinfo-err").text("发送成功，请注意查收").css("opacity", 1);
                setTimeout(function () {
                    $(".newinfo-err").text("1").css("opacity", 0)
                }, 2000)
            }
        } else if ($(".change-info-phone").css("display") == "block") {
            if ($("#newphone").val() == "") {
                $(".newinfo-err").text("请输入手机号码").css("opacity", 1)
            } else if (checkPhone.test($("#newphone").val()) == false) {
                $(".newinfo-err").text("您输入的手机号码格式不正确").css("opacity", 1)
            } else {
                $(".newinfo-err").text("发送成功，请注意查收").css("opacity", 1);
                setTimeout(function () {
                    $(".newinfo-err").text("1").css("opacity", 0)
                }, 2000)
            }
        }
    });
    //获取/失去焦点改变边框
    $(".change-input").focusin(function () {
        $(this).siblings("input").css("border-bottom-color", "#ccc");
        $(this).parent(".changebox").siblings(".changebox").children(".change-input").css("border-bottom-color", "#ccc");
        $(this).css("border-bottom-color", "#cc860b")
    });
    //右边小X
    $(".change-input").keyup(function () {
        if ($(this).val() != "") {
            $(this).siblings(".clearchange").show();
        } else {
            $(this).siblings(".clearchange").hide();
        }
    });
    $(".clearchange").click(function () {
        $(this).siblings("input").val("");
        $(this).hide();
    });


});