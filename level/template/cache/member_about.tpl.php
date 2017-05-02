<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
  <div class="left">
<? include template('member_left','default/member'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <div class="track_title"> 
        <? if(is_array($this->getabout($this->about['typeid']))) { foreach($this->getabout($this->about['typeid']) as $val) { ?>        <a href="<?=$val['memberurl']?>" class="<?=$this->about['id']==$val['id'] ? 'menushow' : 'menu'; ?>"><?=$val['name']?></a> 
        <? } } ?>   
      </div>
      <div class="article">
        <h1><?=$this->about['name']?></h1>
        <div class="content"><?=$this->about['content']?></div>
      </div>
  </div>
</div>
</div>
<? include template('member_footer','default/member'); ?>
