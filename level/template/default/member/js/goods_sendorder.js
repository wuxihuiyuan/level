 

function payorder(id){
    $.getJSON(get_url('act=payorder&repass='+$("#repass").val()+'&id='+id),function(res){                                 
    if(res){
      location.reload();
      }else{
      addtip("payorder",res.error);
      }        
    });
}      

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