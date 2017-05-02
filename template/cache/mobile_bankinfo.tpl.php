<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>银行卡管理</title>

    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/bankcard.js" ></script>
</head>
<body>
<div class="pb80">
    <div class="tab-head">
        <span>
            <i></i>
        </span>
        我的银行卡
    </div>
    <div class="card-list">

    <? if(is_array($this->record)) { foreach($this->record as $value) { ?>        <div class="card-item bg1">
            <i class="card-name name1"></i>
            <div class="card-type">
                <p><?=$value['bankname']?></p>
                <p>什么类型</p>
            </div>
            <div style="clear: both;"></div>
            <p class="card-num"><?=$value['bankcard']?></p>
        </div>
    <? } } ?>    
        
    </div>
</div>
   
<? include template('mobile_footer','default/mobile'); ?>
</body>
</html>
