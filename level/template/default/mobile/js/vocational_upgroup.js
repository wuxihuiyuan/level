function checkgroupid(){
  var groupid = $("#groupid").val();
  var mymoney = parseFloat($("#mymoney").val());
  if(groupid==''){
    addtip("groupid","对不起，请选择会员级别");
  }else{
    $.ajax({url:get_url("act=getupmoney&groupid="+groupid),
	  type:'GET',
	  success:function(money){
	    if(parseFloat(money)>mymoney){
           addtip("groupid","现金不足升级到该级别,请<a href='"+paymenturl+"' target='_blank'>充值</a>。");
	    }else{
           yestip("groupid",'升级到该级别扣除你'+money+'元现金！');
  	    }
      }
    });
  }
}
function checkform(){
  var post = true;   
  if($("#groupid").val()==''){
	addtip("groupid","对不起，请选择升级级别");
    post = false;
  }  
  if($("#groupidtip").html().indexOf('现金不足升级到该级别会员') != -1&&post){
    post = false;
  } 
  if(post) listTable.upgroup($("#groupid").val());
} 