
function checkshjiform(){
	var post = true;   
	if($("#groupid").val()==''){
	addtip("groupid","对不起，请选择升级级别");
	  post = false;
	}   
	if(post) listTable.upgroup($("#groupid").val());
} 