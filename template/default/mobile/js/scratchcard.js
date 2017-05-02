$(function(){
  var i = 0;
  var width = $("#prize").width();
  var height = $("#prize").height()+parseFloat($("#prize").css("padding-top"))*2;
  $("#scratchpad").wScratchPad({
    width:width,
    height:height,
    color: "#a9a9a7",
    scratchMove:function(){
	  i++;
      if(i==1){
		  
	  }
      if($("#scratchpad").css("color").indexOf("51") > 0) {
        $("#scratchpad").css("color", "rgb(50,50,50)");
      }else if ($("#scratchpad").css("color").indexOf("50") > 0) {
        $("#scratchpad").css("color", "rgb(51,51,51)");
      }
    }});
});