<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('admin_header','admin'); if($_GET['get']=='money') { if($_GET['re']=='list') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre()); ?>">综合统计</a>
</li>
<li <? if($_GET[ 'type']=='1' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre().'&type=1'); ?>">现金币记录</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 会员名：
<input type="text" name="username" id="username" value="<?=$_GET['username']?>" class='skey w120' /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<? if($_GET['type']) { ?>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th align="center">记录编号</th>
<th align="center">记录说明</th>
<th align="center">金额</th>
<th align="center">余额</th>
<th align="center">会员</th>
<th align="center">时间</th>
</tr>
</thead>
<? if(!is_array($this->record)) { ?>
<tbody>
<tr class="trhover">
<td align="center" colspan="7">暂无数据</td>
</tr>
</tbody>
<? } if(is_array($this->record)) { foreach($this->record as $value) { ?><tbody>
<tr class="trhover">
<td align="center"><?=$value['id']?></td>
<td align="center"><?=$value['content']?></td>
<td align="center"><span class="red"><?=$value['lognum']?></span></td>
<td align="center"><span class="red"><?=$value['balance']?></span></td>
<td align="center"><?=$this->mysql->value($this->pre."user","username","uid=".$value['uid']); ?></td>
<td align="center"><?=formattime($value['addtime']); ?></td>
</tr>
</tbody><? } } ?></table>
<? } else { ?>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th align="center">记录编号</th>
<th align="center">记录说明</th>
<th align="center">现金币</th>
<th align="center">税金</th>
<th align="center">合计</th>
<th align="center">会员</th>
<th align="center">时间</th>
</tr>
</thead>
<? if(!is_array($this->record)) { ?>
<tbody>
<tr class="trhover">
<td align="center" colspan="7">暂无数据</td>
</tr>
</tbody>
<? } if(is_array($this->record)) { foreach($this->record as $value) { ?><tbody>
<tr class="trhover">
<td align="center"><?=$value['id']?></td>
<td align="center"><?=$value['content']?></td>
<td align="center"><span class="red"><?=$value['1']['lognum'] ? $value['1']['lognum'] : "0.00"; ?></span></td>
<td align="center"><span class="red"><?=$value['3']['lognum'] ? formatnum($value['3']['lognum'],2) : "0.00"; ?></span></td>
<td align="center"><span class="red"><?=formatnum($value['1']['lognum']+$value['2']['lognum']+$value['3']['lognum']+$value['4']['lognum']); ?></span></td>
<td align="center"><?=$this->mysql->value($this->pre."user","username","uid=".$value['uid']); ?></td>
<td align="center"><?=formattime($value['addtime'],'Y-m-d H:i:s'); ?></td>
</tr>
</tbody><? } } ?></table>
<? } ?>
<div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='chart') { ?>
<div class="headbar clearfix">
<ul class="tab">
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<div id="index_diagram">
<div id="chartspie" style="width:49%;float:left;"></div>
<div id="chartscolumn" style="width:49%;float:left;"></div>
</div>
<script language="javascript">
$(function() {
chart('chartscolumn', "column", ['综合统计'], [{name: '收入', data: [{<?=$this->allmoney['buymoney']?> }] }, {name: '支出', data: [{<?=$this->allmoney['outmoney']?> }] }, {name: '利润', data: [{ echo <?=$this?> - > allmoney[buymoney] - <?=$this?> - > allmoney[outmoney]; }] }]);
chart('chartspie', "pie", ['综合统计'], [
['分红奖励', {<?=$this->allmoney['floormoney']?> }],
['直荐奖励', {<?=$this->allmoney['refereemoney']?> }],
['股东奖励', {<?=$this->allmoney['money']?> }],
['报单奖励', {<?=$this->allmoney['regmoney']?> }]
]);
});
</script>
<? } if($_GET['re']=='outchart') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()); ?>">曲线走势图</a>
</li>
<li <? if($_GET[ 'type']=='1' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()).'&type=1'; ?>">柱状走势图</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<div id="index_pool">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<th align="center">直荐奖励</th>
<th align="center">分红奖励</th>
<th align="center">股东奖励</th>
<th align="center">报单奖励</th>
<th align="center">合计</th>
</tr>
<tr>
<td align="center"><span class="red">&yen;<?=$this->allmoney['refereemoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['floormoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['money']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['regmoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['outmoney']?></span></td>
</tr>
</table>
</div>
<br />
<div id="container"></div>
<script language="javascript">
$(function() {
chart('container', "<?=$_GET['type']=='1' ? 'column' : 'line'; ?>", [<?=$this->categories?>], [{name: '分红奖励', data: [<?=$this->floormoney?>] }, {name: '直荐奖励', data: [<?=$this->refereemoney?>] }, {name: '股东奖励', data: [<?=$this->money?>] }, {name: '报单奖励', data: [<?=$this->regmoney?>] }]);
});
</script>
<? } if($_GET['re']=='inchart') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()); ?>">曲线走势图</a>
</li>
<li <? if($_GET[ 'type']=='1' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()).'&type=1'; ?>">柱状走势图</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<div id="index_pool">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<th align="center">直荐奖励</th>
<th align="center">分红奖励</th>
<th align="center">股东奖励</th>
<th align="center">报单奖励</th>
<th align="center">营业总额</th>
<th align="center">拨出总额</th>
<th align="center">利润总额</th>
</tr>
<tr>
<td align="center"><span class="red">&yen;<?=$this->allmoney['refereemoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['floormoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['money']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['regmoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['buymoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['outmoney']?></span></td>
<td align="center"><span class="red">&yen;<?=formatnum($this->allmoney['buymoney']-$this->allmoney['outmoney']); ?></span></td>
</tr>
</table>
</div>
<br />
<div id="container"></div>
<script language="javascript">
$(function() {
chart('container', "<?=$_GET['type']=='1' ? 'column' : 'line'; ?>", [<?=$this->categories?>], [{ ame: '拨出奖金', data: [<?=$this->outmoney?>] }, {name: '业绩收入', data: [<?=$this->buymoney?>] }]);
});
</script>
<? } } if($_GET['get']=='atmlog') { if($_GET['re']=='list') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre()); ?>">全部记录</a>
</li>
<li <? if($_GET[ 'type']=='1' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre().'&type=1'); ?>">暂未汇款</a>
</li>
<li <? if($_GET[ 'type']=='2' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre().'&type=2'); ?>">已经汇款</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 会员账号：
<input type="text" name="username" id="username" value="<?=$_GET['username']?>" class='skey w120' /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<form method="post" name="atmpost" id="atmpost" action="" onsubmit="return atmsubmit();">
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th width="60px"><input type="checkbox" id="chkall" name="chkall" onclick="checkall(this.form, 'id')"></th>
<th align="center">序号</th>
<th align="center">提现金额</th>
<th align="center">实付金额</th>
<th align="center">申请会员</th>
<th align="center">收款信息</th>
<th align="center">申请时间</th>
<th align="center">操作</th>
</tr>
</thead><? if(is_array($this->atmlog)) { foreach($this->atmlog as $value) { $user = $this->mysql->select_one("select * from ".$this->pre."user where uid=".$value['uid']); ?><tbody>
<tr class="trhover">
<td align="center"><input type="checkbox" name="id[]" value="<?=$value['id']?>"></td>
<td align="center"><?=$value['id']?></td>
<td align="center"><span class="red"><?=formatnum($value['lognum']); ?>元</span></td>
<td align="center"><span class="red"><?=formatnum($value['lognum']-($value['lognum']*(float)config::get("atmscale")/100)); ?>元</span></td>
<td align="left" style="padding-left:10px;">用户：<?=$user['username']?><br /> 电话：<?=$user['userphone']?>
</td>
<td align="left" style="padding-left:10px;"> 开户名：<?=$value['truename']?><br /> 开户行：<?=$value['bankname']?>
<br /> 银行卡号：<?=$value['bankcard']?> </td>
<td align="center"><?=formattime($value['addtime']); ?></td>
<td align="center" width="100">
<? if($value['checked']) { ?> 已经付款 <? } else { ?>
<a href="javascript:listTable._toggle('atmed_<?=$value['id']?>','checked','<?=$value['id']?>','确认付款');" id="atmed_<?=$value['id']?>" value="<?=$value['checked']?>">确认付款</a>
<? } ?>
</td>
</tr>
</tbody><? } } ?></table>
<div class="blank20"></div>
<?=config::form('button','批量确认付款','submit','','class=\'button\'');?>
</form>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='chart') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()); ?>">曲线走势图</a>
</li>
<li <? if($_GET[ 'type']=='1' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()).'&type=1'; ?>">柱状走势图</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<div id="index_pool">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<th align="center">已经汇款</th>
<th align="center">暂未汇款</th>
<th align="center">全部提现</th>
</tr>
<tr>
<td align="center"><span class="red">&yen;<?=$this->allmoney['atmmoneyed']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['atmmoneyno']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['atmmoney']?></span></td>
</tr>
</table>
</div>
<br />
<div id="container"></div>
<script language="javascript">
$(function() {
chart('container', "<?=$_GET['type']=='1' ? 'column' : 'line'; ?>", [<?=$this->categories?>], [ {name: '已经汇款', data: [<?=$this->atmmoneyed?>] } , {name: '暂未汇款', data: [<?=$this->atmmoneyno?>]}, {name: '全部提现', data: [<?=$this->atmmoney?>] } ]);
});
</script>
<? } } if($_GET['get']=='payorder') { if($_GET['re']=='list') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre()); ?>">全部记录</a>
</li>
<li <? if($_GET[ 'type']=='1' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre().'&type=1'); ?>">暂未支付</a>
</li>
<li <? if($_GET[ 'type']=='2' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre().'&type=2'); ?>">支付成功</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 会员账号：
<input type="text" name="username" id="username" value="<?=$_GET['username']?>" class='skey w120' /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th align="center">序号</th>
<th align="center">流水号</th>
<th align="center">充值金额</th>
<th align="center">充值方式</th>
<th align="center">目前状态</th>
<th align="center">充值会员</th>
<th align="center">充值时间</th>
</tr>
</thead><? if(is_array($this->paylog)) { foreach($this->paylog as $value) { ?><tbody>
<tr class="trhover">
<td align="center"><?=$value['id']?></td>
<td align="center"><?=$value['orderid']?></td>
<td align="center"><span class="red"><?=$value['total_fee']?>元</span></td>
<td align="center"><?=$value['paytype']?></td>
<td align="center" value="<?=$value['checked']?>" id="paylog_<?=$value['id']?>"><?=paycheck($value['checked'],$value['orderid'],$value['id']); ?> <? if($value['checked']=='0') { ?> (
<a href="javascript:listTable._toggle('paylog_<?=$value['id']?>','checked','<?=$value['id']?>','确认款项已支付到你的账户');">确认已收</a>) <? } ?> </td>
<td align="left" style="padding-left:10px;"><?=$this->mysql->value($this->pre."user","username","uid=".$value['uid']); ?></td>
<td align="center"><? echo formattime($value['addtime']) ?></td>
</tr>
</tbody><? } } ?></table>
<div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='chart') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()); ?>">曲线走势图</a>
</li>
<li <? if($_GET[ 'type']=='1' ) { ?>class="selected" <? } ?>>
<a href="<?=preg_replace('#&type=(\d+)#','',geturl()).'&type=1'; ?>">柱状走势图</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 时间段：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<div id="index_pool">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<th align="center">人工充值</th>
<th align="center">在线支付</th>
<th align="center">合计充值</th>
</tr>
<tr>
<td align="center"><span class="red">&yen;<?=$this->allmoney['_paymoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['paymoney']?></span></td>
<td align="center"><span class="red">&yen;<?=$this->allmoney['allpaymoney']?></span></td>
</tr>
</table>
</div>
<br />
<div id="container"></div>
<script language="javascript">
$(function() {
chart('container', "<?=$_GET['type']=='1' ? 'column' : 'line'; ?>", [<?=$this->categories?>], [{name: '人工充值', data: [<?=$this->_paymoney?>] }, {name: '在线充值', data: [{ self paymoney }] }, {name: '合计充值', data: [{<?=$this->allpaymoney?> }] }]);
});
</script>
<? } } include template('admin_footer','admin'); ?>
