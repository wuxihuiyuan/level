$(document).ready(function() {
 showtip("name","请输入爱真情会员账号");
 showtip("province","请选择你所在的行政区域");
 showtip("address","请输入爱真情账号昵称");
 showtip("mobile","请填写你的联系电话");
});
function checkname(){
 var name = $("#name").val();
 if(name==''){
   addtip("name","请输入爱真情会员账号");
 }else{
   yestip("name",'输入的爱真情会员账号验证通过');
 }
}
function checkprovince(){
 if($("#province").val()==''||$("#city").val()==''||$("#county").val()==''){
   addtip("province","请选择你所在的行政区域");
 }else{
   yestip("province",'所在的行政区域验证通过');
 }
}
function checkaddress(){
 var address = $("#address").val();
 if(address==''){
   addtip("address","请输入爱真情账号昵称");
 }else{
   yestip("address",'输入的爱真情账号昵称验证通过');
 }
}
function checkmobile(){
 var mobile = $("#mobile").val();
 if(mobile==''){
   addtip("mobile","请输入你的联系电话");
 }else{
   yestip("mobile",'输入的联系电话验证通过');
 }
}
function checkform(){
 var post = true; 
 if($("#name").val()==''){
   addtip("name","请输入爱真情会员账号");
   post = false;
 } 
 if($("#province").val()==''||$("#city").val()==''||$("#county").val()==''){
   addtip("province","请选择你所在的行政区域");
   post = false;
 } 
 if($("#address").val()==''){
   addtip("address","请输入爱真情账号昵称");
   post = false;
 } 
 if($("#mobile").val()==''){
   addtip("mobile","请填写你的联系电话");
   post = false;
 } 
 return post;  
} 