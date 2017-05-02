function addClass(id,c,v){
  $("#"+id).removeClass();
  $("#"+id).addClass(c);
  $("#"+id).html(v);
}
function checkusername(){
 var username = $("#username").val();
 var testUser = /^[\u4E00-\u9FA5a-z0-9_]+$/i;
 if(username==''){
   addClass("usernametip","tipsno","您还没有输入用户名");
 }else if(username.length<3||username.length>16){
   addClass("usernametip","tipsno","用户名长度3-16个字符");
 }else if(isFirstNum(username)){
   addClass("usernametip","tipsno","用户名不能使用数字开头");
 }else if(!testUser.test(username)){
   addClass("usernametip","tipsno","仅可使用字母、数字、汉字和下划线");
 }else{
   $.getJSON(get_url("act=verifyusername&username="+encodeURIComponent(username)),function(res){
     if(res.error=='0'){
       addClass("usernametip","tipsno","对不起，该用户名已存在");
     }else{
       addClass("usernametip","tipsyes","&nbsp;");
     }
   });
 }	
}
function checkidcard(){
 var idcard = $("#idcard").val();
 if(idcard==''){
  addClass("idcardtip","tipsno","您还没有输入身份证号");
 }else if(!checkId(idcard)){
   addClass("idcardtip","tipsno","身份证格式不正确");
 }else{
   addClass("idcardtip","tipsyes","&nbsp;");
 }	
}


function checkgroupid(){
  var groupid = $("#groupid").val();
  if(groupid==''){
    addClass("groupidtip","tipsno","对不起，请选择会员级别");
  }else{
    addClass("groupidtip","tipsyes","&nbsp;");
  }
}

function checkpassword(){
	var password = $("#password").val();
	var strleng = password.length;
	if(strleng<6){
	   addClass("passwordtip","tipsno","对不起用户密码长度不得小于6位");
	}else{
	   addClass("passwordtip","tipsyes","&nbsp;");
	}
}

function checkreferee(){
  var referee = $("#referee").val();
  if(referee==''){
    addClass("refereetip","tipsno","对不起，请输入直荐会员");
  }else{
    addClass("refereetip","tipsyes","&nbsp;");
  }
}
  
function checkrepass(){
  if($("#repass").val()==""){
    addClass("repasstip","tipsno","请输入支付密码。");
  }else if($("#repass").val().length<6){
    addClass("repasstip","tipsno","支付密码长度最小六位！");
  }else{
    addClass("repasstip","tipsyes","&nbsp;");
  }
}
function check_position(){
  if($('input[name="_position"]:checked').val()==undefined){
    addClass("_positiontip","tipsno","对不起，请选择所在位置");
  }else{
    addClass("_positiontip","tipsyes","&nbsp;");
  }
}
function checknowopen(){
  var nowopen = $("#nowopen").val();
  if(nowopen==''){
    addClass("nowopentip","tipsno","请选择是否现在开通");
  }else{
    addClass("nowopentip","tipsyes","&nbsp;");
	checkgroupid();
  }
}
function checkcounty(){
 if($("#province").val()==''||$("#city").val()==''||$("#county").val()==''){
  addClass("countytip","tipsno","请正确选择你的区域信息！");
 }else{
  addClass("countytip","tipsyes","&nbsp;");
 }	
}
function inmember(){
  var post = true; 
  var testUser = /^[\u4E00-\u9FA5a-z0-9_]+$/i;    
  if($("#username").val()==''){
    addClass("usernametip","tipsno","您还没有输入用户名");
    post = false;
  }
  if($("#username").val().length<4||$("#username").val().length>20){
    post = false;
  }
  if(isFirstNum($("#username").val())&&post){
    post = false;
  }
  if(!testUser.test($("#username").val())&&post){
    post = false;
  }
  if($("#usernametip").html().indexOf('已注册过') != -1&&post){
    post = false;
  }   
  if($("#idcard").val()==''){
    addClass("idcardtip","tipsno","您还没有输入身份证号");
    post = false;
  }
  if(!checkId($("#idcard").val())){
    post = false;
  }
  if($("#groupid").val()==''){
	addClass("groupidtip","tipsno","对不起，请选择会员级别");
    post = false;
  }  
  if($("#nowopen").val()==''){
	addClass("nowopentip","tipsno","请选择是否现在开通");
    post = false;
  }   
  if($("#password").val()==''){
	addClass("passwordtip","tipsno","对不起，请输入会员登陆密码");
    post = false;
  }  
  if($("#password").val().length<6){
    addClass("passwordtip","tipsno","密码长度最小六位！");
    post = false;
  }  
  if($("#repass").val()==''){
	addClass("repasstip","tipsno","对不起，请输入支付密码");
    post = false;
  } 
  if($("#repass").val().length<6){
    addClass("repasstip","tipsno","支付密码长度最小六位！");
    post = false;
  }
  if(post) listTable.inmember();  
  return false;
} 

