<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('mobile_header','default/mobile'); ?>
<div id="main">
  <div class="left">
<? include template('mobile_left','default/mobile'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <? if($_GET['type']=='upgroup') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">会员升级</div>
      </div>
      <div class="order-prompt order-promptbommton">会员点位升级，升级后您将享受更高的奖励制度，更好的实施您的发财大计！</div>
      <div class="opencard_box">
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 您的账户</div>
          <div class="opencard_input_box"><span class="dis-input">{mobile username}</span>
            <input name="mymoney" id="mymoney" type="hidden" value="{mobile money}"/>
          </div>
        </div>
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 当前级别</div>
          <div class="opencard_input_box"><span class="dis-input">{mobile groupname}</span></div>
        </div>
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 要升级到</div>
          <div class="opencard_input_box"><?=config::form('groupid','','select',$this->usergroup,'onchange=\'checkgroupid()\'');?> <span class="tips" id="groupidtip"></span></div>
        </div>
        <div class="opencard_button_box"><?=config::form('opcardbutton','确认','submit','','onclick=\'checkshjiform()\'');?></div>
      </div>
      <? } ?>
      <? if($_GET['type']=='arrange') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">安置结构</div>
      </div>
      <div class="mobile_mian">
        <form method="GET" action="">
          <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
          <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
          <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
          <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
          <div class="ex_find">
            <div class="ex_text">会员用户名</div>
            <div class="log_input_box">
              <input name="username" type="text" class="log_input" value="<?=$_GET['username']?>" />
            </div>
            <div class="ex_button_box">
              <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
            </div>
          </div>
        </form>
        <div class="info_bg">
          <div class="info_text">会员“<?=$this->tree['username']?>”：左<b class="text_red_line"><?=$this->tree['left']?></b>人，中<b class="text_red_line"><?=$this->tree['centre']?></b>人，右<b class="text_red_line"><?=$this->tree['right']?></b>人，直荐会员<b class="text_red_line"><?=$this->tree['renumber']?></b>个</div>
        </div>
