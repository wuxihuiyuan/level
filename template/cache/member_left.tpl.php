<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<div class="lefttop">
<a href="<?=Purl("?mod=member "); ?>">
<div class="ico i1"></div>
<span style="line-height: 22px;font-size: 16px;">系统首页</span></a>
<a href="<?=Purl("?mod=member&act=imessage "); ?>">
<div class="ico i2"></div>
<span style="line-height: 22px;font-size: 16px;">站内信件</span> <span class="text_red_10px" id="myread"><? if($this->read) { ?>(<?=$this->read?>)<? } ?></span></a>
<a href="<?=Purl("?mod=member&act=notice "); ?>">
<div class="ico i3"></div>
<span style="line-height: 22px;font-size: 16px;">系统公告</span></a>
<a href="<?=Purl("?mod=member&act=capital&type=list "); ?>">
<div class="ico i4"></div>
<span style="line-height: 22px;font-size: 16px;">资金明细</span></a>
<a href="<?=Purl("?mod=member&act=capital&type=myatm "); ?>">
<div class="ico i5"></div>
<span style="line-height: 22px;font-size: 16px;">现金提现</span></a>
</div>
<div class="leftbottom">
<ul id="menu"><? if(is_array(user_menu())) { foreach(user_menu() as $key=>$val) { if($this->user->gt_purview($key)&&$key!='main') { ?>
<li>
<a href="javascript:;">
<div class="ico i_<?=$key?>"></div><?=$val?></a>
<ul id="menu_<?=$key?>"><? if(is_array(member_menu($key))) { foreach(member_menu($key) as $k=>$v) { if($this->user->rn_purview('member',$key,$k)) { ?>
<li>
<a href="<?=Purl("?mod=member&act=".$key."&type=".$k); ?>" <? if($key==$_GET[ 'act']&&$k==$_GET[ 'type']) { ?>class="openlist" <? } ?>>
<div class="ico i_menu"></div><?=$v?>
</a>
</li>
<? } } } ?><div style="clear:both;"></div>
</ul>
<div style="clear:both;"></div>
</li>
<? } } } ?><div style="clear:both;"></div>
</ul>
<div style="clear:both;"></div>
</div>
