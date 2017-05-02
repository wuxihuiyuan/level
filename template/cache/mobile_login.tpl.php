<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>

<!DOCTYPE html>
<html style="background: white">
  <head>
    <title>登录</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
     
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/login.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
  </head>

  <body>
      <div class="login">
        <div class="log_head">
          <span></span>
        </div>
        <p class="login_title">账号登录</p>
        <form name="postform" method="post" id="postform" enctype="multipart/form-data" onsubmit="return checkform()">
        <ul class="log_input">
          <li>
            <input id="username" name="username" onblur="checkusername();" type="text" type="text" placeholder="用户名/电子邮箱/绑定手机" />
          </li>
          <li>
            <input id="password" name="password" type="password" onblur="checkpassword();" type="password" placeholder="请输入密码" />
          </li>
        </ul>
        <div class="log_but">
            <button type="button" class="log-login"><?=config::form('submit','马上登录','submit','','class=\'osLoginIptBtn\'');?></button>
        </div> 
        <div class="login_forget">
          <a href="<?=Purl('mobile_forgotpassword')?>" class="log_forget">忘记密码</a>
        </div>
        </form>
      </div>
  </body>
</html>
