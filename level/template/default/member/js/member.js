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
  function goodscheckForm(){
    var post = true;
    if($('.thumb_list').val()==undefined&&post){
      Wrong('对不起，请上传支付凭证!');
      post = false;  
    }
    if(post) listTable.memberfrom('凭证上传！','shopform',''); 
    return false;
  }
});