function atmsubmit(){
  var post = true;   
  if($('input[name="id[]"]:checked').val()==undefined){
	Wrong('请选择要处理的提现申请');
    post = false;
  }  
  if(post) listTable.ajaxform('批量确认付款','atmpost',''); 
  return false;
} 


function addlink(){
  var html = '<tr class="s_out" onmouseover="this.bgColor=\'#F5F5F5\';" onmouseout="this.bgColor=\'ffffff\';" bgcolor="#ffffff">';
  html += '<input type="hidden" name="id[]" value="">';
  html += '<td align="center">&nbsp;&nbsp;</td>';
  html += '<td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="linkname[]" id="linkname[]" class="skey" style=\'width:130px;\'/>';
  html += '</td><td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="linkurl[]" id="linkurl[]" value="http://" class="skey" style=\'width:250px;\'/>';
  html += '</td><td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="linkorder[]" id="linkorder[]" value="0" class="skey" style=\'width:50px;\'/>';
  html += '</td><td align="center"><a onclick="$(this).parent().parent().remove();" href="javascript:;">移除</a></td></tr>';
  $("#type").append(html);
}
function addask(obj){
  var html = '<li>推荐 <input type="text" name="'+obj+'n[]" value=""/> ';
  html += '人可拿 <input type="text" name="'+obj+'f[]" value=""/> 层 <span onclick="$(this).parent().remove();">删除</span></li>';
  $("#"+obj+"ask").append(html);
}
function addunit(obj){
  var time = new Date().getTime();
  var html = '<li><input type="text" name="'+obj+'['+time+'][price]" value=""/> 元/';
  html += '<input type="text" name="'+obj+'['+time+'][unit]" value=""/> <span onclick="$(this).parent().remove();">删除</span></li>';
  $("#"+obj+"ask").append(html);
}
function addhy(obj){
  var time = new Date().getTime();
  var html = '<li><input type="text" name="'+obj+'['+time+'][price]" value=""/> 元/件&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
  html += '起购：<input type="text" name="'+obj+'['+time+'][minimum]" value=""/>件&nbsp&nbsp<span onclick="$(this).parent().remove();">删除</span></li>';
  $("#"+obj+"ask").append(html);
}
function addtg(obj){
  var time = new Date().getTime();
  var html = '<li><input type="text" name="'+obj+'['+time+'][price]" value=""/> 元/件&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
  html += '起购：<input type="text" name="'+obj+'['+time+'][minimum]" value=""/>件&nbsp&nbsp<span onclick="$(this).parent().remove();">删除</span></li>';
  $("#"+obj+"ask").append(html);
}
function addtype(){
  var html = '<tr class="s_out" onmouseover="this.bgColor=\'#F5F5F5\';" onmouseout="this.bgColor=\'ffffff\';" bgcolor="#ffffff">';
  html += '<input type="hidden" name="id[]" value="">';
  html += '<td align="center">&nbsp;&nbsp;</td>';
  html += '<td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="typename[]" id="typename[]" class="skey" style=\'width:130px;\'/>';
  html += '</td><td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="typeorder[]" id="typeorder[]" class="skey" style=\'width:50px;\'/>';
  html += '</td><td align="center"><a onclick="$(this).parent().parent().remove();" href="javascript:;">移除</a></td></tr>';
  $("#type").append(html);
}
function addnewstype(){
  var html = '<tr class="s_out" onmouseover="this.bgColor=\'#F5F5F5\';" onmouseout="this.bgColor=\'ffffff\';" bgcolor="#ffffff">';
  html += '<input type="hidden" name="id[]" value="">';
  html += '<td align="center">&nbsp;&nbsp;</td>';
  html += '<td align="center"><input type="text" name="typename[]" id="typename[]" class="skey" style=\'width:130px;\'/></td>';
  html += '<td align="center"><input type="text" name="system[]" id="system[]" class="skey" style=\'width:50px;\'/></td>';
  html += '<td align="center"><input type="text" name="typeorder[]" id="typeorder[]" class="skey" style=\'width:50px;\'/></td>';
  html += '<td align="center"><a onclick="$(this).parent().parent().remove();" href="javascript:;">移除</a></td></tr>';
  $("#type").append(html);
}
$(function(){
 $(".noorderback").click(function(){
	var id = $(this).attr('orderid');
	var _this = $(this);
    showhandle({
      html:'<table class="lotab"><tr><th><label>拒绝原因：</label></th><td><textarea name="message" id="messagea" class="textarea"></textarea></td></tr><tr><th><label>管理密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:320,
      height:210,
      id:'backmoney',
      title:'拒绝退款'
    },function(){
	  $("#controlLoad").show();
	  removetip("backmoney");																	 
      $.getJSON(listTable.url+'&repass='+$("#repass").val()+'&do=nobackmoney&id='+id+'&message='+encodeURIComponent($("#messagea").val()),function(res) {
	    $("#controlLoad").hide();	
        if(res.error == 0){
		  hidebox('backmoney',true);
		  location.href = location.href;
        }else{
	      addtip("backmoney",res.error);
        }											
      });							  
    });					
 }); 
  $(".nopicture").click(function(){
  var id = $(this).attr('orderid');
  var _this = $(this);
    showhandle({
      html:'<table class="lotab"><tr><th><label>凭证错误原因：</label></th><td><textarea name="reason" id="reasona" class="textarea"></textarea></td></tr><tr><th><label>管理密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:320,
      height:210,
      id:'backpicture',
      title:'确认上传凭证是否正确'
    },function(){
    $("#controlLoad").show();
    removetip("backpicture");                                  
      $.getJSON(listTable.url+'&repass='+$("#repass").val()+'&do=notpicture&id='+id+'&reason='+encodeURIComponent($("#reasona").val()),function(res) {
      $("#controlLoad").hide(); 
        if(res.error == 0){
      hidebox('backpicture',true);
      location.href = location.href;
        }else{
        addtip("backpicture",res.error);
        }                     
      });               
    });         
 }); 
 $(".orderback").click(function(){
	var id = $(this).attr('orderid');
	var _this = $(this);
    showhandle({
      html:'<table class="lotab"><tr><th><label>管理密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:320,
      height:130,
      id:'backmoney',
      title:'处理退款'
    },function(){
	  $("#controlLoad").show();
	  removetip("backmoney");
      $.getJSON(listTable.url+'&repass='+$("#repass").val()+'&do=backmoney&id='+id,function(res) {
	    $("#controlLoad").hide();
        if(res.error == 0){
		  hidebox('backmoney',true);
		  _this.parent().html('已退款');
        }else{
		  addtip("backmoney",res.error);
        }											
      });
    });					
 });
 $(".ordersend").click(function(){
	var id = $(this).attr('orderid');
	var _this = $(this);
    showhandle({
      html:'<table class="lotab"><tr><th><label>物流：</label></th><td><input id="express" class="myinput repass" type="text"></td></tr><tr><th><label>快递单号：</label></th><td><input id="expressnumber" class="myinput repass" type="text"></td></tr><tr><th><label>货号区间：</label></th><td><input id="mincode" class="myinput repass"  style="width:70px" placeholder="" type="text"><span style="line-height:30px;float:left">—</span><input id="maxcode" style="width:70px" class="myinput repass" type="text"></td></tr><tr><th><label>管理密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:600,
      height:300,
      id:'ordersend',
      title:'确认发货'
    },function(){
	  $("#controlLoad").show();
	  removetip("ordersend");
      $.getJSON(listTable.url+'&repass='+$("#repass").val()+'&do=ordersend&id='+id+'&express='+encodeURIComponent($("#express").val())+'&expressnumber='+encodeURIComponent($("#expressnumber").val())+'&mincode='+encodeURIComponent($("#mincode").val())+'&maxcode='+encodeURIComponent($("#maxcode").val())+'&repass='+encodeURIComponent($("#repass").val()),function(res) {
		$("#controlLoad").hide(); 
        if(res.error == 0){
		  hidebox('ordersend',true);
		  _this.parent().html('已发货');
        }else{
	      addtip("ordersend",res.error);
        }											
      });						  
    });					
 });

  $(".orderok").click(function(){
    var id = $(this).attr('orderid');
    $.getJSON(get_url('act=confirmorder&id='+id),function(res){   
                                   
    if(res.error == '0'){
       Right('确认收款成功，请确认发货！');
    }else{
      addtip("payorder",res.error);
     
    }        
    }); 
  });
 $(".changemoney").click(function(){
	var uid = $(this).attr('uid');
	var username = $(this).attr('username');
	var money = $(this).attr('money');
	var balance = $(this).attr('balance');
	var shopmoney = $(this).attr('shopmoney');
    showhandle({
      html:'<table class="lotab lotab1"><tr><th><label>会员账号：</label></th><td>'+username+'</td></tr><tr><th><label>变动原因：</label></th><td><textarea name="content" id="content" class="textarea"></textarea></td></tr><tr><th><label>账户现金：</label></th><td><select name="add_money" id="add_money" ><option value="1" selected="selected">充值</option><option value="0">扣款</option></select> <input name="rank_money" type="text" id="rank_money" value="0" class="myinput repass2" /> 余：'+money+'</td></tr><tr><th><label>管理密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:350,
      height:245,
      id:'ordersend',
      title:'资金变动'
    },function(){
	  $("#controlLoad").show();
	  removetip("ordersend");
      $.getJSON(listTable.url+'&do=changemoney&uid='+uid+'&repass='+$("#repass").val()+'&rank_money='+$("#rank_money").val()+'&add_money='+$("#add_money").val()+'&content='+encodeURIComponent($("#content").val()),function(res) {
        $("#controlLoad").hide();																																														
        if(res.error == 0){
	      $("#money_"+uid).html(res.money);
		  hidebox('ordersend',true);
		  Right('恭喜你，资金变动成功！');
        }else{
		  addtip("ordersend",res.error);
        }											
      });						  
    });					
 });
 $('input:radio[name="sendtype"]').click(function(){ 
   $(this).parent().find('span').hide();										 
   if($(this).val()==1){ 
     $("#sendtype_1").show();
   }else if($(this).val()==2){
     $("#sendtype_2").show();
   }
 }); 
});
function select_tab(curr_tab){
  $("form[name='shopform'] > div").hide();
  $("#table_box_"+curr_tab).show();
  $("ul[name=menu1] > li").removeClass('selected');
  $('#li_'+curr_tab).addClass('selected');
}

