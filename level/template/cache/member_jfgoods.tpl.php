<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
  <div class="left">
<? include template('member_left','default/member'); ?>
</div>
  <div class="right">
  <!-- 购买订单 -->
    <div class="opencard_main">

    <!-- 代理产品 -->
    <? if($_GET['type']=='list') { ?>
      <? if(!$this->member['is_admin']) { ?>
        <div class="opencards_title">
          <div class="opencards_title_b">我的会员</div>
        </div>
        <div class="member_mian">
          <div class="info_bg">
            <? if($this->member['usergroup'][sort]>1) { ?>
            <div class="info_text">当前剩余库存：
                <b class="text_red_line"><?=$this->member['store']?></b> 箱
                <input type="hidden" name="store" value="<?=$this->member['store']?>">
            </div>
            <? } ?>
          </div>
          <form method="post"  name="goodsfrom" id="goodsfrom" action="" onsubmit="return checkform()">
            <table class="sheet table">
              <tr>
                <th>产品编号</th>
                <th>产品名称</th>
                <th>产品所需积分</th>
              <!--   <th>代理级别</th>  -->
               <!--  <th>单位换算</th>
                <th>招商返点</th>
                <th>提成</th>
                <th>分红</th> -->
                <th>订购量</th>
              <!--   <th>抵扣提成</th>
                <? if($this->record[wei_rate]) { ?>
                <th>剩余比例</th>
                <? } ?>
 -->             <th>所需积分</th>
              </tr>
              <tr class="mybg">
                <td><?=$this->record['goods_id']?></td>
                <td><?=$this->record['goods_name']?></td>
                <td class="red">&yen; <?=$this->record['agent_price']?>/件</td>
               <!--  <td><?=$this->record['unit_rate']?>件/箱</span></td>
                <td><?=$this->record['rebate']?>元/箱</td>
                <td><?=$this->record['bonus']?>元/箱</td>
                <td><?=$this->record['share_money']?>元/箱</td> -->
                <td>          
                  <div class="change-goods-num clearfix changeGoodsNum info_<?=$this->record['goods_id']?>" data-value="<?=$this->record['all_money']?>" data-bonus ="<?=$this->record['bonus']?>">
                      <a href="javascript:_number(-1,<?=$this->record['goods_id']?>,<?=$this->record['minimum']?>);">
                      <span class="icon-common icon-common-negative"></span>
                      </a>
                      <input type="hidden" name="goods_id" value="<?=$this->record['goods_id']?>" style="display: none;">
                      <input tyep="text" name="number" value="<?=$this->record['minimum']?>" onblur="return _input(this,'<?=$this->record['goods_id']?>');" class="goods-num" id="number_<?=$this->record['goods_id']?>">
                      <a href="javascript:_number(1,<?=$this->record['goods_id']?>,<?=$this->record['minimum']?>);"><span class="icon-common icon-common-add"></span></a>个
                   </div>
                </td>
               <!--  <td class="red">&yen; <span id='zcprice'><?=$this->record['all_bonus']?></span></td>
                <? if($this->record[wei_rate]) { ?>
                <td class="red"> <span><?=$this->record['wei_rate']?></span>%</td>
                <? } ?> -->
               <!--  <td class="red">&yen; <span id='price'><?=$this->record['all_money']?></span></td> -->
              </tr>
            </table>
            <div class="shop-cart-count">
              <div class="shop-cart-total">
                  <input name="jfprice" value="" type="hidden" />
                <p class="total-price">应付积分：<span><strong id='jfprice'><?=$this->record['re_money']?></strong>分</span></p>
              </div>
            </div>  
            <?=config::form('shop-cart-btns','现在去结账','submit','','class=\'shop-cart-btns\'');?>
          </form>
          <? if(!is_array($this->record)) { ?>
          <div class="no_info"><span class="no_info_ico"></span>暂无产品！</div>
          <? } ?>
        </div>
      <? } else { ?>
        <div class="no_info"><span class="no_info_ico"></span>管理员股东无需订货！</div>
      <? } ?>
    <? } ?>
    <!-- 代理产品结束 -->

    <!-- 购买订单结束 -->
    <? if($_GET['type']=='order') { ?> 
      <? if(!$this->member['is_admin']) { ?>
        <!-- 详情页 -->
        <? if($_GET['id']) { ?>
          <div class="xm-box uc-box">
            <div class="hd">
              <h3 class="title">订单号：<?=$this->order['orderid']?></h3>
            </div>
            <div class="bd">
              <div class="order-delivery-items">
                <div class="order-delivery-item">
                  <table class="order-delivery-table">
                    <thead>
                      <tr>
                        <th class="cell-order-goods">商品信息</th>
                        <th class="cell-order-total">折后金额</th>
                      </tr>
                    </thead>
                    <tbody>
                    <? $shop = $this->getgoods(1,"goods_id='".$this->order['goods_id']."'"); ?>                      <tr>
                        <td class="cell-order-goods">
                          <div class="order-goods-info"><?=$this->order['good_name']?></div>
                          <div class="order-goods-price"><?=$shop['agent_price']?>元</div>
                          <div class="order-goods-amount">x<?=$shop['unit_rate']?>件/箱</div>
                          <div class="order-goods-amount">x <?=$this->order['num']?>/箱</div>
                          <? if($this->member['usergroup']['buy_way']) { ?>
                          <div class="order-goods-amount">x <?=$this->order['rate']?>%</div>
                          <div class="order-goods-amount">- <?=$this->order['bonus']?></div>
                          <? } ?>
                        </td>
                        <td rowspan="<?=count($this->order['goods']); ?>">
                          <? if($this->member['usergroup']['buy_way']) { ?>
                            <?=$this->order['re_money']?>元
                          <? } else { ?>
                            <?=$this->order['yi_money']?>元
                          <? } ?>
                        </td>
                      </tr>                 
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="order-delivery-address clearfix">
                <div class="order-text-section-l">
                  <h4>关联账号信息1 </h4>
                  <table id="account_information">
                    <tr>
                      <th>会员账号：</th>
                      <td><?=$this->order['delivery']['name']?></td>
                    </tr>
                    <tr>
                      <th>会员昵称：</th>
                      <td><?=$this->order['delivery']['address']?></td>
                    </tr>
                    <tr>
                      <th>联系电话：</th>
                      <td><?=$this->order['delivery']['mobile']?></td>
                    </tr>
                  </table>
                </div>

                <!-- <? if(!empty($this->paytype) ) { ?> -->
                <div class="order-text-section-l">
                  <h4>支付账号信息</h4>
                  <table>
                    <tr>
                      <th>类型</th>
                      <th>账号</th>
                      <th>账户</th>
                      <th>地址</th>
                    </tr>
                    <? if(is_array($this->paytype)) { foreach($this->paytype as $val) { ?>                    <tr>
                      <td><?=$val['type']?></td>
                      <td><?=$val['payno']?></td>
                      <td><?=$val['payname']?></td>
                      <td><?=$val['bankadd']?></td>
                    </tr>
                    <? } } ?> 
                  </table>
                </div>
                <div class="order-text-section-l">
                  <? if($this->order['checked'] == 0) { ?>
                      <form method="post" name="shopform" id="shopform" action="" onsubmit="return checkForm()" enctype="multipart/form-data">
                          <div id="table_box_3"><br />
                            <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
                              <tr style="border:none;">
                                  <th style="background:none;border:0; text-align:center;display: block;background: #997F41;color: #fff;width: 104px;" align="right";>上传凭证：</th>
                                  <td style="background:none; border:0;display: block;position: absolute;top: 185px;left: 5px"><input class="middle" name="" type="hidden" />
                                  <div class="upload_btn"><span id="upload"></span></div>
                                  <label><span id="upload_tip">图片不超过2MB</span></label></td>
                              </tr>
                            </table>
                            <div id="uploadPic">
                              <ul id="uploadlist" style=" height:90px; overflow:hidden;">
                                <? if(is_array($this->add['goods_thumb'])) { foreach($this->add['goods_thumb'] as $k=>$v) { ?>                                <? $cover = $k==0 ? "凭证" : "&nbsp;"; ?>                                <li>
                                  <div><img src="<?=$v?>" /></div>
                                  <a class="delete" href="javascript:void(0);"></a>
                                  <input type="hidden" name="agent_img[]" id="thumb_list" value="<?=$v?>" class="thumb_list" />
                                  <!-- <input type="hidden" name="huiyuan_img[]" id="thumb_list" value="<?=$v?>" class="thumb_list" /> -->
                                </li>
                                <? } } ?>                              </ul>
                              <div style="clear:both;"></div>
                            </div>
                        </div>
                          <?=config::form('button','提交','submit','','class=\'button\'');?>
                      </form>
                  <? } else { ?>         
                      <div>
                      <h4 style="display: block;width: 84px;margin-bottom: 10px;">支付凭证：</h4>
                      <img src="<?=$this->order['agent_img']?>" style="width:355px;" />
                      <!-- <img src="<?=$this->order['agent_img']?>" style="width:355px;" /> -->
                      </div>
                  <? } ?>
                </div>
                <!-- <? } else { ?> -->
                <div class="no_info"><span class="no_info_ico"></span> 联系上线获取支付信息！</div>
                <!-- <? } ?> -->
              </div>
            </div>
          </div>

          <script type="text/javascript">
            $(window).load(pageInit);
            function pageInit(){
              var uploadurl='<?=Purl('tools_upload')?>',ext='<?=$this->ftype?>',size='<?=$this->fsize?>',count='<?=$this->fcount?>',useget=0,params={}//默认值
              ext = ext.match(/([^\(]+?)\s*\(\s*([^\)]+?)\s*\)/i);
              swfu = new SWFUpload({
                flash_url : "<?=config::get('sitepath')?>app/swfupload/swfupload.swf",
                prevent_swf_caching : false,//是否缓存SWF文件
                upload_url: uploadurl, //上传文件
                file_post_name : "imgFile",
                post_params:  {'mychatpath':'goods','imgcut':'1'},//随文件上传一同向上传接收程序提交的Post数据
                use_query_string : false,//是否用GET方式发送参数
                file_types : ext[2],//文件格式限制
                file_types_description : ext[1],//文件格式描述
                file_size_limit : size, //文件大小限制
                file_queue_limit:0,//上传队列总数
                custom_settings : {
                  test : "aaa"
                },
                file_queued_handler : fileQueued,//添加成功
                file_queue_error_handler : fileQueueError,//添加失败
                file_dialog_complete_handler : fileDialogComplete,
                upload_start_handler : uploadStart,//上传开始
                upload_progress_handler : uploadProgress,//上传进度
                upload_error_handler : uploadError,//上传失败
                upload_success_handler : uploadSuccess,//上传成功
                upload_complete_handler : uploadComplete,//上传结束
                button_placeholder_id : "upload",
                button_width: 30,
                button_height: 21,
                button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
                button_cursor: SWFUpload.CURSOR.HAND,
                button_text : '上传',
                button_text_style: ".theFont { font-size: 12px; }",
                button_text_left_padding: 0,
                button_text_top_padding: 0,
                debug: false
              });
            }
          </script>
        <? } ?>
        <!-- 详情页结束 -->

        <!-- 列表页 -->
        <? if(!$_GET['id']) { ?>
          <div class="track_title"> 
            <a href="<?=Purl(memberpre(1)."&type=order"); ?>" class="<?=!$_GET['method'] ? 'menushow' : 'menu'; ?>">全部订单</a> 
            <a href="<?=Purl(memberpre(1)."&type=order&method=nopay"); ?>" class="<?=$_GET['method']=='nopay' ? 'menushow' : 'menu'; ?>">待付款订单</a> 
            <a href="<?=Purl(memberpre(1)."&type=order&method=yespay"); ?>" class="<?=$_GET['method']=='yespay' ? 'menushow' : 'menu'; ?>">待发货订单</a> 
            <a href="<?=Purl(memberpre(1)."&type=order&method=yessend"); ?>" class="<?=$_GET['method']=='yessend' ? 'menushow' : 'menu'; ?>">已成交订单</a> 
          </div>
          <div class="member_mian">
            <form method="GET" action="">
              <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
              <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
              <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
              <input type="hidden" name="typeid" id="typeid" value="<?=$_GET['typeid']?>" />
              <div class="ex_find">
                <div class="ex_text">订单编号</div>
                <div class="log_input_box">
                  <input name="orderid" type="text" class="log_input" value="<?=$_GET['orderid']?>" />
                </div>
                <div class="ex_text">查询日期</div>
                <div class="ex_time_box"><?=config::form('time',$this->t['str'],'datas');?></div>
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
                <th>订单编号</th>
                <th>产品列表(名称,数量)</th>
                <th>订单总额</th>
                <th>折后总额</th>
                <th>付款凭证</th>
                <th>订购时间</th>
                <th>目前状态</th>
              </tr>
              <? if(is_array($this->order)) { foreach($this->order as $value) { ?>              <tbody id="remove_<?=$value['id']?>">
              <tr class="mybg">
                <td width="12%"><?=$value['orderid']?></td>
                <td class="order-delivery-table" style="width:40%">
                  <? $shop = $this->getgoods(1,"goods_id='".$value['goods_id']."'"); ?>                   <div class="order-goods-info" style="padding-top:0;padding-bottom:0;"><?=$shop['goods_name']?></div>
                   <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$shop['agent_price']?>元</div>
                   <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$shop['unit_rate']?>个/箱</div>
                   <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$value['num']?>箱</div>
                   <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$value['rate']?>%</div>
                   <div style="clear:both;"></div>
                </td>
                <td width="10%" class="red">&yen;<?=$value['money']?></td>
                <td width="10%" class="red">&yen;<?=$value['re_money']?></td>
                <? if($value['agent_img']) { ?>
                <td class="red"> <img style="width: 30px;height: 30px;" src="<?=$value['agent_img']?>"  /></td>
                <? } else { ?>
                <td class="red"> 未付款</td>
                <? } ?>
                <td width="10%"><?=$value['addtime']?></td>
                <td width="12%" style="line-height:24px;padding:10px 0;">
                  <span id="check_user_<?=$value['id']?>"  price="<?=$value['price']?>"><?=order_check_user($value); ?></span><br />
                  <? if(!$value['checked']) { ?>
                    <a href="<?=Purl("?mod=member&act=goods&type=order&id=".$value['id']); ?>" style="background: #997f41;color: #fff;padding: 5px 10px;border-radius: 3px;">确认支付</a>&nbsp;
                    <a style="background: none;color: #997F41;padding: 5px 10px;border: 1px solid #997F41;border-radius: 3px;" href="javascript:cancelorder('<?=$value['id']?>');">取消订单</a>
                  <? } ?>
                  <? if($value['checked']=='5') { ?>
                    <?=$value['express']?>：<?=$value['expressnumber']?>
                  <? } ?>    
                </td>
              </tr>
              </tbody>
              <? } } ?>            </table>
            <? if(!is_array($this->order)) { ?>
            <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
            <? } ?>
            <? if($this->newpage) { ?>
            <div class="pages"><?=$this->newpage?></div>
            <? } ?>
          </div>
        <? } ?>
        <!-- 列表页结束 -->
      <? } else { ?>
      <div class="no_info"><span class="no_info_ico"></span>管理员股东无需订货！</div>
      <? } ?>
    <? } ?>
    <!-- 购买订单结束 -->




    <!-- 一级订单 -->
    <? if($_GET['type']=='sendorder') { ?>
    <? if(!$_GET['id']) { ?>
     <div class="track_title"> 
      <a href="<?=Purl(memberpre(1)."&type=sendorder"); ?>" class="<?=!$_GET['method'] ? 'menushow' : 'menu'; ?>">全部订单</a> 
      <a href="<?=Purl(memberpre(1)."&type=sendorder&method=nopay"); ?>" class="<?=$_GET['method']=='nopay' ? 'menushow' : 'menu'; ?>">待付款订单</a> 
      <a href="<?=Purl(memberpre(1)."&type=sendorder&method=yespay"); ?>" class="<?=$_GET['method']=='yespay' ? 'menushow' : 'menu'; ?>">待发货订单</a> 
      <a href="<?=Purl(memberpre(1)."&type=sendorder&method=yessend"); ?>" class="<?=$_GET['method']=='yessend' ? 'menushow' : 'menu'; ?>">已成交订单</a> 

     </div>
     <div class="member_mian">
      <form method="GET" action="">
        <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
        <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
        <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
        <input type="hidden" name="typeid" id="typeid" value="<?=$_GET['typeid']?>" />
        <div class="ex_find">
          <div class="ex_text">订单编号</div>
          <div class="log_input_box">
            <input name="orderid" type="text" class="log_input" value="<?=$_GET['orderid']?>" />
          </div>
          <div class="ex_text">查询日期</div>
          <div class="ex_time_box"><?=config::form('time',$this->t['str'],'datas');?></div>
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
          <th>订单编号</th>
          <th>产品列表(名称，单价，数量，小计)</th>
          <th>订单总额</th>
          <th>折后总额</th>
          <th>订购时间</th>
          <th>支付凭证</th>
          <th>目前状态</th>
        </tr>
        <? if(is_array($this->order)) { foreach($this->order as $value) { ?>        <tbody id="remove_<?=$value['id']?>">
        <tr class="mybg">

          <td width="12%"><?=$value['orderid']?></td>
          <td class="order-delivery-table" style="width:40%">
            <? $shop = $this->getgoods(1,"goods_id='".$value['goods_id']."'"); ?>             <div class="order-goods-info" style="padding-top:0;padding-bottom:0;"><?=$shop['goods_name']?></div>
             <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$shop['agent_price']?>元</div>
             <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$shop['unit_rate']?>个/箱</div>
             <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$value['num']?>箱</div>
             <? if($this->member['usergroup']['buy_way']) { ?>
               <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$value['rate']?>%</div>
             <? } ?>
             
             <div style="clear:both;"></div>
          </td>
          <td width="10%" class="red">&yen;
          <? if($this->member['usergroup']['buy_way']) { ?>
            <?=$value['money']?>元
          <? } else { ?>
            <?=$value['yi_money']?>元
          <? } ?>
          <td width="10%" class="red">&yen;
          <? if($this->member['usergroup']['buy_way']) { ?>
            <?=$value['re_money']?>元
          <? } else { ?>
            <?=$value['yi_money']?>元
          <? } ?>
          </td>

          <td width="10%"><?=$value['addtime']?></td>
          <? if($value['send_type'] == "admin") { ?>
          <td class="red"> <img style="width: 30px;height: 30px;" src="<?=$value['agent_img']?>"  /></td>
          <? } else { ?>
          <td class="red"> <img style="width: 30px;height: 30px;" src="<?=$value['huiyuan_img']?>"  /></td>
          <? } ?>
          <td width="12%" style="line-height:24px;padding:10px 0;">
          <? if($value['checked'] == 9 && empty($value['agent_img'])) { ?>
          下级已付款
          <a href="<?=Purl("?mod=member&act=goods&type=sendorder&id=".$value['id']); ?>">订单确认</a></td>
          <? } elseif($value['checked'] == 9 && $value['agent_img']) { ?>
            已付款
          <? } else { ?>
          <span id="check_user_<?=$value['id']?>"  price="<?=$value['price']?>"><?=sendorder_check_user($value); ?></span><br />
          <? } ?>
          <? if($value['checked']=='1' && $value['send_type']=='user') { ?>
            <br><input class="order-but order-but2 ordersend" type="button" orderid ="<?=$value['id']?>"   value="发货" />
          <? } ?> 
          <? if($value['num']>$this->member['store'] && $this->mumber['usergroup']['sort']>1) { ?>
              库存不足，系统不可发货。
          <? } ?>
        </tr>
        </tbody>
        <? } } ?>      </table>
      <? if(!is_array($this->order)) { ?>
      <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
      <? } ?>
      <? if($this->newpage) { ?>
      <div class="pages"><?=$this->newpage?></div>
      <? } ?>
     </div>
     <? } ?>
    <? } ?>


      <? if($_GET['id']) { ?>
         <div class="xm-box uc-box">
           <div class="hd">
             <h3 class="title">订单号：<?=$this->order['orderid']?></h3>
           </div>
           <div class="bd">
             <div class="order-delivery-items">
               <div class="order-delivery-item">
                 <table class="order-delivery-table">
                   <thead>
                     <tr>
                       <th class="cell-order-goods">商品信息</th>
                       <th class="cell-order-total">下级金额</th>
                       <th class="cell-order-total">订单金额</th>

                       <!-- <th class="cell-order-actions">操作</th> -->
                     </tr>
                   </thead>
                   <tbody>
                   <? $shop = $this->getgoods(1,"goods_id='".$this->order['goods_id']."'"); ?>                    <tr>
                      <td class="cell-order-goods">
                      <div class="order-goods-info"><?=$this->order['good_name']?></div>
                      <div class="order-goods-price"><?=$shop['agent_price']?>元</div>
                      <div class="order-goods-amount">x<?=$shop['unit_rate']?>件/箱</div>
                      <div class="order-goods-amount">x <?=$this->order['num']?>/箱</div>
                      <? if($this->member['usergroup']['buy_way']) { ?>
                        <div class="order-goods-amount">x <?=$this->order['rate']?>%</div>
                        <div class="order-goods-amount">- <?=$this->order['bonus']?></div>
                      <? } ?>

                     
                      </td>
                      <td rowspan="<?=count($this->order['goods']); ?>">
                        <?=$this->order['yi_money']?>元
                      </td>
                      <td rowspan="<?=count($this->order['goods']); ?>">
                        <? if($this->member['usergroup']['buy_way']) { ?>
                          <?=$this->order['re_money']?>元
                        <? } else { ?>
                        <?=$this->order['yi_money']?>元
                        <? } ?>
                      </td>
                    </tr>             
                   </tbody>
                 </table>
               </div>
             </div>
             <div class="order-delivery-address clearfix">
               <div class="order-text-section-l">
                 <h4>关联账号信息 </h4>
                 <table id="account_information">
                   <tr>
                     <th>会员账号：</th>
                     <td><?=$this->order['delivery']['name']?></td>
                   </tr>
                   <tr>
                     <th>会员昵称：</th>
                     <td><?=$this->order['delivery']['address']?></td>
                   </tr>
                   <tr>
                     <th>联系电话：</th>
                     <td><?=$this->order['delivery']['mobile']?></td>
                   </tr>
                 </table>
               </div>
              <? if($this->paytype) { ?>
               <div class="order-text-section-l">
                 <h4>支付账号信息</h4>
                 <table class="account_border">
                   <tr>
                     <th>类型</th>
                     <th>账号</th>
                     <th>账户</th>
                     <th>地址</th>
                   </tr>
                   <? if(is_array($this->paytype)) { foreach($this->paytype as $val) { ?>                   <tr>
                     <td><?=$val['type']?></td>
                     <td><?=$val['payno']?></td>
                     <td><?=$val['payname']?></td>
                     <td><?=$val['bankadd']?></td>
                   </tr>
                   <? } } ?> 
                 </table>
               </div>
               <div class="order-text-section-l">
                 <div>
                 <h4>支付凭证：</h4>
                 <img src="<?=$this->order['huiyuan_img']?>" style="width:355px;" />
                 <!-- <img src="<?=$this->order['huiyuan_img']?>" style="width:355px;" /> -->
                 </div>
                 <? if($this->order['agent_img']) { ?>
                 <div>
                 <h4>当前凭证：</h4>
                 <img src="<?=$this->order['agent_img']?>" style="width:355px;" />
                 </div>
                 <? } ?>            

                  <? if($this->order['checked'] == 9 and $this->member['usergroup']['sort']>1) { ?>
                   <form method="post" name="shopform" id="shopform" action="" onsubmit="return checkForm()" enctype="multipart/form-data">
                       <div id="table_box_3"><br />
                         <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
                           <tr style="border:none;">
                               <th style="background:none;border:0; text-align:center;display: block;background: #997F41;color: #fff;width: 104px;" align="right";>上传凭证：</th>
                               <td style="background:none; border:0;display: block;position: absolute;top: 185px;left: 5px"><input class="middle" name="" type="hidden" />
                               <div class="upload_btn"><span id="upload"></span></div>
                               <label><span id="upload_tip">图片不超过2MB</span></label></td>
                           </tr>
                         </table>
                         <div id="uploadPic">
                           <ul id="uploadlist" style=" height:90px; overflow:hidden;">
                             <? if(is_array($this->add['goods_thumb'])) { foreach($this->add['goods_thumb'] as $k=>$v) { ?>                             <? $cover = $k==0 ? "凭证" : "&nbsp;"; ?>                             <li>
                               <div><img src="<?=$v?>" /></div>
                               <a class="previous" href="javascript:void(0);"></a><span class="front-cover"><?=$cover?></span><a class="next" href="javascript:void(0);"></a><a class="delete" href="javascript:void(0);"></a>
                               <input type="hidden" name="huiyuan_img[]" id="thumb_list" value="<?=$v?>" class="thumb_list" />
                             </li>
                             <? } } ?>                           </ul>
                           <div style="clear:both;"></div>
                         </div>
                     </div>
                       <?=config::form('button','提交','submit','','class=\'button\'');?>
                   </form>
                  <? } elseif($this->order['checked'] == 9 and $this->member['usergroup']['sort']==1) { ?>
                  <form method="post" name="shopform" id="shopform" action=""  enctype="multipart/form-data">


                            凭证信息:
                            正确：<input type="radio" name="confirem" value="1" checked>
                            有误：<input type="radio" name="confirem" value="0">
   
                      <?=config::form('button','提交','submit','','class=\'button\'');?>
                  </form>
                  <? } ?>
               </div>
              <? } else { ?>
              <p>请先联系上家，设置支付信息！</p> 
              <? } ?>
             </div>
           </div>
         </div>
         <script type="text/javascript">
         $(window).load(pageInit);
         function pageInit(){
           var uploadurl='<?=Purl('tools_upload')?>',ext='<?=$this->ftype?>',size='<?=$this->fsize?>',count='<?=$this->fcount?>',useget=0,params={}//默认值
           ext = ext.match(/([^\(]+?)\s*\(\s*([^\)]+?)\s*\)/i);
           swfu = new SWFUpload({
             flash_url : "<?=config::get('sitepath')?>app/swfupload/swfupload.swf",
             prevent_swf_caching : false,//是否缓存SWF文件
             upload_url: uploadurl, //上传文件
             file_post_name : "imgFile",
             post_params:  {'mychatpath':'goods','imgcut':'1'},//随文件上传一同向上传接收程序提交的Post数据
             use_query_string : false,//是否用GET方式发送参数
             file_types : ext[2],//文件格式限制
             file_types_description : ext[1],//文件格式描述
             file_size_limit : size, //文件大小限制
             file_queue_limit:0,//上传队列总数
             custom_settings : {
               test : "aaa"
             },
             file_queued_handler : fileQueued,//添加成功
             file_queue_error_handler : fileQueueError,//添加失败
             file_dialog_complete_handler : fileDialogComplete,
             upload_start_handler : uploadStart,//上传开始
             upload_progress_handler : uploadProgress,//上传进度
             upload_error_handler : uploadError,//上传失败
             upload_success_handler : uploadSuccess,//上传成功
             upload_complete_handler : uploadComplete,//上传结束
             button_placeholder_id : "upload",
             button_width: 30,
             button_height: 21,
             button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
             button_cursor: SWFUpload.CURSOR.HAND,
             button_text : '上传',
             button_text_style: ".theFont { font-size: 12px; }",
             button_text_left_padding: 0,
             button_text_top_padding: 0,
             debug: false
           });
         }
         </script>
      <? } ?>

    </div>
  </div>
</div>
</div>
<? include template('member_footer','default/member'); ?>
