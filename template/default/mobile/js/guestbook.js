function checkmessage(){
  var message = $("#message").val();
  if(message==""){
    _addtip("message","请输入反馈内容。");
  }else{
    _removetip("message");
  }
}
function checkform(){
  var post = true; 
  if($("#message").val()==''){
    _addtip("message","请输入反馈内容。");
    post = false;
  }
  return post;  
} 