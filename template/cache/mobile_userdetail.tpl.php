<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>基本信息</title>
    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/admin-detail.js" ></script>
</head>
<body>
<div class="pb80">
    <div class="tab-head">
        <span>
           <a href="javascript:history.back();">
            <i></i>
            </a>
        </span>
        个人中心
    </div>
    <div class="info-box clearBoth">
        <div class="info">
            <div class="info-list">
                <span class="info-star">*</span>
                <span class="info-title">会员账号</span>
            </div>
            <div class="text"><?=$this->member['username']?>
                <!--<i></i>-->
            </div>
        </div>
        <div class="info">
            <div class="info-list">
                <span class="info-star">*</span>
                <span class="info-title">电子邮箱</span>
            </div>
            <div class="text"><?=$this->member['email']?>
                <!--<i></i>-->
            </div>
        </div>
        <div class="info">
            <div class="info-list">
                <span class="info-star">*</span>
                <span class="info-title">手机号码</span>
            </div>
            <div class="text"><?=$this->member['userphone']?>
                <!--<i></i>-->
            </div>
        </div>
        <div class="info">
            <div class="info-list">
                <span class="info-star">*</span>
                <span class="info-title">会员姓名</span>
            </div>
            <div class="text"><?=$this->member['truename']?>
                <!--<i></i>-->
            </div>
        </div>
        <div class="info">
            <div class="info-list">
                <span class="info-star">*</span>
                <span class="info-title">身份证号码</span>
            </div>
            <div class="text"><?=$this->member['idcard']?>
                <!--<i></i>-->
            </div>
        </div>
        <div class="info">
            <div class="info-list">
                <span class="info-star">*</span>
                <span class="info-title">联系QQ</span>
            </div>
            <div class="text"><?=$this->member['qq']?>
                <!--<i></i>-->
            </div>
        </div>
    </div>
    <a href="<?=Purl('mobile_logout')?>">
    <div class="logout">
        退&nbsp;出&nbsp;登&nbsp;录
    </div>
    </a>
</div>
<? include template('mobile_footer','default/mobile'); ?>
</body>
</html>
