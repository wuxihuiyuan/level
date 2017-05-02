$(document).ready(function() {//公用接口函数					   
  $(".card-side").each(function(){
	var width = parseInt($(this).width());
	$(this).height(width*0.58);
	$(this).parent().height((width*0.58)+20);
  });
  $(".card-side:first").css({opacity:'1'});
//  $("#cardBox").click(function(){
//	var first = $(".card-side:first");		
//	var last = $(".card-side:last");
//	if(first.css("opacity")=='1'){
//      first.animate({
//	    opacity:'0'
//      },function(){
//	    last.animate({
//	      opacity:'1'
//        });
//  	  });
//	}else{
//      last.animate({
//	    opacity:'0'
//      },function(){
//	    first.animate({
//	      opacity:'1'
//        });
//  	  });
//	}
//  });
});