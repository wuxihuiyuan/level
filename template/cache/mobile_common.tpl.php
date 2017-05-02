<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<script language="javascript">
var siteurl="<?=config::get('siteurl')?>",tempdir="<?=$this->tempdir?>",hempdir="<?=$this->hempdir?>",appdir="<?=$this->appdir?>",rewrite="<?=config::get('rewrite')?>",module="<?=$this->module?>",action="<?=$this->action?>",islogin="<? if(is_array($this->mobile)) { ?>1<? } else { ?>0<? } ?>",userbalance="<?=$this->mobile['usergroup']['balance']?>";//初始变量
</script>
<link rel="stylesheet" href="<?=$this->tempdir?>images/style.css" type="text/css" />
<script type="text/javascript" src="<?=$this->appdir?>jquery.js" ></script><script type="text/javascript" src="<?=$this->appdir?>function.js" ></script><script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
