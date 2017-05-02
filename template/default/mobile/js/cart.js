function checktruename(){
  var truename = $("#truename").val();
  if(truename==""){
    _addtip("truename","请输入联系人。");
  }else{
    _removetip("truename");
  }
}
function checkphone(){
  var phone = $("#phone").val();
  if(phone==""){
    _addtip("phone","请输入手机号码。");
  }else{
    _removetip("phone");
  }
}
function checkaddress(){
  var address = $("#address").val();
  if(address==""){
    _addtip("address","请输入联系地址。");
  }else{
    _removetip("address");
  }
}
function checkmessage(){
  var message = $("#message").val();
  if(message==""){
    _addtip("message","请输入备注信息。");
  }else{
    _removetip("message");
  }
}
function checkform(){
  var post = true; 
  if($("#truename").val()==''){
    _addtip("truename","请输入联系人。");
    post = false;
  }
  if($("#phone").val()==''){
    _addtip("phone","请输入手机号码。");
    post = false;
  }
  if($("#address").val()==''){
    _addtip("address","请输入联系地址。");
    post = false;
  }
  if($("#message").val()==''){
    _addtip("message","请输入备注信息。");
    post = false;
  }
  if(!post)  _scroll('truename');
  return post;  
} 