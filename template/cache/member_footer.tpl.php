<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!--<div class="pow-layer">
  <div class="ngx">
    <div class="pl-box">
      <h3>在线客服</h3>
      <ul>
      <? if(is_array($this->kefu)) { foreach($this->kefu as $val) { ?>      <? $value = explode("|",$val);
        $value['1'] = $value['1'] ? $value['1'] : $value['0'];
       ?>      <li><a href="tencent://message/?uin=<?=$value['0']?>"><img border="0" src="http://wpa.qq.com/pa?p=2:<?=$value['0']?>:45"><span><?=$value['1']?></span></a></li>
      <? } } ?>      </ul>
      <h3>服务电话</h3>
      <p class="spc tc red"><?=config::get('sitephone')?></p>
    </div>
    <a href="javascript:;" class="fr yahei"><i class="ico qq"></i><br />在<br />线<br />客<br />服</a> 
 </div>
</div>-->
<div style="display:none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5914508'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/stat.php%3Fid%3D5914508' type='text/javascript'%3E%3C/script%3E"));</script></div>
</body>
</html>
