/**
 * Created by WXhuiyuan on 2017/3/23.
 */
$(function () {
    $(".back-title").click(function () {
        location.href = "index.html";
    });
    $(".head strong").click(function () {
        $(".edit").stop().slideToggle();
    });
    $(".tab-head span").click(function () {
        location.href = "admin.html";
    });
    $(".sildeup-content").click(function () {
        $(".side-menu").stop().slideUp();
    })
});
function deladdress() {

}

