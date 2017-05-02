<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>地址管理</title>
    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/address.js" ></script>
</head>
<body>
<div class="pb80">
    <div class="tab-head">
        <span>
           <a href="javascript:history.back();">
            <i></i>
            </a>
        </span>
        地址中心
        
        <div class="newaddr" >
        <a href="<?=Purl('mobile_editaddress')?>" style="color:white">
            <span>+</span>新增
        </a>
        </div>
        
    </div>
    <div class="address-box">
        <div class="head">
            <span>详细信息</span>
            <strong>管理</strong>
        </div>
        <? if(is_array($this->record)) { foreach($this->record as $value) { ?>        <div class="address-mobile">
            <h4>地址：<?=$value['address']?></h4>
            <p>收件人：<?=$value['name']?></p><span>电话：<?=$value['mobile']?></span>
            <? if($value['is_default'] == 1) { ?>
            <i>默认</i>
            <? } ?>
            <div class="edit">
                <a href="<?=Purl("?mod=mobile&act=editaddress&type=del&id=".$value['id']); ?>"><i class="edit-ico e1"></i></a>
                <a href="<?=Purl("?mod=mobile&act=editaddress&type=edit&id=".$value['id']); ?>"><i class="edit-ico e2"></i></a>
            </div>
        </div>
        <? } } ?>    </div>
</div>
<? include template('mobile_footer','default/mobile'); ?>
</body>
</html>
