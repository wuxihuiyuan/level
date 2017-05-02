$(function(){//表单
  $('#confirmstore').click(function(event) {
    var id = $(this).data('value');
    showhandle({
      html: '<table class="lotab"><tr><th><label>支付密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width: 320,
      height: 140,
      id: 'cancelorder',
      title: '确认收款'
    }, function() {
      $("#controlLoad").show();
      removetip("cancelorder");
      $.getJSON(get_url('act=confirmstore&type=user&repass='+$("#repass").val()+'&id='+id), function(res) {
        $("#controlLoad").hide();
        if(res.error == '0') {
          hidebox('cancelorder', true);
          location.reload();
        } else {
          addtip("cancelorder", res.error);
        }
      });
    });
  });   
}); 
