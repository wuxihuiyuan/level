<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
  <div class="left">
<? include template('member_left','default/member'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <? if($_GET['type']=='profile') { ?>
      <form id="subform" name="subform" method="post" enctype="multipart/form-data" action="">
        <div class="opencards_title">
          <div class="opencards_title_b">会员信息</div>
          <div class="opencards_title_a">提示：<span class="text_x_12px">*</span> 为必填项目！</div>
        </div>
        <div class="order-prompt order-promptbommton">请务必确认登录密码与支付密码完全不同！密码相同会导致支付密码失效，使您的帐户资金无法得到安全保障。</div>
        <div class="opencard_box">
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span>会员账号</div>
            <div class="opencard_input_box"><span class="dis-input"><?=$this->member['username']?></span></div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 电子邮箱</div>
            <div class="opencard_input_box"><span class="dis-input"><?=$this->member['email']?></span>
              <? if($this->member[echeck]==1) { ?>
              <span class="tips2 emali-ok">邮箱已验证。</span>
              <? } else { ?>
              <span class="tips2 emali-no">邮箱未验证。</span> <a class="abut02" href="<?=Purl("?mod=member&act=user&type=authemail"); ?>"><span>去验证&nbsp;&gt;&gt;</span></a>
              <? } ?>
            </div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 手机号码</div>
            <div class="opencard_input_box"><span class="dis-input"><?=$this->member['userphone']?></span>
              <? if($this->member['mcheck']==1) { ?>
              <span class="tips2 phone-ok">手机已绑定。</span>
              <? } else { ?>
              <span class="tips2 phone-no">手机未绑定。</span> <a class="abut02" href="<?=Purl("?mod=member&act=user&type=authphone"); ?>"><span>去绑定&nbsp;&gt;&gt;</span></a>
              <? } ?>
            </div>
          </div>
          <!-- 
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 会员姓名</div>
            <div class="opencard_input_box">
              <input name="truename" id="truename" class="myinput data" type="text" value="<?=$this->member['truename']?>" />
            </div>
          </div>
          -->
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span>会员姓名</div>
            <div class="opencard_input_box"><span class="dis-input"><?=$this->member['truename']?></span></div>
          </div>

          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span>身份证号码</div>
            <div class="opencard_input_box"><span class="dis-input"><?=$this->member['idcard']?></span></div>
          </div>
          <!-- 
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 联系QQ</div>
            <div class="opencard_input_box">
              <input name="qq" id="qq" class="myinput data" type="text" value="<?=$this->member['qq']?>" />
            </div>
          </div>
          -->
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span>联系QQ</div>
            <div class="opencard_input_box"><span class="dis-input"><?=$this->member['qq']?></span></div>
          </div>

          <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?></div>
        </div>
      </form>
      <? } ?>
      <? if($_GET['type']=='password') { ?>
      <? if($_GET['method']=='paypasswd') { ?>
      <script language="javascript">var paypasswdtip = "支付";</script>
      <? } ?>
      <div class="track_title"><a class="<?=$_GET['method']=='' ? 'menushow' : 'menu'; ?>" href="<?=Purl("?mod=member&act=user&type=password"); ?>">修改登陆密码</a><a class="<?=$_GET['method']=='paypasswd' ? 'menushow' : 'menu'; ?>" href="<?=Purl("?mod=member&act=user&type=password&method=paypasswd"); ?>">修改支付密码</a></div>
      <div class="order-prompt order-promptbommton">请务必确认登录密码与支付密码完全不同！密码相同会导致支付密码失效，使您的帐户资金无法得到安全保障。</div>
      <? if($_GET['method']=='') { ?>
      <form action="" method="POST" onsubmit="return checkform()">
        <div class="opencard_box">
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 原始密码</div>
            <div class="opencard_input_box">
              <input name="oldpassword" id="oldpassword" class="myinput" type="password" value="" onblur="checkoldpassword()" onfocus="getoldpassword();"/>
              <span class="tips" id="oldpasswordtip"></span></div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 新的密码</div>
            <div class="opencard_input_box">
              <input name="password" id="password" class="myinput" type="password" onblur="checkpassword()" onfocus="getpassword();" onkeyup="pwStrength(this.value)" />
              <span class="tips" id="passwordtip"></span>
              <div class="grade-pwd"> <span>密码强度：</span>
                <ul>
                  <li class="block01"></li>
                  <li class="block02"></li>
                  <li class="block03"></li>
                </ul>
                <span class="grade-text"></span> </div>
            </div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 确认密码</div>
            <div class="opencard_input_box">
              <input name="cpassword" id="cpassword" class="myinput" type="password"  onblur="checkcpassword()" onfocus="getcpassword();"/>
              <span class="tips" id="cpasswordtip"></span> </div>
          </div>
          <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?></div>
        </div>
      </form>
      <? } ?>
      <? if($_GET['method']=='paypasswd') { ?>
      <form action="" method="POST" onsubmit="return checkform()">
        <div class="opencard_box">
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 原支付密码</div>
            <div class="opencard_input_box">
              <input name="oldpassword" id="oldpassword" class="myinput" type="password" value="" onblur="checkoldpassword()" onfocus="getoldpassword();"/>
              <span class="tips" id="oldpasswordtip"></span></div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 新支付密码</div>
            <div class="opencard_input_box">
              <input name="password" id="password" class="myinput" type="password" onblur="checkpassword()" onfocus="getpassword();" onkeyup="pwStrength(this.value)" />
              <span class="tips" id="passwordtip"></span>
              <div class="grade-pwd"> <span>密码强度：</span>
                <ul>
                  <li class="block01"></li>
                  <li class="block02"></li>
                  <li class="block03"></li>
                </ul>
                <span class="grade-text"></span> </div>
            </div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 再输入一次</div>
            <div class="opencard_input_box">
              <input name="cpassword" id="cpassword" class="myinput" type="password"  onblur="checkcpassword()" onfocus="getcpassword();"/>
              <span class="tips" id="cpasswordtip"></span> </div>
          </div>
          <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?></div>
        </div>
      </form>
      <? } ?>
      <? } ?>
      <? if($_GET['type']=='authemail') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">邮箱验证</div>
        <div class="opencards_title_a">提示：<span class="text_x_12px">*</span> 为必填项目！</div>
      </div>
      <? if($this->member['echeck']) { ?>
      <div class="order-prompt order-prompt2"><b>已验证邮箱：<?=$this->member['email']?></b><em>邮箱验证后，可以用于登录、找回密码、接收资金变动信息等。</em></div>
      <div class="forgot-emailok">
        <p>已验证邮箱：<em><?=$this->member['email']?></em>。</p>
        <span class="text">邮箱验证后，可以用于登录、找回密码、接收资金变动信息等。
        <a class="abut03" href="javascript:;"><em>解除绑定</em></a>
        </span> </div>
      <? } else { ?>
      <? if($this->submit) { ?>
      <div class="forgot-step stepshort">
        <div class="steptext steptextshort"><span class="stepl1"></span>
          <p>1.验证邮箱</p>
          <span class="stepr1"></span></div>
        <div class="steptext steptextshort hover"><span class="stepl2"></span>
          <p>2.激活邮件</p>
          <span class="stepr2"></span></div>
        <div class="steptext steptextshort"><span class="stepl3"></span>
          <p>3.完成</p>
          <span class="stepr3"></span></div>
      </div>
      <div class="forgot-emailok">
        <p>已发送验证邮件至：<em><?=$_POST['email']?></em>请立即进入邮箱验证。</p>
        <span class="text">请尽快登录您的邮箱点击激活链接完成验证。</span> <a class="abut03" href="<?=$this->emailurl?>" target="_blank"><em>去邮箱</em></a>
        <div class="verify-text"> <b>收不到邮件？</b>
          <ul>
            <li>有可能被误判为垃圾邮件了，请到垃圾邮件文件夹找找。</li>
            <li>拨打客服电话，让客服来帮您解决：<?=config::get('sitephone')?>。</li>
            <li>或者选择<a class="abut02" href="<?=Purl("?mod=member&act=user&type=authemail"); ?>"><span>重发验证邮件</span></a></li>
          </ul>
        </div>
      </div>
      <? } else { ?>
      <div class="forgot-step stepshort">
        <div class="steptext steptextshort hover"><span class="stepl1"></span>
          <p>1.验证邮箱</p>
          <span class="stepr1"></span></div>
        <div class="steptext steptextshort"><span class="stepl2"></span>
          <p>2.激活邮件</p>
          <span class="stepr2"></span></div>
        <div class="steptext steptextshort"><span class="stepl3"></span>
          <p>3.完成</p>
          <span class="stepr3"></span></div>
      </div>
      <form action="" method="post" onsubmit="return checkform()">
        <div class="opencard_box">
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 验证邮箱</div>
            <div class="opencard_input_box">
              <input name="email" id="email" class="myinput" value="<?=$this->member['email']?>" type="text" onblur="checkemail()" onfocus="getemail();"/>
              <span class="tips" id="emailtip"></span></div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 验 证 码</div>
            <div class="opencard_input_box"><input id="seccode" class="myinput yzm" type="text" name="seccode" value="" placeholder="请输入验证码" maxlength="4" onblur="checkseccode();"/><?=config::seccode("class=\"yzmimg\"","width=\"80\" height=\"31\""); ?> <span id="seccodetip" class="tips"></span>
            </div>
          </div>
          <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?></div>
        </div>
      </form>
      <? } ?>
      <? } ?>
      <? } ?>
      <? if($_GET['type']=='authphone') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">手机绑定</div>
        <div class="opencards_title_a">提示：<span class="text_x_12px">*</span> 为必填项目！</div>
      </div>
      <? if($this->member['mcheck']) { ?>
      <div class="order-prompt order-prompt2"><b>已绑定手机号：<?=$this->member['userphone']?></b><em>绑定手机号码后，可以用于登录、找回密码、接收资金变动信息等。</em></div>
      <h4>修改绑定手机号</h4>
      <form action="" method="post" onsubmit="return doubleform()">
        <div class="opencard_box">
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 已绑定手机</div>
            <div class="opencard_input_box"><span class="dis-input"><?=$this->member['userphone']?></span>
              <input type="hidden" id="resendtime" name="resendtime" value="<?=120-(time()-$this->member['mtime']); ?>"  />
              <input name="checkcode" id="checkcode" class="myinput yzm" type="text" value="" placeholder="原手机验证码" onblur="checkcheckcode()"/>
              <span class="tips" id="checkcodetip"></span></div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 新绑定手机</div>
            <div class="opencard_input_box"><input name="newphone" id="newphone" class="myinput" type="text" value="" placeholder="请输入新手机号码"/>
              <input name="phonecode" id="phonecode" class="myinput yzm" type="text" value="" placeholder="新手机验证码" onblur="checkphonecode()"/>
              <input type="hidden" id="user_mobile_btn" name="user_mobile_btn" value="mobile_btn"  />
              <span class="tips" id="phonecodetip"></span><span class="tips" id="newphonetip"></span></div>
          </div>
          <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?>
              <input class="smsbut" type="button" id="mobile_btn" value="获取验证码"/>
              <span class="tips" id="mobile_btntip"></span></div>
        </div>
      </form>
      <div class="bound-phone"><b>注意：</b>为了保证您的账户安全，两个不同的验证码会分别发送到您的原绑定手机及新手机号上。如果您的原绑定手机号码无法正常接收短信，请与客服联系（<?=config::get('sitephone')?>）</div>
      <? } else { ?>
      <div class="order-prompt order-prompt2"><b>您还未绑定手机号</b><em>绑定手机号码后，可以用于登录、找回密码、接收资金变动信息等。</em></div>
      <h4>绑定手机号</h4>
      <form action="" method="post" onsubmit="return checkform()">
        <div class="opencard_box">
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 手机号码</div>
            <div class="opencard_input_box">
              <input id="userphone" name="userphone" class="myinput ph" type="text" value="<?=$this->member['userphone']?>" placeholder="请输入手机号码" />
              <input class="smsbut" type="button" id="bind_mobile_btn" value="获取验证码"  />
              <input type="hidden" id="resendtime" name="resendtime" value="<?=120-(time()-$this->member['mtime']); ?>"  />
              <input type="hidden" id="user_mobile_btn" name="user_mobile_btn" value="bind_mobile_btn"  />
              <span class="tips" id="userphonetip"></span></div>
          </div>
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 验 证 码</div>
            <div class="opencard_input_box"><input name="checkcode" id="checkcode" class="myinput ph" type="text" value="" onblur="checkcheckcode()" placeholder="手机接收到的验证码" />
              <span class="tips" id="checkcodetip"></span></span>
            </div>
          </div>
          <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?></div>
        </div>
      </form>
      <? } ?>
      <? } ?>

      <!-- 账户设置=地址管理 -->
        <? if($_GET['type']=='address') { ?>
          <!-- <? if(!$this->member['is_admin']) { ?> -->
            <div class="track_title">
              <a href="<?=Purl("?mod=member&act=user&type=address&method=list"); ?>" class="<?=$_GET['method']=='list' ? 'menushow' : 'menu'; ?>">地址管理</a>
              <a href="<?=Purl("?mod=member&act=user&type=address&method=add"); ?>" class="<?=$_GET['method']=='add' ? 'menushow' : 'menu'; ?>">新增收件地址</a>
            </div>
            <? if($_GET['method']=='list') { ?>
            <div class="member_mian">
              <table class="sheet">
                <tr>
                  <th>收件人</th>
                  <th>地址</th>
                  <th>电话</th>
                  <th>是否默认</th>
                  <th>操作</th>
                </tr>
                <? if(is_array($this->record)) { foreach($this->record as $value) { ?>                <tr class="mybg" id="remove_<?=$value['id']?>">
                  <td width="150"><?=$value['name']?></td>
                  <td><?=$value['address']?></td>
                  <td><?=$value['mobile']?></td>
                  <td><?=$value['is_default']?></td>
                  <td><a href="javascript:listTable.addressRemove('<?=$value['id']?>','确定要删除该地址吗');">删除</a>
                  <a href="<?=Purl("?mod=member&act=user&type=address&method=add&id=".$value['id']); ?>">编辑</a></td>
                </tr>
                <? } } ?>              </table>
              <? if(!is_array($this->record)) { ?>
              <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
              <? } ?>
              <? if($this->newpage) { ?>
              <div class="pages"><?=$this->newpage?></div>
              <? } ?>
            </div>
            <? } ?>
            <? if($_GET['method']=='add') { ?>
            <form action="" method="POST" onsubmit="return checkform()">
              <div class="opencard_box">
                <div class="opencard_h">
                  <div class="opencard_text"><span class="text_x_12px">*</span> 收件人</div>
                  <div class="opencard_input_box">
                    <input name="name" class="myinput" type="text" value="<?=$this->detail['name']?>"/>
                  </div>
                </div>
                <div class="opencard_h">
                  <div class="opencard_text"><span class="text_x_12px">*</span> 联系方式</div>
                  <div class="opencard_input_box">
                    <input name="mobile" class="myinput" type="text" value="<?=$this->detail['mobile']?>"/>
                  </div>
                </div>
                <div class="opencard_h">
                  <div class="opencard_text"><span class="text_x_12px">*</span> 联系地址</div>
                  <div class="opencard_input_box">
                    <input name="address" class="myinput" type="text" value="<?=$this->detail['address']?>" />
                  </div>
                </div>
                <div class="opencard_h">
                  <div class="opencard_text"><span class="text_x_12px">*</span> 是否默认</div>
                  <div class="opencard_input_box">
                    是<input name="is_default" type="radio" value="1" <? if($this->detail[is_default] == 1) { ?>checked<? } ?> />
                    否<input name="is_default" type="radio" value="0" <? if($this->detail[is_default] == 0) { ?>checked<? } ?> />
                  </div>
                </div>
                <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?></div>
              </div>
            </form>
            <? } ?>
          <!-- <? } else { ?> -->
          <div class="no_info"><span class="no_info_ico"></span>管理员股东不需要设置地址</div>
          <!-- <? } ?> -->
        <? } ?>
      <!-- end 账户设置=地址管理 -->

      <!-- 账户设置=银行卡 -->
        <? if($_GET['type']=='bankinfo') { ?>
          <div class="track_title">
            <a href="<?=Purl("?mod=member&act=user&type=bankinfo&method=list"); ?>" class="<?=$_GET['method']=='list' ? 'menushow' : 'menu'; ?>">银行卡管理</a>
            <a href="<?=Purl("?mod=member&act=user&type=bankinfo&method=add"); ?>" class="<?=$_GET['method']=='add' ? 'menushow' : 'menu'; ?>">新增银行卡</a>
          </div>
          <? if($_GET['method']=='list') { ?>
            <div class="member_mian">
              <table class="sheet">
                <tr>
                  <th>开户银行</th>
                  <th>银行卡号</th>
                  <th>开户地址</th>
                  <th>是否默认</th>
                  <th>操作</th>
                </tr>
                <? if(is_array($this->record)) { foreach($this->record as $value) { ?>                <tr class="mybg" id="remove_<?=$value['id']?>">
                  <td width="150"><?=$value['bankname']?></td>
                  <td><?=$value['bankcard']?></td>
                  <td><?=$value['bankadd']?></td>
                  <td><?=$value['is_default']?></td>
                  <td><a href="javascript:listTable.addressRemove('<?=$value['id']?>','确定要删除该地址吗');">删除</a>
                  <a href="<?=Purl("?mod=member&act=user&type=bankinfo&method=add&id=".$value['id']); ?>">编辑</a></td>
                </tr>
                <? } } ?>              </table>
              <? if(!is_array($this->record)) { ?>
              <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
              <? } ?>
              <? if($this->newpage) { ?>
              <div class="pages"><?=$this->newpage?></div>
              <? } ?>
            </div>
          <? } ?>
          <? if($_GET['method']=='add') { ?>
          <form action="" method="POST" onsubmit="return checkform()">
            <div class="opencard_box">
              <div class="opencard_h">
                <div class="opencard_text"><span class="text_x_12px">*</span> 开户银行</div>
                <div class="opencard_input_box">
                  <input name="bankname" class="myinput" type="text" value="<?=$this->detail['bankname']?>"/>
                </div>
              </div>
              <div class="opencard_h">
                <div class="opencard_text"><span class="text_x_12px">*</span> 银行卡号</div>
                <div class="opencard_input_box">
                  <input name="bankcard" class="myinput" type="text" value="<?=$this->detail['bankcard']?>"/>
                </div>
              </div>
              <div class="opencard_h">
                <div class="opencard_text"><span class="text_x_12px">*</span> 开户地址</div>
                <div class="opencard_input_box">
                  <input name="bankadd" class="myinput" type="text" value="<?=$this->detail['bankadd']?>" />
                </div>
              </div>
              <div class="opencard_h">
                <div class="opencard_text"><span class="text_x_12px">*</span> 是否默认</div>
                <div class="opencard_input_box">
                  是<input name="is_default" type="radio" value="1" <? if($this->detail[is_default] == 1) { ?>checked<? } ?> />
                  否<input name="is_default" type="radio" value="0" <? if($this->detail[is_default] == 0) { ?>checked<? } ?> />
                </div>
              </div>
              <div class="opencard_button_box"><?=config::form('opcardbutton','确  定','submit');?></div>
            </div>
          </form>
          <? } ?>
        <? } ?>
      <!-- end 账户设置=地址管理 -->
    </div>
  </div>
</div>
<? include template('member_footer','default/member'); ?>
