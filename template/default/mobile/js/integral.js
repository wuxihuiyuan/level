/**
 * Created by WXhuiyuan on 2017/4/13.
 */
$(function () {
    banner();
    scrollBs();
    endLeft = 0;
    startLeft = 0;
    var viewWidth = window.innerWidth;
    $(".recommend-list").css("width", $(".recommend-item").length / 4 * viewWidth + "px");
    $(".recommend-item").css("width", $(".recommend-item").length / 4 * viewWidth / $(".recommend-item").length)
    $(".inteProtabBar").css("width", $(".inteProtab").length / 4 * viewWidth + "px");
    $(".inteProtab").css("width", $(".inteProtab").length / 4 * viewWidth / $(".inteProtab").length);
    $(".inteProtab").click(function () {
        var index = $(this).index()
        $(this).siblings().removeClass("inteBt");
        $(this).addClass("inteBt")
        $(".integral-product-item").eq(index).siblings().hide();
        $(".integral-product-item").eq(index).show()
    });
    $(".integral-product-item").click(function () {
        location.href = "integralPro.html";
    })
});
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
function scrollBs() {
    var recomList = document.getElementsByClassName("recommend-list")[0];
    var inteProtabBar = document.getElementsByClassName("inteProtabBar")[0];
    recomList.addEventListener("touchstart", function () {
        bsStart(recomList)
    });
    recomList.addEventListener("touchmove", function () {
        bsMove(recomList)
    });
    recomList.addEventListener("touchend", function () {
        bsEnd(recomList)
    });
    inteProtabBar.addEventListener("touchstart", function () {
        bsStart(inteProtabBar)
    });
    inteProtabBar.addEventListener("touchmove", function () {
        bsMove(inteProtabBar)
    });
    inteProtabBar.addEventListener("touchend", function () {
        bsEnd(inteProtabBar)
    });
    function bsStart(el) {
        var e = window.event || event;
        el.style.transition = "";
        if (event.targetTouches.length == 1) {
            if (endLeft != 0) {
                el.style.left = endLeft;
                startLeft = parseInt(el.style.left)
            }
            listStart = e.targetTouches[0].pageX
        }
    }

    function bsMove(el) {
        var e = window.event || event;
        e.preventDefault();
        el.style.transition = "";
        var moving = e.targetTouches[0].pageX;
        if (event.targetTouches.length == 1) {
            if (moving > listStart) {
                el.style.left = (moving - listStart) + startLeft + "px"
            } else {
                el.style.left = -(listStart - moving) + startLeft + "px"
            }
        }
    }

    function bsEnd(el) {
        var boxLeft = parseInt(el.style.left);
        var boxWidth = el.style.width;
        var everyWidth = parseInt(boxWidth) / el.children.length;
        var ChildLength = el.children.length;
        if (boxLeft > 0) {
            el.style.left = 0;
            el.style.transition = "left 0.5s"
        } else if (boxLeft < -(ChildLength - 4) * everyWidth) {
            el.style.left = -parseInt((ChildLength - 4) * everyWidth) + "px";
            el.style.transition = "left 0.5s"
        }
        endLeft = el.style.left
    }
}