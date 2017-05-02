<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('admin_header','admin'); if($_GET['get']=='goods') { if($_GET['re']=='list') { ?>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
  <thead>
    <tr>
      <th align="center">产品编号</th>
      <th align="center" style="padding-left:15px; text-align:left">产品名称</th>
      <th align="center">销售价格</th>
      <th align="center">代理价格</th>
      <th align="center">订货金比例</th>
      <th align="center">总销售量（代理-写自动脚本）</th>
      <th align="center">总销售量（会员）</th>
      <th align="center">是否上架</th>
      <th align="center">单位比例</th>
      <th align="center">操作</th>
    </tr>
  </thead>
  <? if(is_array($this->goodslist)) { foreach($this->goodslist as $value) { ?>  <tbody id="remove_<?=$value['goods_id']?>">
    <tr class="trhover">
      <td align="center"><?=$value['goods_id']?></td>
      <td align="left" style="padding-left:15px;"><?=$value['goods_name']?></td>
      <td align="center">￥<?=$value['mk_price']?></td>
      <td align="center">￥<?=$value['agent_price']?></td>
      <td align="center"><?=$value['ding_rate']?>%</td>
      <td align="center"><?=$value['sale']?></td>
      <td align="center"><?=$value['huiyuan_sale']?></td>
      <td align="center"><img onclick="listTable.toggle(this,'ischeck','<?=$value['goods_id']?>');" src="<?=$this->tempdir?>images/<?=usercheck($value['ischeck']); ?>" /></td>
      <td align="center"><?=$value['unit_rate']?>件/箱</td>
      <td align="center">
       <a href="<?=$value['editurl']?>"><img src="<?=$this->tempdir?>images/icon_edit.gif"/></a> 
       <?=config::form($value['goods_id'],'确认要删除该产品吗','remove');?>
      </td>
    </tr>
  </tbody>
  <? } } ?></table>
<div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='add'||$_GET['re']=='edit') { ?>
<script language="javascript">
var shoptitle = '<?=$this->shoptitle?>';
</script>
<div class="headbar clearfix">
  <ul class="tab" name="menu1">
    <li id="li_1" class="selected"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('1')">产品信息</a></li>
    <li id="li_2"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('2')">详细介绍</a></li>
    <li id="li_3"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('3')">产品相册</a></li>
    <li id="li_4"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('4')">代理价设置</a></li>
    <li id="li_5"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('5')">零售设置</a></li>
    <div style="clear:both;"></div>
  </ul>
</div>
<form method="post" name="shopform" id="shopform" action="" onsubmit="return shopcheckForm()" enctype="multipart/form-data">
  <div id="table_box_1">
    <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
      <tbody>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">产品名称</td>
          <td> <?=config::form('goods_name',$this->add['goods_name'],'input','','class=\'skey\'');?> </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">代理价格</td>
          <td> <?=config::form('agent_price',$this->add['agent_price'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元/件 </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">销售价格</td>
          <td> <?=config::form('mk_price',$this->add['mk_price'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元/件 </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">单位换算</td>
          <td> <?=config::form('unit_rate',$this->add['unit_rate'],'input','','class=\'skey\' style=\'width:80px;\'');?> 件/箱&nbsp;<span style="color: red;">(默认填1)</span> </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">积分</td>
          <td> <?=config::form('point',$this->add['point'],'input','','class=\'skey\' style=\'width:80px;\'');?> 个/箱&nbsp;<span style="color: red;"></span> </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">订货定金比例：</td>
          <td> <?=config::form('ding_rate',$this->add['ding_rate'],'input','','class=\'skey\' style=\'width:80px;\'');?> %&nbsp;<span style="color: red;"></span> </td>
        </tr>
        <!--      
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">销售价格</td>
          <td> <?=config::form('shop_price',$this->add['shop_price'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元 </td>
        </tr> 
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">奖励差额</td>
          <td> <?=config::form('margin',$this->add['margin'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元 </td>
        </tr>
        -->
      </tbody>
    </table>
  </div>
  <div id="table_box_2" style="display:none">
    <div style="padding:10px;"><?=config::form('goods_desc',$this->add['goods_desc'],'editor','0','<1@1>style=\'width:580px;height:340px;\'','goods');?></div>
  </div>
  <div id="table_box_3" style="display:none"> <br />
    <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
      <tr>
        <th style="background:none;border:0; text-align:right; width:120px;" align="right";>产品相册2：</th>
        <td style="background:none; border:0;"><input class="middle" name="" type="text" />
          <div class="upload_btn"><span id="upload"></span></div>
          <label><span id="upload_tip">该上传为批量上传，每张不超过2MB</span></label></td>
      </tr>
    </table>
    <div id="uploadPic">
      <ul id="uploadlist" style=" height:90px; overflow:hidden;">
        <? if(is_array($this->add['goods_thumb'])) { foreach($this->add['goods_thumb'] as $k=>$v) { ?>        <? $cover = $k==0 ? "封面1" : "&nbsp;"; ?>        <li>
          <div class="displayimg"><img src="<?=$v?>" /></div>
          <a class="previous" href="javascript:void(0);"></a><span class="front-cover"><?=$cover?></span><a class="next" href="javascript:void(0);"></a><a class="delete" href="javascript:void(0);"></a>
          <input type="hidden" name="thumb_list[]" id="thumb_list" value="<?=$v?>" class="thumb_list" />
        </li>
        <? } } ?>      </ul>
      <div style="clear:both;"></div>
    </div>
  </div>
  <div id="table_box_4" style="display:none">
    <table border="0" cellspacing="2" cellpadding=  "4" class="list" name="table" id="table" width="100%">
    <tbody>
      <? if(is_array($this->group)) { foreach($this->group as $key=>$value) { ?>      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
        <td class="center"><?=$value['groupname']?></td>
        <td>起购量： <input type="text" name="group[<?=$value['groupid']?>][minimum]" value="<?=$value['minimum']?>"/>箱</td>
        <td>招商返点： <input type="text" name="group[<?=$value['groupid']?>][rebate]" value="<?=$value['rebate']?>"/>元/箱</td>
        <td>提成： <input type="text" name="group[<?=$value['groupid']?>][bonus]" value="<?=$value['bonus']?>"/>元/箱</td>
        <td>分红： <input type="text" name="group[<?=$value['groupid']?>][share_money]" value="<?=$value['share_money']?>"/>元/箱</td>
      </tr>
      <? } } ?>      </tbody>
    </table>
  </div>
  <div id="table_box_5" style="display:none">
    <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
      <tbody>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">会员价：</td>
          <td><table border="0" cellspacing="0" cellpadding="0" width="100%" class="noborders">
              <tr>
                <td><table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <td class="tdcontent">
                        <ul id="hy_priceask">
                            <? if(is_array(json_decode($this->add['hy_price'],1))) { foreach(json_decode($this->add['hy_price'],1) as $key=>$value) { ?>                              <li><input type="text" name="hy_price[<?=key?>][price]" value="<?=$value['price']?>"/> 元/件&nbsp;&nbsp;&nbsp;
                              起购：<input type="text" name="hy_price[<?=key?>][minimum]" value="<?=$value['minimum']?>"/>件
                              <span onclick="$(this).parent().remove();">删除</span></li>
                            <? } } ?>                        </ul>
                      </td>
                      <td><input type="button" name="button" value="添加" onclick="addhy('hy_price');" class="button" /></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">团购价：</td>
          <td><table border="0" cellspacing="0" cellpadding="0" width="100%" class="noborders">
              <tr>
                <td><table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <td class="tdcontent">
                        <ul id="tg_priceask">
                            <? if(is_array(json_decode($this->add['tg_price'],1))) { foreach(json_decode($this->add['tg_price'],1) as $key=>$value) { ?>                              <li><input type="text" name="tg_price[<?=key?>][price]" value="<?=$value['price']?>"/> 元/件&nbsp;&nbsp;&nbsp;
                              起购：<input type="text" name="tg_price[<?=key?>][minimum]" value="<?=$value['minimum']?>"/>件
                              <span onclick="$(this).parent().remove();">删除</span></li>
                            <? } } ?>                          </ul>
                        </td>
                      <td><input type="button" name="button" value="添加" onclick="addtg('tg_price');" class="button" /></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <!--      
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">销售价格</td>
          <td> <?=config::form('shop_price',$this->add['shop_price'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元 </td>
        </tr> 
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">奖励差额</td>
          <td> <?=config::form('margin',$this->add['margin'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元 </td>
        </tr>
        -->
      </tbody>
    </table>
  </div>
  <?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<script type="text/javascript">
$(window).load(pageInit);
function pageInit(){
  var uploadurl='<?=Purl('tools_upload')?>',ext='<?=$this->ftype?>',size='<?=$this->fsize?>',count='<?=$this->fcount?>',useget=0,params={}//默认值
  ext = ext.match(/([^\(]+?)\s*\(\s*([^\)]+?)\s*\)/i);
  swfu = new SWFUpload({
    flash_url : "<?=config::get('sitepath')?>app/swfupload/swfupload.swf",
    prevent_swf_caching : false,//是否缓存SWF文件
    upload_url: uploadurl, //上传文件
    file_post_name : "imgFile",
    post_params:  {'mychatpath':'goods','imgcut':'1'},//随文件上传一同向上传接收程序提交的Post数据
    use_query_string : false,//是否用GET方式发送参数
    file_types : ext[2],//文件格式限制
    file_types_description : ext[1],//文件格式描述
    file_size_limit : size,	//文件大小限制
    file_queue_limit:0,//上传队列总数
    custom_settings : {
      test : "aaa"
    },
    file_queued_handler : fileQueued,//添加成功
    file_queue_error_handler : fileQueueError,//添加失败
    file_dialog_complete_handler : fileDialogComplete,
    upload_start_handler : uploadStart,//上传开始
    upload_progress_handler : uploadProgress,//上传进度
    upload_error_handler : uploadError,//上传失败
    upload_success_handler : uploadSuccess,//上传成功
    upload_complete_handler : uploadComplete,//上传结束
    button_placeholder_id : "upload",
    button_width: 50,
    button_height: 21,
    button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
    button_cursor: SWFUpload.CURSOR.HAND,
    button_text : '浏览1...',
    button_text_style: ".theFont { font-size: 12px; }",
    button_text_left_padding: 0,
    button_text_top_padding: 0,
    debug: false
  });
}
</script>
<? } ?>   
<? } if($_GET['get']=='order') { if($_GET['re']=='list') { ?>
<div class="headbar clearfix">
  <ul class="tab" name="menu1">
    <li<? if($_GET['checked']=='') { ?> class="selected"<? } ?>><a href="<?=Purl(adminpre()); ?>">全部记录</a></li>
    <li<? if($_GET['checked']=='3') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=shop&get=order&checked=9"); ?>" hidefocus="true">商家确认中</a></li>
    <li<? if($_GET['checked']=='3') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=shop&get=order&checked=10"); ?>" hidefocus="true">平台确认中</a></li>
    <li<? if($_GET['checked']=='1') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=shop&get=order&checked=1"); ?>" hidefocus="true">待发货</a></li>
    <li<? if($_GET['checked']=='5') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=shop&get=order&checked=5"); ?>" hidefocus="true">已发货</a></li>

    <div class="tabright">
      <form method="get" action="">
        <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
        <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
        <input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
        <input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
        <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
        订单号：
        <input type="text" name="orderid" id="orderid" value="<?=$_GET['orderid']?>" class='skey w120'/>
        时间段：<?=config::form('time',$this->t['str'],'datas');?>
        <input type="submit" id="button" value="立即搜索" class='button'>
      </form>
    </div>
    <div style="clear:both;"></div> 
  </ul>
</div>
<?=config::form('_express','','select',$this->express,'style=\'display:none\'');?><? if(is_array($this->order)) { foreach($this->order as $value) { $user = $this->user->sql($value['uid']);
    $delivery = unserialize($value['delivery']);
 ?><table width="100%" class="cart_table t_c">
  <thead>
    <tr>
      <th align="left" colspan="4" style="text-align:left; font-weight:normal;">&nbsp;&nbsp;订单编号:<?=$value['orderid']?> 会员：<?=$user['username']?> 时间：<?=formattime($value['addtime']); ?>  收货人会员账号：<?=$delivery['name']?> 收货地址：<?=$delivery['address']?> 联系电话：<?=$delivery['mobile']?></th>
    </tr>
  </thead>
  <tr bgcolor="#FFFFFF">
    <td width="50%" style="border-right:#CCC 1px solid;"><table width="100%" cellpadding="0" cellspacing="0">
        <tbody>

        <tr>
          <td style="padding-left:10px;line-height:18px;" width="30%" align="left"><?=$value['good_name']?></td>
          <td width="15%" align="center">产品单价<br />&yen;<?=$value['price']?></td>
           <td width="15%" align="center">支付比例<br /><?=$value['rate']?>%</td>
          <td width="15%" align="center">折扣价格<br />&yen;<?=$value['bonus']?></td>
          <td width="15%" align="center">订购数量<br /><?=$value['num']?></td>
          <td width="15%" align="center">产品小计<br />&yen;<?=$value['re_money']?></td>
        </tr>
      </table></td>
    <td width="20%" align="center" style="border-right:#CCC 1px solid;">产品总价：<b style="color:#F30;">&yen;<?=$value['re_money']?></b></td>
    <td width="20%" align="center" style="border-right:#CCC 1px solid;"><p>已上传凭证图片</p><a href="<?=$value['agent_img']?>" target="_blank"><img src="<?=$value['agent_img']?>" style="width:50px;" /></a><b style="color:#F30;"></b></td>
    <td width="10%">
      <? if($value['nosend']) { ?>
      库存不足，暂不可发货！
      <? } else { ?>
      <?=order_check_admin($value); ?>      <? } ?>  
      <p>
      <? if($value['checked']=='5') { ?>
        <?=$value['express']?>：<?=$value['expressnumber']?>
      <? } ?>    
      
      </p>      
    </td>
  </tr>
  </tbody>  
</table>
<br /><? } } ?><div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } } include template('admin_footer','admin'); ?>
