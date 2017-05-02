<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>首页</title>

    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/index.js" ></script>
</head>
<body>
<? include template('mobile_header','default/mobile'); ?>
<div class="pb80">
    <div class="banner clearBoth">
        <div class="banner-wrap clearBoth">
        <? if(is_array($this->agentgoods['goods_thumb'])) { foreach($this->agentgoods['goods_thumb'] as $value) { ?>            <a href="<?=$this->agentgoods['detailurl']?>"  class="banner-img img1">
                <img src="<?=$value?>">
            </a>
        <? } } ?>    
        </div>
    </div>
    <div class="bs">
        <div class="bs-ico">
            <i></i>
        </div>
        <span>最新</span>
        <div class="bs-cont">
        <? if(is_array($this->record)) { foreach($this->record as $value) { ?>            <a href="<?=$value['url']?>" class="bs-on"><?=$value['title']?></a>
        <? } } ?>        </div>
    </div>
    <div class="pro-show clearBoth">
        <a href="<?=$this->agentgoods['detailurl']?>" >
            <div class="pro-adv">
                <h3>&nbsp;</h3>
                <p><?=$this->agentgoods['goods_name']?></p>
                <p>&nbsp;</p>
            </div>
            <img src="<?=$this->agentgoods['picurl']?>" class="pro-img">
        </a>
        <div class="">
            <img src="<?=$this->agentgoods['picurl']?>" class="pro-img">
            <div class="pro-adv">
                <h3>KANGTELI</h3>
                <p>克特瑞</p>
                <p>积分商城</p>
            </div>
        </div>
    </div>
    <div class="income clearBoth">
        <h4 class="card-title">总收入 <a href="<?=Purl('mobile_incomedetail')?>" class="right-more">更多</a></h4>
        <ul class="inc-con">
            <li class="inc-bg1">
                <i class="inc-ico inc1"></i>
                <p>提成奖励</p>
                <span><?=$this->allmoney['money']?>元</span>
            </li>
            <li class="inc-bg2">
                <i class="inc-ico inc2"></i>
                <p>分红奖励</p>
                <span><?=$this->allmoney['floormoney']?>元</span>
            </li>
            <li class="inc-bg3">
                <i class="inc-ico inc3"></i>
                <p>招商奖励</p>
                <span><?=$this->allmoney['refereemoney']?>元</span>
            </li>
            <li class="inc-bg4">
                <i class="inc-ico inc4"></i>
                <p>合计奖励</p>
                <span><?=$this->allmoney['margin']?>元</span>
            </li>
        </ul>
    </div>
    <div class="sell-policy clearBoth">
        <div class="policy-cont">
            <h2>全国分享租赁政策</h2>
            <p>一级分享师</p>
            <p>阖家康团租价</p>
            <p>体验会员价</p>
            <p>全国线上线下统一零售价</p>
        </div>
        <div class="policy-cont">
            <h2>分享推广政策</h2>
            <p>城市总管</p>
            <p>大区总管</p>
            <p>项目合伙人</p>
            <p>项目股东</p>
        </div>
        <div class="policy-cont">
            <h2>推广分享奖励政策</h2>
            <p>城市总管</p>
            <p>大区总管</p>
            <p>项目合伙人</p>
            <p>项目股东</p>
        </div>
        <div class="policy-cont">
            <h2>市场分享推广奖励政策</h2>
            <p>积分奖励</p>
            <p>特殊贡献奖</p>
        </div>
    </div>
</div>
<? include template('mobile_footer','default/mobile'); ?>
</body>
</html>
