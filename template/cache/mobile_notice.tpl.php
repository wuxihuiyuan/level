<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>系统公告</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/notice.js" ></script>
  </head>
  <body>
  <div class="pb80">
    <div class="tab-head">
      发现
    </div>
    <div class="tab-wrap clearBoth">
      <ul class="tab-title">
        <li class="tab-title-on">所有公告</li>
        <? if(is_array($this->newstype)) { foreach($this->newstype as $val) { ?>        <li><?=$val['typename']?></li>
        <? } } ?>      </ul>
    </div>

    <script>
    var countNewstype = <?=$this->countNewsType?>;
    var li = document.querySelectorAll(".tab-title li");
    for(var i=0;i<li.length;i++){
      li[i].style.width = 100/countNewstype+"%"
    }
    </script>
    <div class="tab-content not_tab">
      <div class="notice-list" style="display: block">
      <? if(is_array($this->record)) { foreach($this->record as $value) { ?>      <a href="<?=$value['detailurl']?>">
        <div class="one_img">
          <h1 class="notice-title" style="display: inline;color: black"><?=$value['title']?></h1>
          <? if($value['imgurl']) { ?>
          <div class="not-img-list" style="float: right;">
            <img src="<?=$value['imgurl']?>" class="not-img-item one-img-item">
          </div>
          <? } ?>
          <div class="one-img-time">
            <span class="not-type" style="margin-top: 10px;"><?=$value['typename']?></span>
            <p class="not-time clear-float"><?=$value['addtime']?></p>
            <div class="not-view clear-float" style="display: block;"><?=$value['clicknumber']?></div>
          </div>
        </div>
      </a>
      <? } } ?>      </div>
      <? if(is_array($this->newstype)) { foreach($this->newstype as $val) { ?>      <div class="notice-list">
        <? if(is_array($this->record)) { foreach($this->record as $value) { ?>        <? if($value['typeid'] == $val['id']) { ?>
        <a href="<?=$value['detailurl']?>">
        <div class="one_img">
          <h1 class="notice-title" style="display: inline;color: black"><?=$value['title']?></h1>
          <div class="not-img-list" style="float: right;">
            <img src="<?=$value['imgurl']?>" class="not-img-item one-img-item">
          </div>
          <div class="one-img-time">
            <span class="not-type" style="margin-top: 10px"><?=$value['typename']?></span>
            <p class="not-time clear-float"><?=$value['addtime']?></p>
            <div class="not-view clear-float" style="display: block"><?=$value['clicknumber']?></div>
          </div>
        </div>
        </a>
        <? } ?>
      <? } } ?>      </div>
    <? } } ?>    </div>
  </div>
   
<? include template('mobile_footer','default/mobile'); ?>
  </body>

</html>