<table width="500" align="left" cellpadding="0" cellspacing="0" id="treeform">
  <tr>
    <td><table width="500" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto; width:620px;">
        <!--第一层-->
        <tr>
          <td colspan="3" align="center"><table class="t_info" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th colspan="3"><? if($this->mobile['username']==$this->tree['username']) { ?>
                          <?=$this->tree['username']?>
                          <? } else { ?>
                          <a href="<?=Purl("?mod=mobile&act=treeform&username=".$this->tree['_referee']); ?>"><img src="<?=$this->tempdir?>images/goback.png" style="vertical-align:middle;"/></a> <?=$this->tree['username']?>
                          <? } ?>
                </th>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['uid']?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['groupname']?></td>
              </tr>    
              <tr>
                <td colspan="3"><?=formattime($this->tree['regtime'],"Y-m-d"); ?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['status'] ? '已开通' : '<span buymoney="'.$this->tree['usergroup']['buymoney'].'" uid="'.$this->tree['uid'].'" class="nowopen">未开通，点击开通</span>'; ?></td>
              </tr>
              <tr>
                <td width="33%"><?=$this->tree['left']?></td>
                <td width="33%"><?=$this->tree['centre']?></td>
                <td width="33%"><?=$this->tree['right']?></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><img src="<?=$this->tempdir?>images/line_1.gif"/></td>
        </tr>
        <!--第一层-->
        <!--第二层-->
        <tr>
          <td align="center"><? if(is_array($this->tree['l'])) { ?>
            <table class="t_info" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th colspan="3"> <a href="<?=Purl("?mod=mobile&act=treeform&uid=".$this->tree['l']['uid']); ?>"><?=$this->tree['l']['username']?></a></th>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['l']['uid']?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['l']['groupname']?></td>
              </tr>
              <tr>
                <td colspan="3"><?=formattime($this->tree['l']['regtime'],"Y-m-d"); ?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['l']['status'] ? '已开通' : '<span buymoney="'.$this->tree['l']['usergroup']['buymoney'].'" uid="'.$this->tree['l']['uid'].'" class="nowopen">未开通，点击开通</span>'; ?></td>
              </tr>
              <tr>
                <td width="33%"><?=$this->tree['l']['left']?></td>
                <td width="33%"><?=$this->tree['l']['centre']?></td>
                <td width="33%"><?=$this->tree['l']['right']?></td>
              </tr>
            </table>
            <? } else { ?>
            <table class="t_info" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th colspan="3"><a href="<?=Purl('?mod=mobile&act=vocational&type=register&position=left&uid='.$this->tree['uid']); ?>">未注册</a></th>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td width="33%">&nbsp;</td>
                <td width="33%">&nbsp;</td>
                <td width="33%">&nbsp;</td>
              </tr>
            </table>
            <? } ?></td>
          <td align="center"><? if(is_array($this->tree['c'])) { ?>
            <table class="t_info" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th colspan="3"> <a href="<?=Purl("?mod=mobile&act=treeform&uid=".$this->tree['c']['uid']); ?>"><?=$this->tree['c']['username']?></a></th>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['c']['uid']?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['c']['groupname']?></td>
              </tr>
              <tr>
                <td colspan="3"><?=formattime($this->tree['c']['regtime'],"Y-m-d"); ?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['c']['status'] ? '已开通' : '<span buymoney="'.$this->tree['c']['usergroup']['buymoney'].'" uid="'.$this->tree['c']['uid'].'" class="nowopen">未开通，点击开通</span>'; ?></td>
              </tr>
              <tr>
                <td width="33%"><?=$this->tree['c']['left']?></td>
                <td width="33%"><?=$this->tree['c']['centre']?></td>
                <td width="33%"><?=$this->tree['c']['right']?></td>
              </tr>
            </table>
            <? } else { ?>
            <table class="t_info" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th colspan="3"><a href="<?=Purl('?mod=mobile&act=vocational&type=register&position=centre&uid='.$this->tree['uid']); ?>">未注册</a></th>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td width="33%">&nbsp;</td>
                <td width="33%">&nbsp;</td>
                <td width="33%">&nbsp;</td>
              </tr>
            </table>
            <? } ?></td>
          <td align="center"><? if(is_array($this->tree['r'])) { ?>
            <table class="t_info" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th colspan="3"> <a href="<?=Purl("?mod=mobile&act=treeform&uid=".$this->tree['r']['uid']); ?>"><?=$this->tree['r']['username']?></a></th>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['r']['uid']?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['r']['groupname']?></td>
              </tr>
              <tr>
                <td colspan="3"><?=formattime($this->tree['r']['regtime'],"Y-m-d"); ?></td>
              </tr>
              <tr>
                <td colspan="3"><?=$this->tree['r']['status'] ? '已开通' : '<span buymoney="'.$this->tree['r']['usergroup']['buymoney'].'" uid="'.$this->tree['r']['uid'].'" class="nowopen">未开通，点击开通</span>'; ?></td>
              </tr>
              <tr>
                <td width="33%"><?=$this->tree['r']['left']?></td>
                <td width="33%"><?=$this->tree['r']['centre']?></td>
                <td width="33%"><?=$this->tree['r']['right']?></td>
              </tr>
            </table>
            <? } else { ?>
            <table class="t_info" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th colspan="3"><a href="<?=Purl('?mod=mobile&act=vocational&type=register&position=right&uid='.$this->tree['uid']); ?>">未注册</a></th>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td width="33%">&nbsp;</td>
                <td width="33%">&nbsp;</td>
                <td width="33%">&nbsp;</td>
              </tr>
            </table>
            <? } ?></td>
        </tr>
        <!--第二层-->
      </table></td>
  </tr>
