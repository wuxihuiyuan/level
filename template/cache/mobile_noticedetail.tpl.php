<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html>

<head>
<title>公告详情</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<? include template('../common','default/mobile'); ?>
    	<link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    	<link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    	<script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    	<script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    	<script type="text/javascript" src="<?=$this->tempdir?>js/notice_details.js" ></script>
</head>
<body style="background: #fff;">
<? include template('mobile_header','default/mobile'); ?>
<div class="pb80">
<div class="pad">
<h1 class="nd_h1"><?=$this->news['title']?></h1>
<p class="nd_p"><?=$this->news['typename']?></p>
<span class="nd_span"><?=$this->news['addtime']?></span>
<!-- <img src="../images/timg3.jpg" class="nd_img" /> -->
<?=$this->news['content']?>
</div>
<div class="read_more">
<i></i>
<p>阅读更多</p>
</div>
<div class="more_list"><? if(is_array($this->detailNewsList)) { foreach($this->detailNewsList as $value) { ?><a href="<?=$value['detailurl']?>">
<div class="nd-more-item">
<? if($value['imgurl']) { ?>
<div class="not-more-img ndlist_img">
<img src="<?=$value['imgurl']?>" />
</div>
<? } ?>
<h1><?=$value['title']?></h1>
<p><span><?=$value['typename']?></span><?=$value['addtime']?></p>
<div class="not-view" style="float:left;color: #ccc;margin-top: 8px"><?=$value['clicknumber']?></div>
</div>
</a><? } } ?></div>
</div>
<? include template('mobile_footer','default/mobile'); ?>
</body>

</html>
