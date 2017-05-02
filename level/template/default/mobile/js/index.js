/**
 * Created by WXhuiyuan on 2017/3/23.
 */
$(function () {
    var NUM=0;
    $(".header").load("header.html");
    $(".footer").load("footer.html");
    $(".button").click(function () {
        $(".img-cont").animate({
            "left":"100px"
        },500)
    })
    setInterval(function () {
        if(NUM>$(".bs-cont a").length-2){
            NUM = 0
        }else{
            NUM++
        }
        $(".bs-cont a").removeClass("bs-on");
        $(".bs-cont a").eq(NUM).addClass("bs-on")
    },2000)
})

$(document).ready(function(e) {
    var imgObj = document.getElementsByClassName("car_img");
    var imgLen = imgObj.length;
    var windowWidth = $(window).width();
    $(".car_img").bind("click",function(event){

    });
    int = setInterval(carouselImg,3000);
    for(var i=0;i<imgLen;i++){
        $(".car_img").eq(i).css({"top":"0","left":i*windowWidth});
        imgObj[i].addEventListener('touchstart',touchstart,false);
        imgObj[i].addEventListener('touchmove',touchmove,false);
        imgObj[i].addEventListener('touchend',touchend,false);
    }

});

function touchstart(event){
    event.preventDefault();
    if( event.targetTouches.length == 1 )
    {
        clearInterval(int);
        var touch = event.targetTouches[0];
        pressX = touch.pageX;
    }
}

/*
 *定义每次滑动的距离spanX
 *定义当前滑动的索引位置thisIndex，轮播图的个数imgLen
 */
function touchmove(event){
    event.preventDefault();

    if( event.targetTouches.length == 1 )
    {
        var touch = event.targetTouches[0];
        var spanX = touch.pageX - pressX ,
            windowWidth = $(window).width();
        var $car_img = $(".car_img"),
            $this = $(this);
        var thisIndex = $this.index(),
            imgLen = $(".car_img").length;
        for(var i=0;i < imgLen;i++){
            $car_img.eq(i).css("left",windowWidth*(i-thisIndex)+spanX);
        }

    }
}

function touchend(event){
    var $car_img = $(".car_img"),
        $this = $(this),
        $carousel_icon = $(".carousel_icon"),
        windowWidth = $(window).width();
    var thisIndex = $this.index(),
        imgLen = $(".car_img").length;
    var thisLeft = parseInt($(this).css("left"));
    //向左滑动执行的方法
    if(thisLeft < -32 && thisIndex < imgLen){
        //当轮播图滑动最后一个位置时，当前轮播图位置不变
        if(thisIndex == imgLen-1){
            for(var i=0;i < imgLen;i++){
                $car_img.eq(i).animate({"left":windowWidth*(i-thisIndex)},300);

            }
        }
        //当轮播不在最后一个位置时，轮播图位置变化方法
        else{
            for(var i=0;i < imgLen;i++){
                $car_img.eq(i).animate({"left":windowWidth*(i-(thisIndex+1))},300);
                $carousel_icon.eq(i).addClass("carousel_icon2").removeClass("carousel_icon1");
            }
            $carousel_icon.eq(thisIndex+1).removeClass("carousel_icon2").addClass("carousel_icon1");
        }

    }
    //向右滑动执行的方法
    else if(thisLeft > 32 && thisIndex >= 0){
        //当轮播图在第一个位置时
        if( thisIndex == 0){
            for(var i=0;i < imgLen;i++){
                $car_img.eq(i).animate({"left":windowWidth*(i-thisIndex)},300);
            }
        }
        //轮播图不在第一个位置
        else{
            for(var i=0;i < imgLen;i++){
                $car_img.eq(i).animate({"left":windowWidth*(i-(thisIndex-1))},300);
                $carousel_icon.eq(i).addClass("carousel_icon2").removeClass("carousel_icon1");
            }
            $carousel_icon.eq(thisIndex-1).removeClass("carousel_icon2").addClass("carousel_icon1");
        }
    }
    //当滑动距离在大于-32px并且小于32px时，当前轮播图位置不变
    else{
        for(var i=0;i < imgLen;i++){
            $car_img.eq(i).animate({"left":windowWidth*(i-thisIndex)},100);
        }
    }
    int = setInterval(carouselImg,3000);
}

function carouselImg(){
    var $car_img = $(".car_img"),
        $carousel_icon = $(".carousel_icon"),
        windowWidth = $(window).width();
    var imgLen = $car_img.length,
        imgZeroIndex = 0;
    for(var i=0;i<imgLen;i++){
        var everyImgLeft = parseInt($car_img.eq(i).css("left"));
        if(everyImgLeft == 0){
            imgZeroIndex = i;
            break;
        }

    }
    if(imgZeroIndex == imgLen-1){
        for(var i=0;i<imgLen;i++){
            $car_img.eq(i).animate({"left":windowWidth*i},300);
            $carousel_icon.eq(i).removeClass("carousel_icon1").addClass("carousel_icon2");
        }
        $carousel_icon.eq(0).removeClass("carousel_icon2").addClass("carousel_icon1");
    }
    else{
        for(var i=0;i<imgLen;i++){
            $car_img.eq(i).animate({"left":windowWidth*(i-(imgZeroIndex+1))},300);
            $carousel_icon.eq(i).removeClass("carousel_icon1").addClass("carousel_icon2");
        }
        $carousel_icon.eq(imgZeroIndex+1).removeClass("carousel_icon2").addClass("carousel_icon1");
    }
}