</table>
      </div>
      <? } ?>
      <? if($_GET['type']=='referee') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">推荐结构</div>
      </div>
      <form method="GET" action="">
        <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
        <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
        <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
        <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
        <div class="ex_find">
          <div class="ex_text">会员用户名</div>
          <div class="log_input_box">
            <input name="username" type="text" class="log_input" value="<?=$_GET['username']?>" />
          </div>
          <div class="ex_button_box">
            <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
          </div>
        </div>
      </form>
      <div class="info_bg">
        <div class="info_text">图例注解： 所在层数[*] 用户名[******] 会员级别[******] 开通状态</div>
      </div>
      <div id="tree">
        <div class='node'>
          <div class='title'>
            <div class='click have_display_0' yesend="1" data='1' onClick="clickject(this);"></div>
            <span>[0][<?=$this->myuser['username']?>][<?=$this->myuser['groupname']?>][<?=$this->myuser['status'] ? '已开通' : '<em buymoney="'.$this->myuser['usergroup']['buymoney'].'" uid="'.$this->myuser['uid'].'" class="nowopen">未开通，点击开通</em>'; ?>]</span> </div>
          <div class='sub_0'>
            <? if(is_array($this->reuser)) { foreach($this->reuser as $key=>$value) { ?>            <? $yesend = count($this->reuser)-1>$key ? "2" : "1" ?>            <? if($value['renumber']>0) { ?>
            <div class="node">
              <div class="title">
                <div class="click have_<?=$yesend?>" yesend="<?=$yesend?>" onClick="clickject(this);" data='0' floor="1" username="<?=$value['username']?>"></div>
                <span>[1][<?=$value['username']?>][<?=$value['groupname']?>][<?=$value['status'] ? '已开通' : '<em buymoney="'.$value['usergroup']['buymoney'].'" uid="'.$value['uid'].'" class="nowopen">未开通，点击开通</em>'; ?>]</span> </div>
            </div>
            <? } else { ?>
            <div class='node'>
              <div class='title'>
                <div class="no_<?=$yesend?>" floor="1" yesend="<?=$yesend?>" username="<?=$value['username']?>"></div>
                <span>[1][<?=$value['username']?>][<?=$value['groupname']?>][<?=$value['status'] ? '已开通' : '<em buymoney="'.$value['usergroup']['buymoney'].'" uid="'.$value['uid'].'" class="nowopen">未开通，点击开通</em>'; ?>]</span> </div>
            </div>
            <? } ?>
            <? } } ?>          </div>
        </div>
      </div>
      <? } ?>
      <? if($_GET['type']=='record') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">推荐列表</div>
      </div>
      <div class="mobile_mian">
        <form method="GET" action="">
          <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
          <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
          <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
          <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
          <div class="ex_find">
            <div class="ex_text">注册日期</div>
            <div class="ex_time_box"><?=config::form('time',$this->time_str,'datas');?></div>
            <div class="ex_button_box">
              <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
            </div>
          </div>
        </form>
        <div class="info_bg">
          <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录</div>
        </div>
        <table class="sheet">
          <tr>
            <th>会员编号</th>
            <th>会员账号</th>
            <th>会员级别</th>
            <th>推荐人数</th>
            <th>市场人数</th>
            <th>注册时间</th>
            <th>开通状态/时间</th>
          </tr>
          <? if(is_array($this->record)) { foreach($this->record as $value) { ?>          <tr class="mybg">
            <td><?=$value['uid']?></td>
            <td><?=$value['username']?></td>
            <td><?=$value['groupname']?></td>
            <td><?=$value['renumber']?></td>
            <td>左：<?=$value['left']?>  中：<?=$value['centre']?> 右：<?=$value['right']?></td>
            <td><?=formattime($value['regtime']); ?></td>
            <td><? if($value['status']) { ?><?=formattime($value['opentime']); } else { ?><span buymoney="<?=$value['usergroup']['buymoney']?>" uid="<?=$value['uid']?>" class="nowopen">未开通，点击开通</span><? } ?></td>
          </tr>
          <? } } ?>        </table>
        <? if(!is_array($this->record)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
      </div>
      <? } ?>
      <? if($_GET['type']=='register') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">注册会员</div>
        <div class="opencards_title_a">提示：<span class="text_x_12px">*</span> 为必填项目！</div>
      </div>
      <div class="order-prompt order-promptbommton"><span></span>会员账号只能以字母开头，且仅可使用字母、汉字、数字和下划线，会员账号最好以爱真情昵称一致、邮箱、手机号码、QQ号码、身份证号码与爱真情对应资料一致且认证通过不得修改！</div>
      <div class="opencard_box">
       <form id="ajaxformbox" name="ajaxformbox" method="post" onsubmit="return checkform();">
        <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px">*</span> 会员账户</div>
          <div class="opencard_input_box"><input name="username" id="username" class="myinput data" type="text" value="" onblur="checkusername()"/>
                <input name="mymoney" id="mymoney" type="hidden" value="{mobile regmoney}"/>
                <span class="tips" id="usernametip"></span></div>
        </div>
        <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px">*</span> 会员姓名</div>
          <div class="opencard_input_box"><input type="text" size="20" value="" class="myinput data" id="truename" name="truename" onblur="checktruename()" />
                 <span class="tips" id="truenametip"></span></div>
        </div>
        
        
                <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px"></span> 电子邮箱</div>
          <div class="opencard_input_box"><input type="text" size="20" value="" class="myinput data" id="email" name="email" />
                 <span class="tips" id="emailtip"></span></div>
        </div>
        
                <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px">*</span> 手机号码</div>
          <div class="opencard_input_box">
          <input type="text" size="20" value="" class="myinput data" id="userphone" name="userphone" onblur="checkuserphone()" />
                 <span class="tips" id="userphonetip"></span></div>
        </div>


        <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px"></span> 身份证号</div>
          <div class="opencard_input_box">
          <input type="text" size="30" name="idcard" id="idcard" value="" class="myinput data"/>
          <span class="tips" id="idcardtip"></span></div>
       </div>
       
       <div class="opencard_h opencard_h50">
          <div class="opencard_text"> <span class="text_x_12px"></span>联系QQ</div>
          <div class="opencard_input_box">
          <input type="text" size="30" name="qq" id="qq" value="" class="myinput data" />
          <span class="tips" id="qqtip"></span></div>
       </div>

       <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px">*</span> 开通状态</div>
          <div class="opencard_input_box"><?=config::form('nowopen','','select','[<><请选择...>][<1><现在立马开通会员>][<0><先提交稍后开通>]','onchange=\'checknowopen()\'');?> 
          <span class="tips" id="nowopentip"></span></div>
        </div>
        <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px">*</span> 节点会员</div>

          <div class="opencard_input_box"><input type="text" size="20" value="<?=$this->_referee['username']?>" class="myinput data" id='_referee' name="_referee"  onblur="check_referee()"/>
                 <span class="tips" id="_refereetip"></span></div>
        </div>
        <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px">*</span> 登陆密码</div>
          <div class="opencard_input_box"><input type="text" value="love123456" name="password" id="password" class="myinput data" onblur="checkpassword()"/>
                  <span class="tips" id="passwordtip"></span></div>
        </div>
        <div class="opencard_h opencard_h50">
          <div class="opencard_text"><span class="text_x_12px">*</span> 支付密码</div>
          <div class="opencard_input_box"><input type="text" value="love654321" name="_repass" id="_repass" class="myinput data" onblur="checkrepass()"/>
                 <span class="tips" id="_repasstip"></span></div>
        </div>
        <div class="opencard_button_box"><?=config::form('opcardbutton','确认','submit');?></div>
        </form>
      </div>
      <? } ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  function checkshjiform(){
    var post = true;   
    if($("#groupid").val()==''){
    addtip("groupid","对不起，请选择升级级别");
      post = false;
    }   
    if(post) listTable.upgroup($("#groupid").val());
  } 
</script>
<? include template('mobile_footer','default/mobile'); ?>
