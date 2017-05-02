<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html style="background: white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>收入详情</title>
    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/income.js" ></script>
</head>
<body>
<div class="pb80">
    <div class="tab-head">
    <input id="hd_referrer" type="hidden" />
      <span>
      	<a href="javascript:history.back();">
        	<i></i>
    	</a>
      </span>
        收入详情
    </div>
    <div class="income-row">
        <div class="income-row-child">
            <div class="row-tod to">
                <span class="in-income">今日收入</span>
                <p class="num"><span class="rmb">¥</span><?=$this->todaymoney['margin']?></p>
                <div class="income-more"></div>
                <div class="more">查看更多</div>
            </div>
            <ul class="more-slide">
                <li><span>提成奖:</span><?=$this->todaymoney['money']?><b>¥</b></li>
                <li><span>分红奖:</span><?=$this->todaymoney['floormoney']?><b>¥</b></li>
                <li><span>招商奖:</span><?=$this->todaymoney['refereemoney']?><b>¥</b></li>
                <li><span>提现金:</span><?=$this->todaymoney['outmoney']?><b>¥</b></li>
                <li style="border: none"><span>合计:</span><?=$this->todaymoney['margin']?><b>¥</b></li>
            </ul>
        </div>
        <div class="income-row-child">
            <div class="row-yest ye">
                <span class="in-income">昨日收入</span>
                <p class="num"><span class="rmb">¥</span><?=$this->yestodaymoney['margin']?></p>
                <div class="income-more"></div>
                <div class="more">查看更多</div>
            </div>
            <ul class="more-slide">
                <li><span>提成奖:</span><?=$this->yestodaymoney['money']?><b>¥</b></li>
                <li><span>分红奖:</span><?=$this->yestodaymoney['floormoney']?><b>¥</b></li>
                <li><span>招商奖:</span><?=$this->yestodaymoney['refereemoney']?><b>¥</b></li>
                <li><span>提现金:</span><?=$this->yestodaymoney['outmoney']?><b>¥</b></li>
                <li style="border: none"><span>合计:</span><?=$this->yestodaymoney['margin']?><b>¥</b></li>
            </ul>
        </div>
        <div class="income-row-child">
            <div class="row-all all">
                <span class="in-income">全部收入</span>
                <p class="num"><span class="rmb">¥</span><?=$this->allmoney['margin']?></p>
                <div class="income-more"></div>
                <div class="more">查看更多</div>
            </div>
            <ul class="more-slide">
                <li><span>提成奖:</span><?=$this->allmoney['money']?><b>¥</b></li>
                <li><span>分红奖:</span><?=$this->allmoney['floormoney']?><b>¥</b></li>
                <li><span>招商奖:</span><?=$this->allmoney['refereemoney']?><b>¥</b></li>
                <li><span>提现金:</span><?=$this->allmoney['outmoney']?><b>¥</b></li>
                <li style="border: none"><span>合计:</span><?=$this->allmoney['margin']?><b>¥</b></li>
            </ul>
        </div>
    </div>
</div>
<? include template('mobile_footer','default/mobile'); ?>
</body>

</html>
