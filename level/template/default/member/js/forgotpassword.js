var resendtime;
var sel;
$(document).ready(function() {
	var bgImg = Math.floor(Math.random()*5+1);
	var bg = "url(template/default/member/images/timg0"+ bgImg +".jpg)";
	console.log(bg)
	$("body").css({"background-image":bg});
  $.getScript(appdir + "/placeholder.js");
  $("#bind_mobile_btn").click(function(){
    if(isPhone($("#userphone").val())){
      $.getJSON(get_url("act=getphonecode&type=forgotpassword&userphone="+$("#userphone").val()),function(res){
		if(res.error=='0'){														   
	      $(this).attr("disabled",true);
	      $(this).addClass("smsbut-dis");
	      $(this).val("重新获取(120)");
          resendtime = 120;
	      bindmobile();	
		}else{
		  addtip("userphone",res.error);	
		}
      });
	}else{
	  addtip("userphone","请输入正确的11位手机号码");
	}
  });
  resendtime = $("#resendtime").val();
  bindmobile();
});
function bindmobile(){
  var mobile_btn_id = $("#user_mobile_btn").val();
  if(resendtime < 0){
	resendtime = 0;
  }else{
    $("#"+mobile_btn_id).attr("disabled",true);
    $("#"+mobile_btn_id).val("重新获取("+resendtime+")");
    $("#"+mobile_btn_id).addClass("smsbut-dis");
	showtip("userphone","已发送，2分后可重新获取。");  
	showtip("mobile_btn","已发送，2分后可重新获取。");	
  }
  if(resendtime>=0){
    sel = setInterval(function(){
      if(resendtime==0){
         $("#"+mobile_btn_id).attr("disabled",false);
         $("#"+mobile_btn_id).val("获取验证码");
		 $("#"+mobile_btn_id).removeClass("smsbut-dis");
         clearInterval(sel);
         return;
      }else{
         resendtime--;
         $("#"+mobile_btn_id).attr("disabled",true);
         $("#"+mobile_btn_id).val("重新获取("+resendtime+")");
		 $("#"+mobile_btn_id).addClass("smsbut-dis");
	  }
    },1000);
  }
}    
function checkcheckcode(){
  var checkcode = $("#checkcode").val();
  var userphone = $("#userphone").val();
  if(checkcode=='手机接收到的验证码') checkcode = '';
  if(checkcode==""){
    if($("#checkcode").val()!='手机接收到的验证码') addtip("checkcode","请输入验证码。");
  }else{	  
    $.getJSON(get_url("act=verifyphonecode&userphone="+userphone+"&code="+checkcode),
	   function(res){
		 if(res.error=='1'){														   
	       yestip("checkcode","");
		   $("#usepassword").show();
		 }else{
		   addtip("checkcode","验证码不正确。");	
		 }
       }
	);
  }
}
function getpassword(){
  showtip("password","至少6位的数字、字母组合，区分大小写。");
  $(".grade-pwd").show();
}      
function checkpassword(){
 if($("#password").val()==''){
   addtip("password","至少6位的数字、字母组合，区分大小写。"); 
 }else if($("#password").val().length<6){
   addtip("password","密码长度最小六位！");
 }else if($(".grade-text").text() == "弱"){
   addtip("password","强度不够，请用字母数字等混合输入。");
 }else{
   yestip("password","");
   checkcpassword();
 }
}
function getcpassword(){
  showtip("cpassword","请再次输入新的密码。");
}    
function checkcpassword(){
  var cpassword = $("#cpassword").val();
  var password = $("#password").val();
  if(cpassword==""){
    addtip("cpassword","请再次输入新的密码。");
  }else if(cpassword!=password){
    addtip("cpassword","两次输入密码不一致。");
  }else{
    yestip("cpassword","");
  }
}
function checkphoneform(){
  var post = true; 
  if(!isPhone($("#userphone").val())){
    addtip("userphone","请输入正确的11位手机号码");
	post = false;
  }
  if($("#userphonetip").html().indexOf('该手机不存在或未绑定')!=-1&&post){
    post = false;
  }
  if($("#checkcode").val()==''||$("#checkcode").val()=='手机接收到的验证码'){
    addtip("checkcode","请输入验证码。");
    post = false;
  }
  if($("#checkcodetip").html().indexOf('验证码不正确')!=-1&&post){
    post = false;
  }
  if($("#password").val()==''){
    addtip("password","至少6位的数字、字母组合，区分大小写。");
    post = false;
  }
  if($("#password").val().length<6&&post){
	post = false;
  }
  if($(".grade-text").text() == "弱"){
	post = false;
  }
  if($("#cpassword").val()==""){
    addtip("cpassword","请再次输入密码。");
	post = false;
  }
  if($("#cpassword").val()!=$("#password").val()&&post){
	post = false;
  }
  return post;  
} 
function checkemail(){
 var email = $("#email").val();
 var show = true;
 if(email=='请输入注册邮箱'&&$("#seccodetip").is(":hidden")){
   email='';
   show = false;
 }
 if(email==''&&show&&$("#seccodetip").is(":hidden")){
   addtip("email","请输入注册邮箱！");
 }else{
   if(!isEmail(email)&&$("#seccodetip").is(":hidden")){
     if(show) addtip("email","您输入的邮箱格式错误");		
   }else{
     removetip("email");
   }
 }
}

function checkseccode(){
 var seccode = $("#seccode").val();
 var show = true;
 if(seccode=='请输入验证码'){
  seccode='';
  show = false;
 }
 if((seccode.length!=4||isinCn(seccode))&&show){
   addtip("seccode","请输入验证码，4个非中文字符！");
 }else{
   $.ajax({url:get_url('&act=verifyseccode&seccode='+seccode),
	 type:'GET',
	 success:function(res){
       if(res=='yes'||!show){
         removetip("seccode");
       }else{
         addtip("seccode","您输入的验证码有误");
       }										  
     }
   });
 }
}

function checkform(){
  var email = $("#email").val()=='请输入注册邮箱' ? "" : $("#email").val();
  var post = true;    
  if(email==''&&$("#seccodetip").is(":hidden")){
    addtip("email","请输入注册邮箱！");
    post = false;
  }
  if(!isEmail(email)&&post){
    post = false;
  }
  if(($("#seccode").val().length!=4||isinCn($("#seccode").val()))&&$("#emailtip").is(":hidden")){
    addtip("seccode","请输入验证码，4个非中文字符！");
    post = false;
  }
  if($("#seccodetip").html().indexOf('您输入的验证码有误') != -1){
    post = false;
  }   
  return post;  
} 

function checkreset(){
  var post = true; 
  if($("#password").val()==''){
    addtip("password","至少6位的数字、字母组合，区分大小写。");
    post = false;
  }
  if($("#password").val().length<6&&post){
	post = false;
  }
  if($(".grade-text").text() == "弱"){
	post = false;
  }
  if($("#cpassword").val()==""){
    addtip("cpassword","请再次输入密码。");
	post = false;
  }
  if($("#cpassword").val()!=$("#password").val()&&post){
	post = false;
  }
  return post;  
} 