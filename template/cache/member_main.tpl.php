<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
<div class="left">
<? include template('member_left','default/member'); ?>
</div>
<div class="right">
<div id="system_info">
<div id="message_ico"></div>
<a href="javascript:;">一个互帮互助的爱心平台，竭力让大家共同成长，事业婚姻两不误！</a>爱之情婚恋交友网地址：
<a href="http://www.izhenqing.com" target="_blank">wwww.izhenqing.com</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a>有问题请咨询客服QQ 250502000&nbsp;&nbsp;&nbsp;&nbsp;</a> <img src="<?=$this->tempdir?>images/new.gif" width="35" height="13" alt="new" /></div>
<div id="index_pool">
<div class="index_title">
<div class="title_l">收入数据</div>
<div class="title_r">&nbsp;</div>
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="main_line">
<tr>
<th></th>
<th>提成奖</th>
<th>分红奖</th>
<th>招商奖</th>
<th>合计</th>
</tr>
<tr>
<th>今日</th>
<td><?=$this->todaymoney['money']?>元</td>
<td><?=$this->todaymoney['floormoney']?>元</td>
<td><?=$this->todaymoney['refereemoney']?>元</td>
<td><span class="text_red14px"><?=$this->todaymoney['margin']?></span>元</td>
</tr>
<tr>
<th class="td_line bt_line">昨天</th>
<td><?=$this->yestodaymoney['money']?>元</td>
<td><?=$this->yestodaymoney['floormoney']?>元</td>
<td><?=$this->yestodaymoney['refereemoney']?>元</td>
<td><span class="text_red14px"><?=$this->yestodaymoney['margin']?></span>元</td>
</tr>
<tr>
<th>全部</th>
<td><?=$this->allmoney['money']?>元</td>
<td><?=$this->allmoney['floormoney']?>元</td>
<td><?=$this->allmoney['refereemoney']?>元</td>
<td><span class="text_red14px"><?=$this->allmoney['margin']?></span>元</td>
</tr>
</table>
</div>
<div id="index_diagram">
<div id="chartspie" style="width:49%;float:left;"></div>
<div id="chartscolumn" style="width:49%;float:left;"></div>
</div>
<script language="javascript">
$(function() {
$(function() {
chart('chartscolumn',"column",['综合统计'],[{name:'奖励',data:[<?=$this->allmoney['inmoney']?>]},{name:'提现',data:[<?=$this->allmoney['outmoney']?>]},{name:'余额',data: [<?=$this->allmoney['margin']?>]}]);
chart('chartspie',"pie",['综合统计'],[['分红奖励',<?=$this->allmoney['floormoney']?>],['招商奖励',<?=$this->allmoney['refereemoney']?>], ['提成奖励',<?=$this->allmoney['money']?>]]);
});
});
</script>
</div>
</div>
<? include template('member_footer','default/member'); ?>
