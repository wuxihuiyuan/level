<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html style="background: white">
<head>
<title>订单详情</title>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
<? include template('../common','default/mobile'); ?>
    	<link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    	<link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    	<script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    	<script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    	<script type="text/javascript" src="<?=$this->tempdir?>js/order_details.js" ></script>
</head>
<body>
<div class="pb80">
<div class="tab-head">
<p>订单详情</p>
</div>
<div class="purchaser">
<div><i></i></div>
<h1>代理人：<span><?=$this->member['truename']?></span></h1>
<p class="pur_phone"><?=$this->member['userphone']?></p>
<p class="pur_lv">代理级别：<span><?=$this->member['groupname']?></span></p>
</div>
<div class="od_cont">
<h1><i></i>商品详情</h1>
<div class="odcont_cont">
<img src="<?=$this->goodspic?>" alt="" />
<h1><?=$this->order['good_name']?>
<span class="od_number"><?=$this->order['num']?></span>

</h1>
<p class="od_commission">抵扣提成:<span><?=$this->order['bonus']?></span></p>
<p class="od_total">折后总额<span><?=$this->order['re_money']?></span></p>
</div>
</div>
<div class="od_money">
<p class="od_pay">总付款</p>
<p class="pay_money">¥ <span><?=$this->order['money']?></span></p>
</div>
<div class="pay_account">
<p>付款账号：</p>	
<span><?=$this->bankInfo['bankcard']?></span>
</div>
<div class="pay_account">
<p>银行名称：</p>	
<span><?=$this->bankInfo['bankname']?></span>
</div>
<? if($this->order['checked'] == 0 || $this->order['checked'] == 9) { ?>
<form method="post" name="shopform" id="shopform" action="" onsubmit="return checkForm()" enctype="multipart/form-data">
<div class="goPay clearBoth">
<div class="upload">
点击上传凭证
<input type="file" name="upload" accept="image/gif,image/jpeg,image/jpg,image/png">
</div>
<p>请上传支付凭证</p>
<div class="uploadImg" style="display: none"><img src="" alt="" style="width: 100%"></div>
<div class="action clearBoth">
<?=config::form('button','确定付款','submit','','class=\'pay_btn\'');?>
<span class="clearPic">清除</span>
</div>
</div>
</form>
<? } else { ?>
<button class="pay_btn"><?=order_check_user($this->order); ?></button>
<? } ?>

</div>
<? include template('mobile_footer','default/mobile'); ?>
</body>
</html>

