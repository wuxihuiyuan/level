<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>用户详细信息</title>
<link href="<?=$this->tempdir?>images/ajax.css" rel="stylesheet" type="text/css" />
<link href="<?=$this->appdir?>control/control.css" rel="stylesheet" type="text/css" /> <script type="text/javascript" src="<?=$this->appdir?>jquery-1.7.2.min.js" ></script> <script type="text/javascript" src="<?=$this->appdir?>sinbegin-public.js" ></script> <script type="text/javascript" src="<?=$this->tempdir?>images/ajax.js" ></script>
</head>

<body>
<? if($_GET['get']=='money') { ?>
<form id="subform" name="subform" method="post" enctype="multipart/form-data" action="" onsubmit="return moneyedit()">
<input type="hidden" value="<?=$_GET['uid']?>" name="uid" id="uid" />
<div class="bankbox" id="bankBox">
<div class="bankbox_bd">
<div class="form-line">
<div class="form-tit">当前会员：</div>
<div class="form-con select_wrap"><?=$this->profile['username']?></div>
</div>
<div class="form-line">
<div class="form-tit">变动原因：</div>
<div class="form-con">
<textarea name="content" cols="35" rows="4" class="text" id="content" style="height:50px;"></textarea>
</div>
</div>
<div class="form-line">
<div class="form-tit">账户现金：</div>
<div class="form-con">
<select name="add_money" id="add_money">
<option value="+" selected="selected">增加</option>
<option value="-">减少</option>
</select>
<input name="rank_money" type="text" id="rank_money" style="text-align:right" value="0" size="5" /> &nbsp;&nbsp;余：<?=$this->profile['money']?> 元 </div>
</div>
<div class="form-btn">
<a class="btn" href="javascript:moneyedit();" id="okSet"><i class="left"></i><span class="cont">确定</span><i class="right"></i></a> <?=config::stopoutenable(); ?> <span class="tips tipsmes" id="contenttip" style="float:right;"></span></div>
</div>
</div>
</form>
<? } if($_GET['get']=='getbank') { ?>
<div class="to-cash">
<table cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr>
<th width="100">
<div style="text-align:left;padding-left:21px;">银行名称</div>
</th>
<th width="100">
<div style="text-align:left;">开户户名</div>
</th>
<th width="160px">
<div style="text-align:left;">银行卡号</div>
</th>
<th width="120px">
<div style="text-align:left;">开户地址</div>
</th>
</tr>
</tbody>
<? if(!is_array($this->bank)) { ?>
<tbody id="hasSetBanks">
<tr id="noSetTr">
<td colspan="4" align="center" id='nobank'>该用户还没有设置用于提现的银行账户！</td>
</tr>
</tbody>
<? } ?>
<tbody><? if(is_array($this->bank)) { foreach($this->bank as $v) { ?><tr>
<td width="100" style="padding-left:20px;" id='nobank'><?=$v['bankname']?></td>
<td width="100"><?=$v['truename']?></td>
<td width="160px"><?=$v['bankcard']?></td>
<td width="120px"><?=$v['bankadd']?></td>
</tr><? } } ?></tbody>

</table>
</div>
<? } ?>
</body>

</html>
