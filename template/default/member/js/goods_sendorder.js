 

function payorder(id){
    $.getJSON(get_url('act=payorder&repass='+$("#repass").val()+'&id='+id),function(res){                                 
    if(res){
      location.reload();
      }else{
      addtip("payorder",res.error);
      }        
    });
}      
$(function(){//表单
$(".ordersend").click(function(){
var id = $(this).attr('orderid');
var _this = $(this);
   showhandle({
     html:'<table class="lotab"><tr><th><label>物流：</label></th><td><input id="express" class="myinput repass" type="text"></td></tr><tr><th><label>快递单号：</label></th><td><input id="expressnumber" class="myinput repass" type="text"></td></tr><tr><th><label>货号区间：</label></th><td><input id="mincode" class="myinput repass"  style="width:70px" placeholder="" type="text"><span style="line-height:30px;float:left">—</span><input id="maxcode" style="width:70px" class="myinput repass" type="text"></td></tr><tr><th><label>管理密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
     width:600,
     height:350,
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
 $('.confirmorder').click(function(event) {
    var id = $(this).attr('orderid');
    showhandle({
      html:'<table class="lotab"><tr><th><label>支付密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:320,
      height:140,
      id:'yeshave',
      title:'确认收货'
    },function(){
    
      $("#controlLoad").show();
      removetip("yeshave");
      $.getJSON(get_url('act=confirmorder&type=user&repass='+$("#repass").val()+'&id='+id),function(res){
        $("#controlLoad").hide();                                    
        if(res.error=='0'){
          hidebox('yeshave',true);
           location.reload();
        }else{
          addtip("yeshave",res.error);
        }               
      });
    });
});
})
function checkForm(){
  var post = true;
  if($('.thumb_list').val()==undefined&&post){
    Wrong('对不起，请上传支付凭证!');
    post = false;  
  }
  if(post) listTable.memberfrom('确认付款','shopform',''); 
  return false;
} 
$(function(){
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
})