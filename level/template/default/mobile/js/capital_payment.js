$(function(){
  $("#changebaktype").find("em").click(function(){
	$("#bantype0,#bantype1").hide();
	$("#changebaktype").find("em").removeClass('current');
	var index = $("#changebaktype").find("em").index(this);
	$(this).addClass('current');
	$("#bantype"+index).show();
  });	   
});
function checkform(){
  var post = true;
  var paytype = $("input[name=paytype]:checked").val();
  var money =  parseInt($("#howmoney").val());
  if($("#howmoney").val()==''){
	addtip('howmoney','请输入充值金额');
	post = false; 
  }else if(isNaN(money)){
	addtip('howmoney','必须是有效的数字');
	post = false; 
  }else if(money<1){
	addtip('howmoney','一次性最低充值1元');
	post = false; 
  }else{
	removetip('howmoney');  
  }
  if(paytype==undefined){
	addtip('_onlinepay','请选择在线支付方式');
	post = false;
  }else{
	removetip('_onlinepay'); 
  }
  if(post) msgHtml('new_payment',410,230,' ',1);
  return post;  
} 
function cancelpayorder(id){
    $.getJSON(get_url('act=cancelpayorder&id='+id),function(res){																 
	  if(res.error=='0'){
		$("#payorder_"+id).remove();
	  }else{
		Wrong(res.error);
	  }							  
    });
}