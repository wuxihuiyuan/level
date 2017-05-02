<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理登录 - Powered by <?=config::get('sitename')?></title>
<link rel="stylesheet" href="<?=$this->tempdir?>images/login.css" type="text/css" />
<script type="text/javascript" src="<?=$this->appdir?>jquery.js" ></script><script type="text/javascript" src="<?=$this->appdir?>function.js" ></script>
</head>
<body>
<div id='top'>
  <div class="logo"></div>
</div>
<div id='con'>
  <div class="login">
    <form name="loginform" method="post" action="">
      <p> <? if(is_array($this->member)) { ?>
        当前用户：<?=$this->member['username']?> (<a href="<?=Purl('member_logout')?>">退出</a>)<?=config::form('username',$this->member['username'],'hidden','','');?>
        <? } else { ?> <span>用户名：<?=config::form('username','','input','','class=\'input\'');?></span> <? } ?> </p>
      <p><br />
        <span>密&nbsp;&nbsp;&nbsp;&nbsp;码：<?=config::form('password','','password','','class=\'input\'');?></span></p>
      <p><br />
        <span  class="code">验证码：<?=config::form('seccode','','input','','size=\'8\' class=\'seccode\'');?> </span><?=config::seccode(); ?></p>
      <p><br />
        <?=config::form('submit',' 登 陆 ','submit','','class=\'sublogin\'');?></p>
    </form>
  </div>
  <div class="foot"> </div>
</div>
</body>
</html>
