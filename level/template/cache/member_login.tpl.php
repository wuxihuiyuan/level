<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?=config::get('sitename')?> - 用户登陆</title>
<meta name="keywords" content="<?=$this->keywords?>" />
<meta name="description" content="<?=$this->description?>" />
<? include template('../common','default/member'); ?>
<link rel="stylesheet" href="<?=$this->tempdir?>css/login.css" type="text/css" />
<script type="text/javascript" src="<?=$this->tempdir?>js/login.js" ></script>
</head>
<body>
<div class="loginheader"></div>
<div class="logincontent">
  <div class="loginlogo"></div>
  <form name="postform" method="post" id="postform" enctype="multipart/form-data" onsubmit="return checkform()">
    <table class="lotab">
      <tr>
        <th><label for="username">登陆账号</label></th>
        <td><input id="username" class="myinput" onblur="checkusername();" type="text" name="username" placeholder="用户名/电子邮箱/绑定手机" value="" /></td>
      </tr>
      <tr>
        <th><label for="password">登陆密码</label></th>
        <td><input id="password" class="myinput" type="password" name="password" value="" onblur="checkpassword();" style="color:rgb(169, 169, 169);"/></td>
      </tr>
      <tr>
        <th></th>
        <td><?=config::form('submit','马上登录','submit','','class=\'osLoginIptBtn\'');?> <a href="<?=Purl('member_forgotpassword')?>">忘记密码？</a>
        </td>
      </tr>
    </table>
  </form>
  <span class="osLoginError" id="usernametip"></span>
  <span class="osLoginError" id="passwordtip"></span>
</div>
<div class="loginfooter"></div>
<? include template('../footer','default/member'); ?>
</body>
</html>

