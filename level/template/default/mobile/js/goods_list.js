function settake(id){
  $("#takeList").find('dl').removeClass('selected');
  $("#remove_"+id).addClass('selected');
  $("#takeid").val(id);
}
function checkform(){
  var post = true; 
  var checked = $('.table').find('input[type=checkbox]:checked');
  if(!checked.size()) {
	 Wrong('请选择订购类型！');
    post = false;
  }
  if(post) listTable.mobilefrom('产品订购','goodsfrom','');
  return false;
} 
function _number(code,sid,gid,min){
  var number = $('#number_'+sid+'_'+gid).val();
  if(!(number.match(/\D/)===null)){
   Wrong('购买数量请输入数字!');
   $('#number_'+sid+'_'+gid).val(min);
   $('#number_'+sid+'_'+gid)[0].focus();
   return false;
  }
  if(code==1) {
    number = parseInt(number)+1;
    $('#number_'+sid+'_'+gid).val(number);
  }
  if(code==-1){
   if(parseInt(number)<=parseInt(min)){
      number = parseInt(min);
      Wrong('购买数量已最小!');
     $('#number_'+sid+'_'+gid).val(parseInt(min));
   }else{
      number = parseInt(number)-1;
     $('#number_'+sid+'_'+gid).val(number);
   }
  }
  getprice(sid,gid,number);
}
function _input(code,sid,gid,min){
  var number = $(obj).val();
  console.log(min);console.log(number);
/*  var _price = parseFloat($('#_price_'+id).html());
  var price = parseFloat($('#price').html());
  if(!(number.match(/\D/)===null)){
    Wrong('购买数量请输入数字!');
    $(obj)[0].focus();
    $(obj).val('0');
    return false;
  }
  if(number<min){
    Wrong('起购量为'+min);
    $(obj)[0].focus();
    $(obj).val('0');
    return false;
  }
  getprice(id);*/
}
function getprice(sid,gid,number){
  var price = parseInt(number)*2990*15;
  $('#price_'+sid+'_'+gid).html(price);
  var sprice = 0;
  var allprice = 0;
/*  $(".price_"+sid).each(function(){
    sprice += parseInt($(this).html());
  });
  $("#price_"+sid).html(sprice);*/
/*  $("._price_").each(function(){
    allprice += parseInt($(this).html());
  });
  */
}
function get_price(){
  var checked = $('.table').find('input[type=checkbox]:checked');
  var price=0;
  checked.each(function(){
    price += parseInt($(this).parents('tr:.one_detail').find('._price_').html());
  });
  $("#price").html(price);
}
function addtack(id){
  if(id==null){
    sinbox('关联爱真情账号信息',get_path_url('?mod=mobile&act=delivery&refun=restack'),430,350);
  }else{
    sinbox('更新爱真情账号信息',get_path_url('?mod=mobile&act=delivery&refun=retack&id='+id),430,350);  
  }
}
function restack(json){
  if(json==null) return false;  
  var div = '<dl id="remove_'+json.id+'" onClick="settake(\''+json.id+'\');">';
  div += '<dt><strong class="itemConsignee">'+json.name+'</strong> <span class="itemTel">'+json.mobile+'</span> </dt>';
  div += '<dd><p class="itemStreet">'+json.address+'</p>';
  div += '<span class="icon-common icon-common-del delete" onClick="listTable.mobileRemove(\''+json.id+'\',\'确定要解除该账号信息关系?\');"></span>';
  div += '<span class="icon-common icon-common-edit" onClick="addtack(\''+json.id+'\');"></span>';  
  div += '</dd>';
  div += '</dl>';
  $('#takeList').append(div);
  Close();
}
function retack(json){
  if(json==null) return false;
  var div = '<dt><strong class="itemConsignee">'+json.name+'</strong> <span class="itemTel">'+json.mobile+'</span> </dt>';
  div += '<dd><p class="itemStreet">'+json.address+'</p>';
  div += '<span class="icon-common icon-common-del delete" onClick="listTable.mobileRemove(\''+json.id+'\',\'确定要解除该账号信息关系?\');"></span>';
  div += '<span class="icon-common icon-common-edit" onClick="addtack(\''+json.id+'\');"></span>';  
  div += '</dd>';
  $("#remove_"+json.id).html(div);
  Close();
}