function ordercheckForm(){
  var post = true;
  if($('#username').val()==''&&post){
	Wrong('对不起，请输入消费会员账号');
	post = false;  
  }
  if($('#money').val()==''&&post){
	Wrong('对不起，请填写消费金额');
	post = false;  
  }
  if(post) listTable.ajaxform('在线下单','orderform',''); 
  return false;
}


function shopcheckForm(){
  var post = true;
  if($('#goods_name').val()==''&&post){
	Wrong('对不起，请输入产品名称');
	select_tab(1);
	post = false;  
  }
  if($('#shop_price').val()==''&&post){
	Wrong('对不起，请填写销售价格');
	select_tab(1);
	post = false;  
  }
  if($('#unit_rate').val()==''&&post){
  Wrong('对不起，请填写单位换算比例');
  select_tab(1);
  post = false;  
  }
  if($('#margin').val()==''&&post){
	Wrong('对不起，请填写结算金额');
	select_tab(1);
	post = false;  
  }
  if(goods_desc_editor.isEmpty()&&post){
	Wrong('对不起，请输入商品详细介绍');
	select_tab(2);
	post = false;  
  }
  if($('.thumb_list').val()==undefined&&post){
	Wrong('对不起，请为商品上传至少一张图片!');
	select_tab(3);
	post = false;  
  }
  if(post) listTable.ajaxform(shoptitle,'shopform',''); 
  return false;
}
function configcheckForm(){
  var post = true;
  if(post) listTable.ajaxform('系统配置','configform',''); 
  return false;
}
function messagecheckForm(){
  var post = true;
  if($('#title').val()==''&&post){
	Wrong('对不起，请输入信件主题');
	post = false;  
  }
  if($('#content').val()==''&&post){
	Wrong('对不起，请填写信件内容');
	post = false;  
  }
  if(post) listTable.ajaxform('发送邮件','messageform',''); 
  return false;
}

