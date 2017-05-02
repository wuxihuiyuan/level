<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<div class="foot">
<div class="footnav">
  <a href="<?=Purl('mobile_main')?>" <? if($this->footnav=='main') { ?>class="on"<? } ?>>首页</a>
  <a href="<?=Purl('mobile_treeform')?>" <? if($this->footnav=='treeform') { ?>class="on"<? } ?>>结构</a>
  <a href="<?=Purl('mobile_register')?>" <? if($this->footnav=='register') { ?>class="on"<? } ?>>注册</a>
  <a href="<?=Purl('mobile_notice')?>" <? if($this->footnav=='notice') { ?>class="on"<? } ?>>公告</a>
  <a href="<?=Purl('mobile_user')?>" <? if($this->footnav=='user') { ?>class="on"<? } ?>>会员</a>
</div>
</div>
<div class="load">正在加载...</div>
