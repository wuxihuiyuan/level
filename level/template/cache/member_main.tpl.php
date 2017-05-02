<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main" >
  <div class="left">
<? include template('member_left','default/member'); ?>
</div>
  <div class="right">
    <div id="system_info">
      <div id="message_ico"></div>
     <a href="javascript:;">一个互帮互助的爱心平台，竭力让大家共同成长，事业婚姻两不误！</a>爱之情婚恋交友网地址：<a href="http://www.izhenqing.com" target="_blank">wwww.izhenqing.com</a>&nbsp;&nbsp;&nbsp;&nbsp;<a>有问题请咨询客服QQ 250502000&nbsp;&nbsp;&nbsp;&nbsp;</a> <img src="<?=$this->tempdir?>images/new.gif" width="35" height="13" alt="new" /></div>
    <div id="index_pool">
      <div class="index_title">
        <div class="title_l">收入数据</div>
        <div class="title_r">&nbsp;</div>
      </div>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th class="td_line bt_line"></th>
          <th class="td_line">直荐奖励</th>
          <th class="td_line">分红奖励</th>
          <th class="td_line">股东奖励</th>
          <th class="td_line">报单奖励</th>
          <th>合计</th>
        </tr>
        <tr>
          <th class="td_line bt_line">今日</th>
          <td><?=$this->todaymoney['refereemoney']?>元</td>
          <td><?=$this->todaymoney['floormoney']?>元</td>
          <td><?=$this->todaymoney['money']?>元</td>
          <td class="td_line"><?=$this->todaymoney['regmoney']?>元</td>
          <td><span class="text_red14px"><?=$this->todaymoney['inmoney']?></span>元</td>
        </tr>
        <tr>
          <th class="td_line bt_line">昨天</th>
          <td><?=$this->yestodaymoney['refereemoney']?>元</td>
          <td><?=$this->yestodaymoney['floormoney']?>元</td>
          <td><?=$this->yestodaymoney['money']?>元</td>
          <td class="td_line"><?=$this->yestodaymoney['regmoney']?>元</td>
          <td><span class="text_red14px"><?=$this->yestodaymoney['inmoney']?></span>元</td>
        </tr>
        <tr>
          <th class="td_line bt_line">全部</th>
          <td><?=$this->allmoney['refereemoney']?>元</td>
          <td><?=$this->allmoney['floormoney']?>元</td>
          <td><?=$this->allmoney['money']?>元</td>
          <td class="td_line"><?=$this->allmoney['regmoney']?>元</td>
          <td><span class="text_red14px"><?=$this->allmoney['inmoney']?></span>元</td>
        </tr>
      </table>
    </div>
<div id="index_diagram">
  <div id="chartspie" style="width:49%;float:left;"></div>
  <div id="chartscolumn" style="width:49%;float:left;"></div>
</div>
<script language="javascript"> 
$(function() { 
  chart('chartscolumn',"column",['综合统计'],[{name:'收入',data:[<?=$this->allmoney['inmoney']?>]},{name:'支出',data:[<?=$this->allmoney['outmoney']?>]},{name:'利润',data: [<?=$this->allmoney['margin']?>]}]);
   chart('chartspie',"pie",['综合统计'],[['分红奖励',<?=$this->allmoney['floormoney']?>],['直荐奖励',<?=$this->allmoney['refereemoney']?>],['股东奖励',<?=$this->allmoney['money']?>],['报单奖励',<?=$this->allmoney['regmoney']?>]]);
});
</script>
  </div>
</div>
<? include template('member_footer','default/member'); ?>