function managercheckForm(title){
  var post = true;
  if($('#username').val()==''&&post){
	Wrong('对不起，用户名不能为空');
	post = false;  
  }
  if($('#groupid').val()==''&&post){
	Wrong('对不起，请选择用户所属角色');
	post = false;  
  }
  if($('#password').val()==''&&post&&re=='add'){
	Wrong('对不起，密码不能为空');
	post = false;  
  }
  if(post) listTable.ajaxform(title,'managerform',''); 
  return false;
}
function groupcheckForm(title,message){
  var post = true;
  if($('#groupname').val()==''&&post){
	Wrong('对不起，'+message+'名称不能为空');
	post = false;  
  }
  if(post) listTable.ajaxform(title,'groupfrom',''); 
  return false;
}
function passwordcheckForm(){
  var post = true;
  if($('#username').val()==''&&post){
	Wrong('对不起，请填写要重置会员的会员账号');
	post = false;  
  }
  if($('#password').val()==''&&$('#repass').val()==''&&post){
	Wrong('对不起，不能一个密码也不重置');
	post = false;  
  }  
  if(post) listTable.ajaxform('重置密码','passwordfrom',''); 
  return false;
}
function checktruename(){
 var truename = $("#truename").val();
 if(truename==''){
   addClass("truenametip","tipsno","请输入银行卡开户名");
 }else{
  addClass("truenametip","tipsyes","&nbsp;");
 }
}
function checkbankname(){
 var bankname = $("#bankname").val();
 if(bankname==''){
   addClass("banknametip","tipsno","请选择银行卡开户地址");
 }else{
  addClass("banknametip","tipsyes","&nbsp;");
 }
}
function checkbankadd(){
 var bankadd = $("#bankadd").val();
 if(bankadd==''){
  addClass("bankaddtip","tipsno","请选择银行卡开户地址");
 }else{
  addClass("bankaddtip","tipsyes","&nbsp;");
 }
}
function checkbankcard(){
 var bankcard = $("#bankcard").val();
 if(bankcard==''){
  addClass("bankcardtip","tipsno","请输入银行卡卡号");
 }else{
  addClass("bankcardtip","tipsyes","&nbsp;");
 }
}