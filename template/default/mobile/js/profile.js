function checkusername(){
 var show = true;
 var username = $("#username").val();
 var username = $("#username").val();
 if(username=='请设置用户名，仅可设置一次'){
   username='';
   show = false;
 }
 if(show){
 if(username==''){
   _addtip("username","请输入您要使用的用户名");
 }else if(!isSpecial(username)){
   _addtip("username","仅可使用字母、数字和下划线");
 }else if(isFirstNum(username)){
   _addtip("username","用户名不能使用数字开头");
 }else if(username.length<4||username.length>20){
   _addtip("username","用户名长度4-20个字符");
 }else{
  $.ajax({url:ajaxurl('&do=chkusername&username='+encodeURIComponent(username)),
	type:'GET',
	success:function(msg){
      if(msg.trim()=='ok'){
        _removetip("username","");
      }else{
        _addtip("username",'该用户名已经被使用');
      }	
    }
  });
 }	
 }
}
function checkform(){
  var post = true; 
  if($("#username").val()==''||$("#username").val()=='请设置用户名，仅可设置一次'){
    _addtip("username","请输入您要使用的用户名");
    post = false;
  }
  if(!isSpecial($("#username").val())&&post){
    post = false;
  }
  if(isFirstNum($("#username").val())&&post){
    post = false;
  }
  if($("#username").val().length<4||$("#username").val().length>20){
    post = false;
  }
  if($("#usernametip").html().indexOf('该用户名已经被使用') != -1&&post){
    post = false;
  } 
  return post;  
} 