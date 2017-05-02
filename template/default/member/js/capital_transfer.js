$(document).ready(function(){
  $.getScript(appdir + "/placeholder.js");			   
  $("#opcardbutton").click(function(){
	var post = true;
    var howmoney = parseFloat($("#howmoney").val());
    var mymoney = parseFloat($("#mymoney").val());
    if($("#username").val()==''||$("#username").val()=='用户名/电子邮箱/绑定手机'){
      addtip("username","请输入用户名/电子邮箱/绑定手机");
      post = false;
    }
    if($("#usernametip").html().indexOf('对不起') != -1){
      post = false;
    }  
	if($("#howmoney").val()==''){
	   addtip("howmoney","对不起，请输入转账金额");
	   post = false;
	}else if(!isNum(howmoney)){
	   addtip("howmoney","对不起，转账金额必须是数字");
	   post = false;
	}else if(howmoney<0.01){
	   addtip("howmoney","转账金额不能小于0");
	   post = false;
	}else if(mymoney<howmoney){
	   addtip("howmoney","对不起，可转账金额不足");
	   post = false;
	}else{
	   yestip("howmoney","");
	}
	if(post){
      showhandle({
        html:'<table class="lotab"><tr><th><label>支付密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
        width:320,
        height:136,
        id:'atmmymoney',
        title:'现金转账'
      },function(){
	    $("#controlLoad").show();
	    removetip("atmmymoney");
        $.getJSON(get_path_url("?mod=member&act=capital&type=transfer&username="+encodeURIComponent($("#username").val())+"&money="+howmoney+"&repass="+$("#repass").val()),function(res){
	      $("#controlLoad").hide();																		 
	      if(res.error=='0'){
			hidebox('atmmymoney',true);
            Right('现金转账成功。',{},function(){
			  location.href = res.url;
			});
	      }else{
		    addtip("atmmymoney",res.error);
	      }							  
        });
      });	
	}
  });
});
function checkmoney(){
	var howmoney = parseFloat($("#howmoney").val());
	var mymoney = parseFloat($("#mymoney").val());
	if($("#howmoney").val()==''){
	   addtip("howmoney","对不起，请输入转账金额");
	}else if(!isNum(howmoney)){
	   addtip("howmoney","对不起，转账金额必须是数字");
	}else if(howmoney<0.01){
	   addtip("howmoney","转账金额不能小于0");
	}else if(mymoney<howmoney){
	   addtip("howmoney","对不起，可转账金额不足");
	}else{
	   yestip("howmoney","");
	}
}
function checkusername(){
  var show = true,username = $("#username").val();
  if(username=='用户名/电子邮箱/绑定手机'){
    username='';
    show = false;
  }
  if(username==''&&show){
    addtip("username","请输入用户名/电子邮箱/绑定手机");
  }else if(show){
    $.getJSON(get_url("act=verifyusername&transfer=1&username="+encodeURIComponent(username)),function(res){
      if(res.error=='0'){
        yestip("username",res.truename);
      }else{
        addtip("username",res.error);
      }
	});
  }
}