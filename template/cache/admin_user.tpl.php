<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('admin_header','admin'); if($_GET['get']=='control') { if($_GET['re']=='list') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'groupid']=='' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre()); ?>">全部会员</a>
</li><? if(is_array($this->getusergoup())) { foreach($this->getusergoup() as $value) { $class = $_GET['groupid']==$value['groupid'] ? 'class="selected"' : '' ?><li <?=$class?>>
<a href="<?=Purl(adminpre().'&groupid='.$value['groupid']); ?>"><?=$value['groupname']?></a>
</li><? } } ?><div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 会员账号：
<input type="text" name="username" id="username" value="<?=$_GET['username']?>" class='skey w120' /> 注册时间：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<table border="0" cellspacing="2" cellpadding="4" class="list userlist" id="table" width="100%">
<thead>
<tr>
<th align="left" style="text-align:left;padding-left:10px;">会员信息</th>
<th align="left" style="text-align:left;padding-left:10px;">市场信息</th>
<th align="left" style="text-align:left;padding-left:10px;">账户资金</th>
<th align="left" style="text-align:left;padding-left:10px;">联系信息</th>
<th align="center">开通情况</th>
<th align="left" style="text-align:left;padding-left:10px;">其他信息</th>
<th align="center">操作</th>
</tr>
</thead><? if(is_array($this->userlist)) { foreach($this->userlist as $value) { ?><tbody id="remove_<?=$value['uid']?>">
<tr class="trhover">
<td align="left">
<p><em>会员编号：</em><?=$value['uid']?></p>
<p><em>会员账号：</em>
<a href="<?=Purl(" ?mod=admin&act=user&loginuid=".$value['uid']); ?>" target="_blank"><?=$value['username']?></a>
</p>
<p><em>会员级别：</em><?=$value['usergroup']['groupname']?></p>
<p><em>库存：</em><?=$value['store']?></p>
<p><em>销量：</em><?=$value['sales_num']?></p>
</td>
<td align="left">
<p><em>推荐会员：</em><?=$value['referee'] ? $value['referee'] : '顶层'; ?></p>
<p><em>会员点数：</em><?=$value['point']?></p>
<p><em>直推人数：</em><?=$value['renumber']?></p>
</td>
<td align="left" class="rmb">
<p><em>分红：</em><?=$value['share_money']?></p>
<p><em>返点：</em><?=$value['rebate']?></p>
<p><em>总奖金：</em><?=$value['bonus']?></p>
</td>
<td align="left">
<p><em>电子邮箱：</em><? if($value['echeck']=='1') { ?><i class="email" title="已验证"></i><? } ?><?=$value['email']?></p>
<p><em>手机号码：</em><? if($value['mcheck']=='1') { ?><i class="phone" title="已验证"></i><? } ?><?=$value['userphone']?></p>
<p><em>会员姓名：</em><?=$value['truename']?></p>
</td>
<td align="left" class="checkstatus" id="checkstatus_<?=$value['uid']?>">
<? if($value['status']) { ?>
<p><em>开通时间：</em></p>
<p style="padding-left:5px;"><em></em><?=formattime($value['opentime']); ?></p>
<? } else { ?>
<p align="center">
<a href="javascript:listTable.status($('#checkstatus_<?=$value['uid']?>'),'<?=$value['uid']?>','1');">开通会员</a>
</p>
<p align="center">
<a href="javascript:listTable.remove('<?=$value['uid']?>','确定要删除该会员吗？');">删除会员</a>
</p>
<? } ?>
</td>
<td align="left">
<p><em>注册时间：</em><?=formattime($value['regtime']); ?></p>
<p><em>最后登录：</em><?=formattime($value['lasttime']); ?></p>
<p><em>可否登录：</em><img onclick="listTable.toggle(this,'canlogin','<?=$value['uid']?>');" src="<?=$this->tempdir?>images/<?=usercheck($value['canlogin']); ?>" /></p>
</td>
<td align="center" style="padding:0;">
&nbsp;&nbsp;&nbsp;
<a href="javascript:getbank(<?=$value['uid']?>);"><img src="<?=$this->tempdir?>images/icon_bank.gif" title="提现银行" /></a>
&nbsp;&nbsp;&nbsp;
</td>
</tr>
</tbody><? } } ?></table>
<div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<?=$_GET['page'] ? $_GET['page'] : 1 ; ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='treeform') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if($_GET[ 'type']=='arrange' ) { ?>class="selected" <? } ?>>
<a href="<?=Purl(adminpre()); ?>">会员结构</a>
</li>
<div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" /> 会员账号：
<input type="text" name="username" id="username" value="<?=$_GET['username']?>" class='skey w120' />
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<? if($_GET['type']=='arrange') { ?>
<table width="100%" align="left" cellpadding="0" cellspacing="0" id="treeform">
<tr>
<td>
<table width="980" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto;">
<!--第一层-->
<tr>
<td colspan="3" align="center">
<table class="t_info" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3">
<? if($this->getmember['username']==$this->tree['username']) { ?>
<a href="javascript:;"><?=$this->tree['username']?></a>
<? } else { ?>
<a href="<?=Purl(" ?mod=admin&act=user&get=control&re=treeform&username=".$this->tree['_referee']); ?>"><?=$this->tree['username']?></a>
<? } ?>
</th>
</tr>
<tr>
<td colspan="3"><?=$this->tree['uid']?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['groupname']?></td>
</tr>
<tr>
<td colspan="3"><?=formattime($this->tree['regtime'],"Y-m-d"); ?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['status'] ? '已审核' : '<span uid="'.$this->tree['uid'].'" class="_span">待审核</span>'; ?></td>
</tr>
<tr>
<td width="33%"><?=$this->tree['left']?></td>
<td width="33%"><?=$this->tree['centre']?></td>
<td width="33%"><?=$this->tree['right']?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="3" align="center"><img src="<?=$this->tempdir?>images/line_1.gif" /></td>
</tr>
<!--第一层-->
<!--第二层-->
<tr>
<td align="center">
<? if(is_array($this->tree['l'])) { ?>
<table class="t_info" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3">
<a href="<?=Purl(" ?mod=admin&act=user&get=control&re=treeform&uid=".$this->tree['l']['uid']); ?>"><?=$this->tree['l']['username']?></a>
</th>
</tr>
<tr>
<td colspan="3"><?=$this->tree['l']['uid']?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['l']['groupname']?></td>
</tr>
<tr>
<td colspan="3"><?=formattime($this->tree['l']['regtime'],"Y-m-d"); ?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['l']['status'] ? '已审核' : '<span uid="'.$this->tree['l']['uid'].'" class="_span">待审核</span>'; ?></td>
</tr>
<tr>
<td width="33%"><?=$this->tree['l']['left']?></td>
<td width="33%"><?=$this->tree['l']['centre']?></td>
<td width="33%"><?=$this->tree['l']['right']?></td>
</tr>
</table>
<? } else { ?>
<table class="t_info" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3">
<a href="<?=Purl('?mod=admin&act=user&get=control&re=add&position=left&uid='.$this->tree['uid']); ?>">未注册</a>
</th>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td width="33%">&nbsp;</td>
<td width="33%">&nbsp;</td>
<td width="33%">&nbsp;</td>
</tr>
</table>
<? } ?>
</td>
<td align="center">
<? if(is_array($this->tree['c'])) { ?>
<table class="t_info" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3">
<a href="<?=Purl(" ?mod=admin&act=user&get=control&re=treeform&uid=".$this->tree['c']['uid']); ?>"><?=$this->tree['c']['username']?></a>
</th>
</tr>
<tr>
<td colspan="3"><?=$this->tree['c']['uid']?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['c']['groupname']?></td>
</tr>
<tr>
<td colspan="3"><?=formattime($this->tree['c']['regtime'],"Y-m-d"); ?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['c']['status'] ? '已审核' : '<span uid="'.$this->tree['c']['uid'].'" class="_span">待审核</span>'; ?></td>
</tr>
<tr>
<td width="33%"><?=$this->tree['c']['left']?></td>
<td width="33%"><?=$this->tree['c']['centre']?></td>
<td width="33%"><?=$this->tree['c']['right']?></td>
</tr>
</table>
<? } else { ?>
<table class="t_info" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3">
<a href="<?=Purl('?mod=admin&act=user&get=control&re=add&position=centre&uid='.$this->tree['uid']); ?>">未注册</a>
</th>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td width="33%">&nbsp;</td>
<td width="33%">&nbsp;</td>
<td width="33%">&nbsp;</td>
</tr>
</table>
<? } ?>
</td>
<td align="center">
<? if(is_array($this->tree['r'])) { ?>
<table class="t_info" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3">
<a href="<?=Purl(" ?mod=admin&act=user&get=control&re=treeform&uid=".$this->tree['r']['uid']); ?>"><?=$this->tree['r']['username']?></a>
</th>
</tr>
<tr>
<td colspan="3"><?=$this->tree['r']['uid']?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['r']['groupname']?></td>
</tr>
<tr>
<td colspan="3"><?=formattime($this->tree['r']['regtime'],"Y-m-d"); ?></td>
</tr>
<tr>
<td colspan="3"><?=$this->tree['r']['status'] ? '已审核' : '<span uid="'.$this->tree['r']['uid'].'" class="_span">待审核</span>'; ?></td>
</tr>
<tr>
<td width="33%"><?=$this->tree['r']['left']?></td>
<td width="33%"><?=$this->tree['r']['centre']?></td>
<td width="33%"><?=$this->tree['r']['right']?></td>
</tr>
</table>
<? } else { ?>
<table class="t_info" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3">
<a href="<?=Purl('?mod=admin&act=user&get=control&re=add&position=right&uid='.$this->tree['uid']); ?>">未注册</a>
</th>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td width="33%">&nbsp;</td>
<td width="33%">&nbsp;</td>
<td width="33%">&nbsp;</td>
</tr>
</table>
<? } ?>
</td>
</tr>
<!--第二层-->
</table>
</td>
</tr>
</table>
<? } } if($_GET['re']=='add') { ?>

<form id="ajaxformbox" name="ajaxformbox" method="post" onsubmit="return inmember();">
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<tbody>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">会员账号</td>
<td><input type="text" name="username" id="username" value="" class="skey skey1" onblur="checkusername()" />
<span class="tips" id="usernametip"></span></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">会员级别</td>
<td><?=config::form('groupid',$this->add['groupid'],'select',$this->usergrouplist,'style=\'width:162px\' onchange=\'checkgroupid()\'');?><span class="tips" id="groupidtip"></span></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">会员姓名</td>
<td><input type="text" name="truename" id="truename" value="" class="skey skey1" onblur="checktruename()" />
<span class="tips" id="truenametip"></span></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">身份证号</td>
<td><input type="text" name="idcard" id="idcard" value="" class="skey skey1" onblur="checkidcard()" />
<span class="tips" id="idcardtip"></span></td>
</tr>

<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">联系地址</td>
<td><input type="text" name="address" id="address" value="" class="skey skey1" />
<span class="tips" id="addresstip"></span></td>
</tr>

<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">手机号码</td>
<td><input type="text" name="userphone" id="userphone" value="" class="skey skey1" />
<span class="tips" id="userphonetip"></span></td>
</tr>

<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">开户银行</td>
<td><?=config::form('bankname','','select',formatform(config::get('bankname'),'请选择银行卡开户银行',','),'onchange=\'checkbankname()\'');?>
<span class="tips" id="banknametip"></span></td>
</tr>

<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">开户地址</td>
<td><input type="text" name="bankadd" id="bankadd" value="" class="skey skey1" />
<span class="tips" id="bankaddtip"></span></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">账号</td>
<td><input type="text" name="bankcard" id="bankcard" value="" class="skey skey1" onblur="checkbankcard()" />
<span class="tips" id="bankcardtip"></span></td>
</tr>
<? if($this->getmember) { ?>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">会员上线</td>
<td><input type="text" value="<?=$this->_referee['username']?>" class="skey skey1" id='_referee' name="_referee" />
<span class="tips" id="_refereetip"></span></td>
</tr>
<? } ?>

<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">登录密码</td>
<td><input type="password" name="password" id="password" value="" class="skey skey1" onblur="checkpassword()" />
<span class="tips" id="passwordtip"></span></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">支付密码</td>
<td><input type="password" name="repass" id="repass" value="" class="skey skey1" onblur="checkrepass()" />
<span class="tips" id="repasstip"></span></td>
</tr>

<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">开通状态</td>
<td>  <?=config::form('nowopen','','select','[<><请选择...>][<1><现在立马开通会员>][<0><先提交稍后开通>]','style=\'width:162px\' onchange=\'checknowopen()\'');?> <span class="tips" id="nowopentip"></span></td>
</tr>

</tbody>
</table>
<?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<? } if($_GET['re']=='password') { ?>
<form method="post" name="passwordfrom" id="passwordfrom" action="" onsubmit="return passwordcheckForm()">
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<tbody>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">会员账号</td>
<td><input type="text" name="username" style="width:150px;" id="username" value="<?=$_POST['username']?>" size="40" class="skey" onfocus='addClass("usernametip","tipser","请输入会员账号");' />
<span class="tipser" id="usernametip">请输入要重置密码的会员账号</span></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">登录密码</td>
<td><input type="password" name="password" id="password" value="<?=$_POST['password']?>" class="skey" style="width:150px;" onfocus='addClass("passwordtip","tipser","登录密码，不修改请留空");' />
<span class="tipser" id="passwordtip">登录密码，不修改请留空</span></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">二级密码</td>
<td><input type="password" name="repass" id="repass" value="<?=$_POST['repass']?>" class="skey" style="width:150px;" onfocus='addClass("repasstip","tipser","二级密码，不修改请留空");' />
<span class="tipser" id="repasstip">二级密码，不修改请留空</span></td>
</tr>
</tbody>
</table>
<div class="blank20"></div>
<?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<script language="javascript">
var post = '<?=$this->repost?>';
var usernametip = '<?=$this->usernametip?>';
var passwordtip = '<?=$this->passwordtip?>';
var repasstip = '<?=$this->repasstip?>';
if(post == 1) {
if(usernametip != '') {
addClass("usernametip", "tipsno", usernametip);
} else {
addClass("usernametip", "tipsyes", "&nbsp;");
}
if(passwordtip != '') {
addClass("passwordtip", "tipsno", passwordtip);
} else {
addClass("passwordtip", "tipsyes", "&nbsp;");
}
if(repasstip != '') {
addClass("repasstip", "tipsno", repasstip);
} else {
addClass("repasstip", "tipsyes", "&nbsp;");
}
}
</script>
<? } ?>
<script language="javascript">
function getbank(uid) {
Iframe({
Title: '会员提现银行',
Url: '<?=Purl("?mod=admin&act=profile&get=getbank"); ?>&uid=' + uid,
Width: 420,
Height: 245,
scrolling: 'no',
isShowIframeTitle: true
});
}
</script>
<? } if($_GET['get']=='group') { if($_GET['re']=='list') { ?>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th align="center">编号</th>
<th align="center">级别名称</th>
<th align="center">级别筹码</th>
<th align="center">积分商城折扣</th>
<th align="center">总部发货</th>
<th align="center">操作</th>
</tr>
</thead><? if(is_array($this->group)) { foreach($this->group as $value) { ?><tbody>
<tr class="trhover">
<td align="center"><?=$value['sort']?></td>
<td align="center"><?=$value['groupname']?></td>
<td align="center"><?=$value['point']?></td>
<td align="center"><?=$value['rebate']?>%</td>
<td align="center"><? if($value['is_agents'] == 1) { ?>是<? } else { ?>否<? } ?></td>
<td align="center">
<a href="<?=Purl(" ?mod=admin&act=user&get=group&re=edit&groupid=".$value['groupid']); ?>"><img src="<?=$this->tempdir?>images/icon_edit.gif" title="编辑" /></a>
</td>
</tr>
</tbody><? } } ?></table>
<? } if($_GET['re']=='add'||$_GET['re']=='edit') { ?>
<form method="post" name="groupfrom" id="groupfrom" action="" onsubmit="return groupcheckForm('<?=$this->formtitle?>','级别')">
<div>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<tbody>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">级别名称</td>
<td><?=config::form('groupname',$this->add['groupname'],'input');?></td>
</tr>
<!--
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">进单价格</td>
            <td><input type="text" name="buymoney" id="buymoney" value="<?=$this->add['buymoney']?>" />
              元</td>
          </tr>
         
          
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">直荐奖励</td>
            <td><input type="text" name="refereemoney" id="refereemoney" value="<?=$this->add['refereemoney']?>" /></td>
          </tr>
          
          
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">分红奖励</td>
            <td><input type="text" name="floormoney" id="floormoney" value="<?=$this->add['floormoney']?>" style='width:280px;'/></td>
          </tr>
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">奖励要求</td>
            <td><table border="0" cellspacing="0" cellpadding="0" width="100%" class="noborders">
                <tr>
                  <td><table border="0" cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td class="tdcontent"><ul id="floorask">
                            <? if(is_array(unserialize($this->add['floorask']))) { foreach(unserialize($this->add['floorask']) as $key=>$value) { ?>                            <li>推荐
                              <input type="text" name="floorn[]" value="<?=$key?>"/>
                              人可拿
                              <input type="text" name="floorf[]" value="<?=$value?>"/>
                              层 <span onclick="$(this).parent().remove();">删除</span></li>
                            <? } } ?>                          </ul></td>
                        <td><input type="button" name="button" value="添加一个要求" onclick="addask('floor');" class="button" /></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
          
          
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">报单奖励</td>
            <td><input type="text" name="regmoney" id="regmoney" value="<?=$this->add['regmoney']?>"/></td>
          </tr>
          
           <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">股东奖励</td>
            <td><input type="text" name="money" id="money" value="<?=$this->add['money']?>"/></td>
          </tr>
          
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">升级提成</td>
            <td><input type="text" name="uprefereemoney" id="uprefereemoney" value="<?=$this->add['uprefereemoney']?>" /></td>
          </tr>
          
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td class="left">奖金税费</td>
            <td><input type="text" name="atmscale" id="atmscale" value="<?=$this->add['atmscale']?>"/></td>
          </tr>
          -->
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">级别筹码</td>
<td><input type="text" name="point" id="point" value="<?=$this->add['point']?>" /></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">销货数量</td>
<td><input type="text" name="sales_num" id="sales_num" value="<?=$this->add['sales_num']?>" /></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">积分商城折扣</td>
<td><input type="text" name="rebate" id="rebate" value="<?=$this->add['rebate']?>" />%</td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">级别</td>
<td><input type="text" name="sort" id="sort" value="<?=$this->add['sort']?>" /></td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">总部发货</td>
<td>
是：<input type="radio" name="is_agents" id="buy_way" <? if($this->add[is_agents] == "1") { ?> checked <? } ?> value="1"/>&nbsp;&nbsp; 否：
<input type="radio" name="is_agents" id="buy_way" <? if($this->add[is_agents]== 0) { ?> checked<? } ?> value="0"/>
</td>
</tr>
<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
<td class="left">级别权限</td>
<td class="purviews" height="50"><? if(is_array($this->right)) { foreach($this->right as $key=>$val) { ?><p style="font-weight:bolder; color:#F00;"><?=$key?>：</p>
<?=config::form('purviews',$this->add['purviews'],'checkbox',formval($val));?>
<div style="clear:both;"></div><? } } ?>全选：<input type="checkbox" id="all">
</td>
</tr>
</tbody>
</table>
</div>
<div class="blank20"></div>
<?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<? } } if($_GET['get']=='customs') { if($_GET['re']=='list') { ?>
<table border="0" cellspacing="1" cellpadding="1" width="100%">
<tbody>
<tr bgcolor="#ffffff">
<td class="left" width="20">&nbsp;</td>
<td>
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="admin" />
<input type="hidden" name="act" id="act" value="user" />
<input type="hidden" name="get" id="get" value="customs" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" /> 用户名：
<input type="text" name="username" id="username" value="<?=$_GET['username']?>" class='skey' style='width:200px;' /> 申请时间：<?=config::form('time',$this->time_str,'datas','');?>
<input type="submit" name="button" id="button" value="马上检索" class='button'>
</form>
</td>
</tr>
</tbody>
</table>
<br />
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th align="center">序号</th>
<th align="center">会员账号</th>
<th align="center">报单中心名称</th>
<th align="center">报单中心地址</th>
<th align="center">目前状态</th>
<th align="center">申请时间</th>
</tr>
</thead><? if(is_array($this->customs)) { foreach($this->customs as $value) { ?><tbody>
<tr class="trhover">
<td align="center"><?=$value['id']?></td>
<td align="center"><?=$this->mysql->value($this->pre."user","username","uid=".$value['uid']); ?></td>
<td align="center"><?=$value['name']?></td>
<td align="center"><?=$value['address']?></td>
<td align="center"><img onclick="listTable.toggle(this,'checked','<?=$value['uid']?>');return false;" style="cursor:pointer;" src="<?=$this->tempdir?>images/<?=usercheck($value['checked']); ?>" /></td>
<td align="center"><? echo formattime($value['addtime']) ?></td>
</tr>
</tbody><? } } ?></table>
<div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } } include template('admin_footer','admin'); ?>
