<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('admin_header','admin'); if($_GET['get']=='control') { if($_GET['re']=='list') { ?>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
  <thead>
    <tr>
      <th align="center"><?=getorder("编号",$this->tempdir,'uid'); ?></th>
      <th align="center"><?=getorder("用户名",$this->tempdir,'username'); ?></th>
      <th align="center"><?=getorder("用户角色",$this->tempdir,'groupid'); ?></th>
      <th align="center"><?=getorder("登录次数",$this->tempdir,'loginnum'); ?></th>
      <th align="center">操作</th>
    </tr>
  </thead>
  <? if(is_array($this->managerlist)) { foreach($this->managerlist as $value) { ?>  <tbody id="remove_<?=$value['uid']?>">
    <tr class="s_out" onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td align="center"><?=$value['uid']?></td>
      <td align="center"><?=$value['username']?></td>
      <td align="center"><?=$value['group']['groupname']?></td>
      <td align="center"><?=$value['loginnum']?>次</td>
      <td align="center">
       <a href="<?=$value['editurl']?>"><img src="<?=$this->tempdir?>images/icon_edit.gif" title="编辑"/></a>
      <?=config::form($value['uid'],'确认要删除该用户吗','remove','remove');?>
      </td>
    </tr>
  </tbody>
  <? } } ?></table>
<div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<?=$_GET['page'] ? $_GET['page'] : 1 ; ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='add'||$_GET['re']=='edit') { ?>
<form method="post"  name="managerform" id="managerform" action="" onsubmit="return managercheckForm('<?=$this->formtitle?>')">
  <div>
    <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
      <tbody>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">用户账号</td>
          <td> <? if($_GET['re']=='add') { ?>
            <input type="text" name="username" id="username" style="width:150px;" value="" class="skey"/>
            <span class="tipser" id="usernametip">请输入要使用的用户名</span> <? } else { ?>
            <?=$this->add['username']?>
            <? } ?> </td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">用户角色</td>
          <td><?=config::form('groupid',$this->add['groupid'],'select',$this->usergrouplist);?></td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">登录密码</td>
          <td><input type="password" name="password" id="password" style="width:150px;" value="" class="skey" <? if($_GET['get']=='add') { ?>onblur="checkpassword()"<? } ?> />
            <span <? if($_GET['get']=='edit') { ?>class="tipser"<? } ?> id="passwordtip"><? if($_GET['get']=='edit') { ?>不修改密码，请留空<? } ?></span></td>
        </tr>
      </tbody>
    </table>
  </div>
  <?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<? } } if($_GET['get']=='group') { if($_GET['re']=='list') { ?>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
  <thead>
    <tr>
      <th align="center">编号</th>
      <th align="center">角色名称</th>
      <th align="center">操作</th>
    </tr>
  </thead>
  <? if(is_array($this->group)) { foreach($this->group as $value) { ?>  <tbody>
    <tr class="s_out" onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td align="center"><?=$value['groupid']?></td>
      <td align="center"><?=$value['groupname']?></td>
      <td align="center"><a href="<?=Purl("?mod=admin&act=manager&get=group&re=edit&groupid=".$value['groupid']); ?>"><img src="<?=$this->tempdir?>images/icon_edit.gif" title="编辑"/></a> <a href="javascript:delAlert('<?=Purl("?mod=admin&act=manager&get=group&id=".$value['groupid']); ?>');"> <img src="<?=$this->tempdir?>images/icon_drop.gif" title="删除" /></a></td>
    </tr>
  </tbody>
  <? } } ?></table>
<? } if($_GET['re']=='add'||$_GET['re']=='edit') { ?>
<form method="post"  name="groupfrom" id="groupfrom" action="" onsubmit="return groupcheckForm('<?=$this->formtitle?>','角色')">
  <div>
    <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
      <tbody>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">角色名称</td>
          <td><?=config::form('groupname',$this->add['groupname'],'input');?></td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">角色权限</td>
          <td class="purviews"><? if(is_array($this->right)) { foreach($this->right as $key=>$val) { ?>            <p style="font-weight:bolder; color:#F00;"><?=$key?>：</p>
            <?=config::form('purviews',$this->add['purviews'],'checkbox',formval($val));?>
            <div style="clear:both;"></div>
            <? } } ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="blank20"></div>
  <?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<? } } if($_GET['get']=='password') { if($_GET['re']=='index') { ?>
<form method="post" name="form1" action="">
  <div>
    <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
      <tbody>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">用户名</td>
          <td> <?=$this->manager['username']?></td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">原始密码</td>
          <td><input type="password" name="oldpassword" id="oldpassword" style="width:150px;" value="" class="skey"/></td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">新密码</td>
          <td><input type="password" name="password" id="password" style="width:150px;" value="" class="skey"/></td>
        </tr>
        <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
          <td class="left">确认密码</td>
          <td><input type="password" name="repassword" id="repassword" style="width:150px;" value="" class="skey"/></td>
        </tr>
      </tbody>
    </table>
  </div>
  <?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<? } } include template('admin_footer','admin'); ?>
