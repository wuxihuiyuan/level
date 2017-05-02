/**
 * Created by WXhuiyuan on 2017/3/23.
 */
$(function () {
    banner();
    $(".bg9").click(function () {
        console.log(confirm("asd"))
    });
    var NUM = 0;
    $(".button").click(function () {
        $(".img-cont").animate({
            "left": "100px"
        }, 500)
    });
    setInterval(function () {
        if (NUM > $(".bs-cont a").length - 2) {
            NUM = 0
        } else {
            NUM++
        }
        $(".bs-cont a").removeClass("bs-on");
        $(".bs-cont a").eq(NUM).addClass("bs-on");
    }, 2000);
    $(".sildeup-content").click(function () {
        $(".side-menu").stop().slideUp();
    });
    $(".agent-card>li").click(function () {
        var agentindex = $(this).index();
        $(this).siblings("li").removeClass("agent-on");
        $(".agent-cont").css("display", "none");
        $(this).addClass("agent-on");
        $(".agent-cont").eq(agentindex).css("display", "block");
    });
    $(".income").click(function () {
        location.href = "income.html"
    });
    $(".policy-cont").click(function () {
        location.href = "product.html"
    });
    $(".productHtml").click(function () {
        location.href = "product.html"
    });
    $(".integralHtml").click(function () {
        location.href = "integral.html"
    });
});
//轮播图
function banner() {
    var docwidth = window.innerWidth;
    startindex = 0;
    intvalindex = 0;
    var banimg = document.getElementsByClassName("banner-img");
    baninterval = setInterval(function () {
        startindex++;
        if (startindex > 4) {
            for (var i = 0; i < banimg.length; i++) {
                banimg[i].style.left = i * docwidth + "px";
                banimg[i].style.transition = "0.5s left";
            }
            startindex = 0
        } else {
            for (var j = 0; j < banimg.length; j++) {
                banimg[j].style.left = (j - startindex) * docwidth + "px";
                banimg[j].style.transition = "0.5s left";
            }
        }
    }, 2000);
    for (var i = 0; i < banimg.length; i++) {
        banimg[i].style.left = i * docwidth + "px";
        banimg[i].addEventListener("touchstart", touchstart, false);
        banimg[i].addEventListener("touchmove", touchmove, false);
        banimg[i].addEventListener("touchend", touchend, false);
    }
    function touchstart(e) {
        if (event.targetTouches.length == 1) {
            clearInterval(baninterval);
            for (var i = 0; i < banimg.length; i++) {
                banimg[i].style.transition = "";
            }
            e = window.event || event;
            start = e.targetTouches[0].pageX
        }
    }

    function touchmove(e) {
        event.preventDefault();
        if (event.targetTouches.length == 1) {
            for (var i = 0; i < banimg.length; i++) {
                banimg[i].style.transition = "";
            }
            e = window.event || event;
            doing = e.targetTouches[0].pageX;
            if (doing > start) {
                for (var j = 0; j < banimg.length; j++) {
                    banimg[j].style.left = (j - startindex) * docwidth + (doing - start) + "px";
                }
            } else {
                for (var k = 0; k < banimg.length; k++) {
                    banimg[k].style.left = (k - startindex) * docwidth - (start - doing) + "px";
                }
            }
        }
    }

    function touchend() {
        clearInterval(baninterval);
        for (var i = 0; i < banimg.length; i++) {
            banimg[i].style.transition = "0.5s left";
        }
        if (parseInt(banimg[0].style.left) > 0) {
            for (var n = 0; n < banimg.length; n++) {
                banimg[n].style.left = n * docwidth + "px";
            }
        }
        if (parseInt(banimg[(banimg.length - 1)].style.left) < 0) {
            for (var m = 0; m < banimg.length; m++) {
                banimg[m].style.left = (m - (banimg.length - 1)) * docwidth + "px";
            }
        }
        if (parseInt(this.style.left) < -docwidth / 4) {
            startindex++;
            for (var j = 0; j < banimg.length; j++) {
                banimg[j].style.left = (j - startindex) * docwidth + "px";
            }
        } else if (parseInt(this.style.left) > docwidth / 4) {
            startindex--;
            for (var l = 0; l < banimg.length; l++) {
                banimg[l].style.left = (l - startindex) * docwidth + "px";
            }
        } else {
            for (var k = 0; k < banimg.length; k++) {
                banimg[k].style.left = (k - startindex) * docwidth + "px";
            }
        }
        baninterval = setInterval(function () {
            startindex++;
            if (startindex > 4) {
                for (var i = 0; i < banimg.length; i++) {
                    banimg[i].style.left = i * docwidth + "px";
                    banimg[i].style.transition = "0.5s left";
                }
                startindex = 0
            } else {
                for (var j = 0; j < banimg.length; j++) {
                    banimg[j].style.left = (j - startindex) * docwidth + "px";
                    banimg[j].style.transition = "0.5s left";
                }
            }
        }, 2000)
    }
}
