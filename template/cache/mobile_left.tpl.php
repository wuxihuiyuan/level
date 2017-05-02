<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
    <div class="lefttop"> <a href="<?=Purl("?mod=mobile"); ?>">
      <div class="ico i4"></div>
      系统首页</a><a href="<?=Purl("?mod=mobile&act=imessage"); ?>">
      <div class="ico i2"></div>
      站内信件 <span class="text_red_10px" id="myread"><? if($this->read) { ?>(<?=$this->read?>)<? } ?></span></a><a href="<?=Purl("?mod=mobile&act=notice"); ?>">
      <div class="ico i3"></div>
      系统公告</a> <a href="<?=Purl("?mod=mobile&act=capital&type=list"); ?>">
      <div class="ico i1"></div>
      资金明细</a> </div>
    <div class="leftbottom">
      <ul id="menu">
      <? if(is_array(user_menu())) { foreach(user_menu() as $key=>$val) { ?>       <? if($this->user->gt_purview($key)&&$key!='main') { ?>
        <li><a href="javascript:;"><div class="ico i_<?=$key?>"></div><?=$val?></a>
          <ul id="menu_<?=$key?>">
           <? if(is_array(mobile_menu($key))) { foreach(mobile_menu($key) as $k=>$v) { ?>            <? if($this->user->rn_purview('mobile',$key,$k)) { ?>
            <li>
            <? if($k=='address') { ?>
            <a href="<?=Purl("?mod=mobile&act=".$key."&type=".$k."&method=list"); ?>"<? if($key==$_GET['act']&&$k==$_GET['type']) { ?>class="open"<? } ?>><div class="ico i_menu"></div><?=$v?></a>
            <? } else { ?>
            <a href="<?=Purl("?mod=mobile&act=".$key."&type=".$k); ?>"<? if($key==$_GET['act']&&$k==$_GET['type']) { ?>class="open"<? } ?>><div class="ico i_menu"></div><?=$v?></a>
            <? } ?>
            </li>
            <? } ?>
           <? } } ?>           <div style="clear:both;"></div>
          </ul>
          <div style="clear:both;"></div>
        </li>
       <? } ?>
      <? } } ?>      <div style="clear:both;"></div>
      </ul>
                  <div style="clear:both;"></div>
    </div>
