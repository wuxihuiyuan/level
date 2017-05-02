$(function(){//表单
  $('#menu_'+action).show();
  $("#menu li a").click(function(){
     var checkElement = $(this).next();
     if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
	   return false;
     }
     if((checkElement.is('ul'))&&(!checkElement.is(':visible'))) {
       $('#menu ul:visible').slideUp();
       checkElement.slideDown();
       return false;
     }
  });
  $(".nowopen").click(function(){
	var uid = $(this).attr('uid');
	var buymoney = $(this).attr('buymoney'); 
	listTable.status($(this),uid);
  })
});