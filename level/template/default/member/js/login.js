$(document).ready(function() {
	var bgImg = Math.floor(Math.random()*5+1);
	var bg = "url(template/default/member/images/timg0"+ bgImg +".jpg)";
	console.log(bg)
	$("body").css({"background-image":bg});
	
 $.getScript(appdir + "/placeholder.js");
});
function checkusername(){
 var show = true;
 var username = $("#username").val();
 if(username=='用户名/电子邮箱/绑定手机'){
   username='';
   show = false;
 }
 if(username==''&&show&&$("#passwordtip").is(":hidden")){
   addtip("username","请输入用户名/电子邮箱/绑定手机");
 }else if(show){
   removetip("username");
 }
}
function checkpassword(){
 var username = encodeURIComponent($("#username").val());
 var password = $("#password").val();
 if(password==''){
   if($("#usernametip").is(":hidden")) addtip("password","请输入登陆密码");
 }else{
   removetip("password");	 
 }
}
function checkform(){
 var post = true; 
 if(($("#username").val()==''||$("#username").val()=='用户名/电子邮箱/绑定手机')&&$("#passwordtip").is(":hidden")){
   addtip("username","请输入用户名/电子邮箱/绑定手机");
   post = false;
 } 
 if($("#password").val()==''&&$("#usernametip").is(":hidden")){
   addtip("password","请输入登陆密码");
   post = false;
 }    
 if($("#passwordtip").html().indexOf('密码错误或')!=-1&&post){
   addtip("password",$("#passwordtip").html());
   post = false;
 } 
 return post;  
} 