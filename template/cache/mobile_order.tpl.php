<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>订单管理</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/sell.js" ></script>
  </head>
  <body>
  <div class="pb80">
    <div class="tab-head">
      我的卖出
    </div>
    <div class="sell-pur">
      <a href="purchase.html" class="backanother">
        返回我的购入
      </a>
    </div>
    <div class="tab-wrap clearBoth">
      <ul class="tab-title">
        <li class="tab-title-on">全部</li>
        <li>待付款</li>
        <li>待发货</li>
        <li>已成交</li>
      </ul>
    </div>
    <div class="tab-list-wrap">
      <div class="tab-list tab-list-on all">
      <? if(is_array($this->order)) { foreach($this->order as $value) { ?>        <a href="<?=Purl("?mod=mobile&act=orderDetail&id=".$value['id']); ?>" style="color: black">
        <div class="tab-item">
          <div class="ol_head">
            <p><?=$this->member['groupname']?><span><?=order_check_user($value); ?></span></p>
          </div>
          <div class="ol_detail">
            <img src="<?=$this->goodspic?>" />
            <h6><?=$value['good_name']?></h6>
            <p class="old_money"><span><?=$value['price']?></span></p>
            <p class="old_number"><span><?=$value['num']?></span></p>
          </div>
          <div class="ol_content clearBoth">
            <p>合计：<span>¥ </span><span><?=$value['money']?></span></p>
            <p>共 <span><?=$value['num']?></span> 箱</p>
          </div>
        </div>
        </a>
      <? } } ?>      </div>
      <div class="tab-list wait-pay">
      <? if(is_array($this->order)) { foreach($this->order as $value) { ?>        <? if($value['checked'] == 0) { ?>
        <a href="<?=Purl("?mod=mobile&act=orderDetail&id=".$value['id']); ?>" style="color: black">
        <div class="tab-item">
          <div class="ol_head">
            <p><?=$this->member['groupname']?><span><?=order_check_user($value); ?></span></p>
          </div>
          <div class="ol_detail">
            <img src="<?=$this->goodspic?>" />
            <h6><?=$value['good_name']?></h6>
            <p class="old_money"><span><?=$value['price']?></span></p>
            <p class="old_number"><span><?=$value['num']?></span></p>
          </div>
          <div class="ol_content clearBoth">
            <p>合计：<span>¥ </span><span><?=$value['money']?></span></p>
            <p>共 <span><?=$value['num']?></span> 箱</p>
          </div>
        </div>
        </a>
        <? } ?>
      <? } } ?>      </div>
      <div class="tab-list has-pay">
        <? if(is_array($this->order)) { foreach($this->order as $value) { ?>        <? if($value['checked'] == 1) { ?>
        <a href="<?=Purl("?mod=mobile&act=orderDetail&id=".$value['id']); ?>" style="color: black"> 
        <div class="tab-item">
          <div class="ol_head">
            <p><?=$this->member['groupname']?><span><?=order_check_user($value); ?></span></p>
          </div>
          <div class="ol_detail">
            <img src="<?=$this->goodspic?>" />
            <h6><?=$value['good_name']?></h6>
            <p class="old_money"><span><?=$value['price']?></span></p>
            <p class="old_number"><span><?=$value['num']?></span></p>
          </div>
          <div class="ol_content clearBoth">
            <p>合计：<span>¥ </span><span><?=$value['money']?></span></p>
            <p>共 <span><?=$value['num']?></span> 箱</p>
          </div>
        </div>
        </a>
        <? } ?>
      <? } } ?>      </div>
      <div class="tab-list finish">
        <? if(is_array($this->order)) { foreach($this->order as $value) { ?>        <? if($value['checked'] == 5) { ?>
        <a href="<?=Purl("?mod=mobile&act=orderDetail&id=".$value['id']); ?>" style="color: black">
        <div class="tab-item">
          <div class="ol_head">
            <p><?=$this->member['groupname']?><span><?=order_check_user($value); ?></span></p>
          </div>
          <div class="ol_detail">
            <img src="<?=$this->goodspic?>" />
            <h6><?=$value['good_name']?></h6>
            <p class="old_money"><span><?=$value['price']?></span></p>
            <p class="old_number"><span><?=$value['num']?></span></p>
          </div>
          <div class="ol_content clearBoth">
            <p>合计：<span>¥ </span><span><?=$value['money']?></span></p>
            <p>共 <span><?=$value['num']?></span> 箱</p>
          </div>
        </div>
        </a>
        <? } ?>
      <? } } ?>      </div>
    </div>
  </div>
   
<? include template('mobile_footer','default/mobile'); ?>
  </body>

</html>
