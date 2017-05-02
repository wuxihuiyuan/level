function settake(id){
  $("#takeList").find('dl').removeClass('selected');
  $("#remove_"+id).addClass('selected');
  $("#takeid").val(id);
}
function checkform(){
  var post = true; 
  var checked = $('.table').find('input[type=checkbox]:checked');
  // if(!checked.size()) {
	 // Wrong('请选择订购类型！');
  //   post = false;
  // }
  if(post) listTable.memberfrom('产品订购','goodsfrom','');
  return false;
} 
function _number(code,sid,min){
  var number = $('#number_'+sid).val();

  if(!(number.match(/\D/)===null)){
   Wrong('购买数量请输入数字!');
   $('#number_'+sid).val(min);
   $('#number_'+sid).focus();
   return false;
  }
  var store = $('input[name=store]').val();


  if(code==1) {
    if($('input[name=store]').length==1 && parseInt(store)<=parseInt(number)){
      Wrong('库存不足!');
      return false;
    }
    number = parseInt(number)+1;
    $('#number_'+sid).val(number);
  }
  if(code==-1){
   if(parseInt(number)<=parseInt(min)){
      number = parseInt(min);
      Wrong('购买数量已最小!');
     $('#number_'+sid).val(parseInt(min));
   }else{
      number = parseInt(number)-1;
     $('#number_'+sid).val(number);
   }
  }

  var all_money = $('.info_'+sid).data('value');
  var bonus = $('.info_'+sid).data('bonus');
  getprice(sid,number,bonus,all_money);
}
function _input(obj,id,min,bonus){
  var number = $(obj).val();
  var _price = parseFloat($('#_price_'+id).html());
  var price = parseFloat($('#price').html());
  if(!(number.match(/\D/)===null)){
    Wrong('购买数量请输入数字!');
    $(obj)[0].focus();
    $(obj).val('0');
    return false;
  }
  var store = $('input[name=store]').val();
  if($('input[name=store]').length==1 && parseInt(store)<parseInt(number)){
    Wrong('库存不足!');
    return false;
  }
  if(number<min){
    Wrong('起购量为'+min);
    $(obj)[0].focus();
    $(obj).val('0');
    return false;
  }
  var all_money = $('.info_'+id).data('value');
  var bonus = $('.info_'+id).data('bonus');
  getprice(id,number,bonus,all_money);
}
function getprice(sid,number,bonus,all_money){
  var price = parseInt(number)*parseInt(all_money);
  $('#price').html(price);

  var zcprice = parseInt(bonus)*parseInt(number);
  $('#zcprice').html(zcprice);
  var dzhprice = parseInt(price)-parseInt(zcprice);
  $('#dzhprice').html(dzhprice);
  $('input[name="zhprice"]').val(dzhprice);
}
function get_price(){
  var checked = $('.table').find('input[type=checkbox]:checked');
  var price=0;
  checked.each(function(){
    price += parseInt($(this).parents('tr:.one_detail').find('._price_').html());
  });
  $("#price").html(price);
}
// function addtack(id){
//   if(id==null){
//     sinbox('关联爱真情账号信息',get_path_url('?mod=member&act=delivery&refun=restack'),430,350);
//   }else{
//     sinbox('更新爱真情账号信息',get_path_url('?mod=member&act=delivery&refun=retack&id='+id),430,350);  
//   }
// }
function restack(json){
  if(json==null) return false;  
  var div = '<dl id="remove_'+json.id+'" onClick="settake(\''+json.id+'\');">';
  div += '<dt><strong class="itemConsignee">'+json.name+'</strong> <span class="itemTel">'+json.mobile+'</span> </dt>';
  div += '<dd><p class="itemStreet">'+json.address+'</p>';
  div += '<span class="icon-common icon-common-del delete" onClick="listTable.memberRemove(\''+json.id+'\',\'确定要解除该账号信息关系?\');"></span>';
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
  div += '<span class="icon-common icon-common-del delete" onClick="listTable.memberRemove(\''+json.id+'\',\'确定要解除该账号信息关系?\');"></span>';
  div += '<span class="icon-common icon-common-edit" onClick="addtack(\''+json.id+'\');"></span>';  
  div += '</dd>';
  $("#remove_"+json.id).html(div);
  Close();
}