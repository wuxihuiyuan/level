<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=config::get('sitename')?>会员平台</title>
<? include template('../common','default/member'); ?>
<link href="<?=$this->tempdir?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$this->tempdir?>js/member.js" ></script><script type="text/javascript" src="<?=$this->tempdir?>js/<?=$_GET['act']?>_<?=$_GET['type']?>.js" ></script><script type="text/javascript" src="<?=$this->appdir?>swfupload/swfupload.js" ></script><script type="text/javascript" src="<?=$this->appdir?>swfupload/multiupload.js" ></script>

</head>
<body>
<div id="top">
  <div class="topbox">
    <div class="logo"></div>
    <div class="welcome">
      <em class="el"></em>
      <span>您好，<strong><?=$this->member['username']?> (<?=$this->member['groupname']?>)</strong> <? if(!$this->member['status']) { ?><font color="#FF3300" buymoney="<?=$this->member['usergroup']['buymoney']?>" uid="<?=$this->member['uid']?>" style="color: red;">未开通，订货后自动开通！</font><? } ?> 账户余额：<strong class="text_red14px">&yen;<?=$this->member['money']?></strong></span>
      <em></em>
    </div>
    <div class="topnav">
      <? if(is_array($this->getabouttype(5))) { foreach($this->getabouttype(5) as $val) { ?>      <a href="<?=Purl('?mod=member&act=about&typeid='.$val['id']); ?>"><?=$val['typename']?></a>
      <? } } ?>      <a href="<?=Purl('?mod=member&act=imessage&method=send'); ?>">意见反馈</a> 
      <a href="<?=Purl('member_logout')?>">退出系统</a> </div>
  </div>
</div>

