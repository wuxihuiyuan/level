<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('admin_header','admin'); if($_GET['get']=='category') { ?>
  <? if($_GET['re']=='list') { ?>
  <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
    <thead>
      <tr>
        <th align="center">编号</th>
        <th align="center">分类名称</th>
        <th align="center">时间</th>
        <th align="center">操作</th>
      </tr>
    </thead>
    <? if(is_array($this->category)) { foreach($this->category as $value) { ?>    <tbody>
      <tr class="trhover">
        <td align="center"><?=$value['sort']?></td>
        <td align="center"><?=$value['name']?></td>
        <td align="center"><?=$value['addtime']?></td>
        <td align="center"><a href="<?=Purl("?mod=admin&act=jfshop&get=category&re=edit&id=".$value['id']); ?>"><img src="<?=$this->tempdir?>images/icon_edit.gif" title="编辑"/></a></td>
      </tr>
    </tbody>
    <? } } ?>  </table>
  <? } ?>
  <? if($_GET['re']=='add'||$_GET['re']=='edit') { ?>
  <form method="post"  name="groupfrom" id="groupfrom" action="" onsubmit="return groupcheckForm('<?=$this->formtitle?>','级别')">
    <div>
      <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
        <tbody>
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">分类名称</td>
            <td><?=config::form('name',$this->add['name'],'input');?></td>
          </tr>
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">排序</td>
            <td><input type="text" name="sort" id="sort" value="<?=$this->add['sort']?>" /></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="blank20"></div>
    <?=config::form('button','提交','submit','','class=\'button\'');?>
  </form>
  <? } } if($_GET['get']=='goods') { if($_GET['re']=='list') { ?>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
  <thead>
    <tr>
      <th align="center">产品编号</th>
      <th align="left" style="padding-left:15px; text-align:left">产品名称</th>
      <th align="center">所属分类</th>
      <th align="center">销售价格</th>
      <th align="center">所需积分</th>
      <th align="center">奖励差额</th>
      <th align="center">剩余库存</th>
      <th align="center">总销售量</th>

      <th align="center">是否上架</th>
      <th align="center">操作</th>
    </tr>
  </thead>
  <? if(is_array($this->goodslist)) { foreach($this->goodslist as $value) { ?>  <tbody id="remove_<?=$value['goods_id']?>">
    <tr class="trhover">
      <td align="center"><?=$value['goods_id']?></td>
      <td align="left" style="padding-left:15px;"><?=$value['goods_name']?></td>
            <td align="center"><?=$value['catname']?></td>
      <td align="center">￥<?=$value['shop_price']?></td>
      <td align="center"><?=$value['shop_price']*$value['point_rate']; ?></td>
      <td align="center">￥<?=$value['margin']?></td>
      <td align="center"><?=$value['stock']?></td>
      <td align="center"><?=$value['sale']?></td>
      <td align="center"><img onclick="listTable.toggle(this,'ischeck','<?=$value['goods_id']?>');" src="<?=$this->tempdir?>images/<?=usercheck($value['ischeck']); ?>" /></td>
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
          <td class="left">商品分类</td>
          <td><?=config::form('catid',$this->add['catid'],'select',$this->usercatlist,'style=\'width:162px\' onchange=\'checkcatid()\'');?><span class="tips" id="catidtip"></span></td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">销售价格</td>
          <td> <?=config::form('shop_price',$this->add['shop_price'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元 </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">奖励差额</td>
          <td> <?=config::form('margin',$this->add['margin'],'input','','class=\'skey\' style=\'width:80px;\'');?> 元 </td>
        </tr>

        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">剩余库存</td>
          <td> <?=config::form('stock',$this->add['stock'],'input','','class=\'skey\' style=\'width:80px;\'');?> </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">积分兑换比例</td>
          <td> <?=config::form('point_rate',$this->add['point_rate'],'input','','class=\'skey\' style=\'width:80px;\'');?>(积分/元) </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="table_box_2" style="display:none">
    <div style="padding:10px;"><?=config::form('goods_desc',$this->add['goods_desc'],'editor','0','<1@1>style=\'width:580px;height:340px;\'','goods');?></div>
  </div>
  <div id="table_box_3" style="display:none"> <br />
    <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
      <tr>
        <th style="background:none;border:0; text-align:right; width:120px;" align="right";>产品相册：</th>
        <td style="background:none; border:0;"><input class="middle" name="" type="text" />
          <div class="upload_btn"><span id="upload"></span></div>
          <label><span id="upload_tip">该上传为批量上传，每张不超过2MB</span></label></td>
      </tr>
    </table>
    <div id="uploadPic">
      <ul id="uploadlist" style=" height:90px; overflow:hidden;">
        <? if(is_array($this->add['goods_thumb'])) { foreach($this->add['goods_thumb'] as $k=>$v) { ?>        <? $cover = $k==0 ? "封面" : "&nbsp;"; ?>        <li>
          <div class="displayimg"><img src="<?=$v?>" /></div>
          <a class="previous" href="javascript:void(0);"></a><span class="front-cover"><?=$cover?></span><a class="next" href="javascript:void(0);"></a><a class="delete" href="javascript:void(0);"></a>
          <input type="hidden" name="thumb_list[]" id="thumb_list" value="<?=$v?>" class="thumb_list" />
        </li>
        <? } } ?>      </ul>
      <div style="clear:both;"></div>
    </div>
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
    button_text : '浏览...',
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
    <li<? if($_GET['checked']=='1') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=jfshop&get=order&checked=1"); ?>" hidefocus="true">待发货</a></li>
    <li<? if($_GET['checked']=='5') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=jfshop&get=order&checked=5"); ?>" hidefocus="true">已发货</a></li>
    <li<? if($_GET['checked']=='3') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=jfshop&get=order&checked=3"); ?>" hidefocus="true">退款中</a></li>
    <li<? if($_GET['checked']=='4') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=jfshop&get=order&checked=4"); ?>" hidefocus="true">已退款</a></li>
    <li<? if($_GET['checked']=='2') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=jfshop&get=order&checked=2"); ?>" hidefocus="true">已成交</a></li>
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
      <th align="left" colspan="3" style="text-align:left; font-weight:normal;">&nbsp;&nbsp;订单编号:<?=$value['orderid']?> 会员：<?=$user['username']?> 时间：<?=formattime($value['addtime']); ?>  收货人：<?=$delivery['name']?> 收件地址：<?=$delivery['address']?> 联系电话：<?=$delivery['mobile']?></th>
    </tr>
  </thead>
  <tr bgcolor="#FFFFFF">
    <td width="50%" style="border-right:#CCC 1px solid;"><table width="100%" cellpadding="0" cellspacing="0">
        <tbody>
        <? $goods = unserialize($value['goods']); ?>        <? if(is_array($goods)) { foreach($goods as $val) { ?>        <tr>
          <td style="padding-left:10px;line-height:18px;" width="40%" align="left"><?=$val['goods_name']?></td>
          <td width="15%" align="center">产品单价<br /><?=$val['shop_price']*$val['point_rate']; ?></td>
          <td width="15%" align="center">订单积分<br /><?=$val['price']?></td>
          <td width="15%" align="center">订购数量<br /><?=$val['number']?></td>
          <td width="15%" align="center">积分小计<br /><?=$value['price']?></td>
        </tr>
        <? } } ?>      </table></td>
    <td width="20%" align="center" style="border-right:#CCC 1px solid;">消费积分：<b style="color:#F30;"><?=$value['price']?></b></td>
    <td width="30%">
      <?=order_checkjf_admin($value); ?>      <p>
      <? if($value['checked']=='5') { ?>
        <?=$value['express']?>：<?=$value['expressnumber']?>
      <? } ?>    
      <? if($value['checked']=='3') { ?>
        <?=$value['message']?>
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
