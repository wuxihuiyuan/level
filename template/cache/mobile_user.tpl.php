<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>用户中心</title>
    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/admin.js" ></script>
</head>
<body>
<? include template('mobile_header','default/mobile'); ?>
<div class="pb80">
    <div class="admin-cont">
        <div class="admin-head">
            <img src="../images/admin-head.png" alt="默认头像">
            <a href="<?=Purl('mobile_userdetail')?>"><?=$this->member['username']?></a>
        </div>
    </div>
    <div class="admin-list">
        <div class="admin-item" data-url="admin">
            <div class="item-ico ico-bg6">
                <i class="name-ico name6"></i>
            </div>
            <span>账户余额</span>
            <strong><?=$this->member['money']?></strong>
        </div>
        <div class="admin-item" data-url="admin">
            <div class="item-ico ico-bg9">
                <i class="name-ico name9"></i>
            </div>
            <span>当前积分</span>
            <strong><?=$this->member['good_point']?></strong>
        </div>
        <a href="<?=Purl('mobile_userdetail')?>">
        <div class="admin-item">
            <div class="item-ico ico-bg1">
                <i class="name-ico name1"></i>
            </div>
            <span>基本信息</span>
            <i class="after-item"></i>
        </div>
        </a>
        <a href="<?=Purl('mobile_address')?>">
        <div class="admin-item">
            <div class="item-ico ico-bg2">
                <i class="name-ico name2"></i>
            </div>
            <span>地址管理</span>
            <i class="after-item"></i>
        </div>
        </a>
        <a href="<?=Purl("?mod=mobile&act=newinfo&type=password"); ?>">
        <div class="admin-item">
            <div class="item-ico ico-bg3">
                <i class="name-ico name3"></i>
            </div>
            <span>修改密码</span>
            <i class="after-item"></i>
        </div>
        </a>
        <a href="<?=Purl(" ?mod=mobile&act=newinfo&type=emile"); ?>">
        <div class="admin-item" data-url="newinfo">
            <div class="item-ico ico-bg4">
                <i class="name-ico name4"></i>
            </div>
            <span>邮箱验证</span>
            <i class="after-item"></i>
        </div>
        </a>
        <a href="<?=Purl("?mod=mobile&act=newinfo&type=mobile"); ?>">
        <div class="admin-item" data-url="newinfo">
            <div class="item-ico ico-bg5">
                <i class="name-ico name5"></i>
            </div>
            <span>手机绑定</span>
            <i class="after-item"></i>
        </div>
        </a>
        <a href="<?=Purl('mobile_bankinfo')?>">
        <div class="admin-item" data-url="bankcard">
            <div class="item-ico ico-bg7">
                <i class="name-ico name7"></i>
            </div>
            <span>银行卡管理</span>
            <i class="after-item"></i>
        </div>
        </a>
        <div class="admin-item" data-url="help">
            <div class="item-ico ico-bg8">
                <i class="name-ico name8"></i>
            </div>
            <span>需要帮助</span>
            <i class="after-item"></i>
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

