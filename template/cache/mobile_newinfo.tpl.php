<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>Title</title>
    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/newinfo.js" ></script>
</head>
<body>
<div class="pb80">
    <div class="tab-head">
        <span>
            <a href="javascript:history.back();">
            <i></i>
            </a>
        </span>
        <? if($this->record[type] == 'password') { ?>
        修改密码
        <? } elseif($this->record[type] == 'emile') { ?>
        邮箱验证
        <? } elseif($this->record[type] == 'mobile') { ?>
        手机绑定
        <? } ?>
    </div>
    <p class="newinfo-err">1</p>
    <? if($this->record[type] == 'password') { ?>
    <form action="" method="POST" onsubmit="return checkform()">
    <div class="change-info-pw">
        <div class="changebox">
            <input type="password" class="change-input" placeholder="原密码" maxlength="12" minlength="6" name="oldpassword" id="oldpw">
            <span class="clearchange">X</span>
        </div>  
        <div class="changebox">
            <input type="password" class="change-input" placeholder="新密码" maxlength="12" minlength="6" name="newpw" id="newpw">
            <span class="clearchange">X</span>
        </div>
        <div class="changebox">
            <input type="password" class="change-input" placeholder="确认密码" maxlength="12" minlength="6" name="checkpw" id="checkpw">
            <span class="clearchange">X</span>
        </div>
        <p>密码长度至少6位，最长12位</p>
    </div>
        <?=config::form('submit','确 定','submit','','class=\'newinfo-submit\'');?>
    </form>
    <? } ?>
    <? if($this->record[type] == 'emile') { ?>
    <div class="change-info-mail">
        <input type="email" class="change-input" placeholder="请输入邮箱" minlength="2" name="email" id="newemail">
        <input type="email" class="change-input" placeholder="请输入验证码" minlength="2" name="email" id="vl-email">
        <button class="change-send">发送</button>
    </div>
    <? } ?>
    <? if($this->record[type] == 'mobile') { ?>
    <div class="change-info-phone">
        <input type="email" class="change-input" placeholder="请输入手机号" minlength="2" name="email" id="newphone">
        <input type="email" class="change-input" placeholder="请输入验证码" minlength="2" name="email" id="vl-phone">
        <div class="change-send">发送</div>
    </div>
    <? } ?>
    
</div>
</body>
</html>
