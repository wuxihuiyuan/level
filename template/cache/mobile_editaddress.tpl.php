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
    <script type="text/javascript" src="<?=$this->tempdir?>js/product.js" ></script>
</head>
<body>
<div class="pb80">
    <div class="tab-head">
        <span>
             <a href="javascript:history.back();">
            <i></i>
            </a>
        </span>
        地址管理
    </div>
    <form action="" method="POST" onsubmit="return checkform()">
    <input type="hidden" name="id" value="<?=$this->detail['id']?>">
    <div class="edit-addr">
        <h4>联系人</h4>
        <div class="addr-info">
            <div class="bor-bt rela">
                <span class="addr-info-title">姓名</span>
                <input type="text" value="<?=$this->detail['name']?>" name="name">
                <span class="clear">-</span>
            </div>
            <div class="rela">
                <span class="addr-info-title">手机</span>
                <input type="text" value="<?=$this->detail['mobile']?>" name="mobile">
                <span class="clear">-</span>
            </div>
        </div>
        <h4>联系地址</h4>
        <div class="addr-info">
            <div class="rela">
                <span class="addr-info-title">地址</span>
                <input type="text" value="<?=$this->detail['address']?>" name="address">
                <span class="clear">-</span>
            </div>
        </div>
        <h4>是否默认</h4>
        <div class="addr-info">
            <input type="radio" name="is_default" id="yes" value="1" <? if($this->detail['is_default'] == 1) { ?>checked="checked"<? } ?>/><label for="yes" style="margin-right: 10px;">是</label>
            <input type="radio" name="is_default" id="no" value="0" <? if($this->detail['is_default'] == 0) { ?>checked="checked"<? } ?> /><label for="no">否</label>
        </div>
    </div>
    <?=config::form('submit','确 定','submit','','class=\'edit-button\'');?>
    </form>
</div>
<? include template('mobile_footer','default/mobile'); ?>
</body>
</html>
