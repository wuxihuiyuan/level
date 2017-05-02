<? if (!defined('ROOT')) exit('Can\'t Access !'); if(is_array($this->mobile)) { include template('mobile_header','default/mobile'); ?>
<div id="main">
  <div class="left">
<? include template('mobile_left','default/mobile'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <script language="javascript">setTimeout("<?=$this->scode?>;",5000);</script>
      <div class="login_title">
        <h2>信息提醒</h2>
      </div>
      <div class="login_Content">
        <div class="login_Explain <?=$this->msgRight ? 'login_Explain_Right' : 'login_Explain_Wrong'; ?>">
          <h2><?=$this->message?></h2>
          <p>1.网页会自动跳转，如果在5秒钟后仍跳转，请点击<a href="<?=$this->jcode?>" class="blue">手动跳转</a></p>
          <p>2.如果你想返回到上一页继续操作，请点击<a href="javascript:history.back(-1)" class="blue">返回上一页</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<? include template('mobile_footer','default/mobile'); } else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?=config::get('sitename')?> - 信息提醒</title>
<meta name="keywords" content="<?=$this->keywords?>" />
<meta name="description" content="<?=$this->description?>" />
<? include template('../common','default/mobile'); ?>
<script language="javascript">setTimeout("<?=$this->scode?>;",5000);</script>
<link rel="stylesheet" href="<?=$this->tempdir?>css/login.css" type="text/css" />
</head>
<body>
<div class="loginheader"></div>
<div class="logincontent">
  <div class="login_Explain login_Explain_nologin">
    <h2><?=$this->message?></h2>
    <p>1.网页会自动跳转，如果在5秒钟后仍跳转，请点击 <a href="<?=$this->jcode?>" class="blue">手动跳转</a></p>
    <p>2.如果你想返回到上一页继续操作，请点击 <a href="javascript:history.back(-1)" class="blue">返回上一页</a> </p>
  </div>
</div>
<div class="loginfooter"></div>
<? include template('../footer','default/mobile'); ?>
</body>
</html>
<? } ?>
