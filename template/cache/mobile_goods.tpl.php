<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('mobile_header','default/mobile'); ?>
<div id="main">
  <div class="left">
<? include template('mobile_left','default/mobile'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <? if($_GET['type']=='order') { ?>
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
                    <th class="cell-order-total">订单金额</th>
                    <th class="cell-order-actions">操作</th>
                  </tr>
                </thead>
                <tbody>
                <? $i=0; ?>                <? if(is_array($this->order['goods'])) { foreach($this->order['goods'] as $val) { ?>                <? $shop = $this->getgoods(1,"goods_id='".$val['goods_id']."'"); ?>                  <tr>
                    <td class="cell-order-goods">
                        <div class="order-goods-info"><?=$val['name']?></div>
                        <div class="order-goods-amount">x <?=$val['number']?>/箱</div>
                        <div class="order-goods-price"><?=$val['money']?>元</div>
                    </td>
                    <? if($i==0) { ?>
                    <td rowspan="<?=count($this->order['goods']); ?>"><?=$this->order['money']?>元</td>
                    <td rowspan="<?=count($this->order['goods']); ?>" class="cell-order-actions">
                    <span id="check_user_<?=$this->order['id']?>" price="<?=$this->order['price']?>"><?=order_check_user($this->order); ?></span></td>
                    <? } ?>
                  </tr>
                  <? $i++; ?>                <? } } ?>                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="order-delivery-address clearfix">
            <div class="order-text-section-l">
              <h4>关联账号信息 </h4>
              <table class="order-text-table">
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

            <div class="order-text-section-l">
              <h4>支付账号信息 </h4>
              <table class="order-text-table">
                <tr>
                  <th>账号：</th>
                  <td><?=$this->order['delivery']['name']?></td>
                </tr>
                <tr>
                  <th>开户行：</th>
                  <td><?=$this->order['delivery']['address']?></td>
                </tr>
                <tr>
                  <th>账号姓名：</th>
                  <td><?=$this->order['delivery']['mobile']?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
       <? } else { ?>
       <div class="track_title"> 
        <a href="<?=Purl(mobilepre(1)."&type=order"); ?>" class="<?=!$_GET['method'] ? 'menushow' : 'menu'; ?>">全部订单</a> 
        <a href="<?=Purl(mobilepre(1)."&type=order&method=nopay"); ?>" class="<?=$_GET['method']=='nopay' ? 'menushow' : 'menu'; ?>">待付款订单</a> 
        <a href="<?=Purl(mobilepre(1)."&type=order&method=yespay"); ?>" class="<?=$_GET['method']=='yespay' ? 'menushow' : 'menu'; ?>">待发货订单</a> 
        <a href="<?=Purl(mobilepre(1)."&type=order&method=yessend"); ?>" class="<?=$_GET['method']=='yessend' ? 'menushow' : 'menu'; ?>">已发货订单</a> 
        <a href="<?=Purl(mobilepre(1)."&type=order&method=yesdeal"); ?>" class="<?=$_GET['method']=='yesdeal' ? 'menushow' : 'menu'; ?>">已成交订单</a> 
       </div>
       <div class="mobile_mian">
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
            <th>目前状态</th>
          </tr>
          <? if(is_array($this->order)) { foreach($this->order as $value) { ?>          <tbody id="remove_<?=$value['id']?>">
          <tr class="mybg">
            <td width="12%"><?=$value['orderid']?></td>
            <td class="order-delivery-table" style="width:40%">
              <? if(is_array($value['goods'])) { foreach($value['goods'] as $val) { ?>              <?=$val['goodid']?>
              <? $shop = $this->getgoods(1,"goods_id='".$val['goodid']."'"); ?>               <div class="order-goods-info" style="padding-top:0;padding-bottom:0;"><?=$shop['goods_name']?></div>
               <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$val['price']?>元</div>
               <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$val['number']?></div>
               <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$val['money']?>元</div>
               <div style="clear:both;"></div>
              <? } } ?>            </td>
            <td width="10%" class="red">&yen;<?=$value['money']?></td>
            <td width="10%" class="red">&yen;<?=$value['price']?></td>
            <td width="10%"><?=$value['addtime']?></td>
            <td width="12%" style="line-height:24px;padding:10px 0;"><span id="check_user_<?=$value['id']?>"  price="<?=$value['price']?>"><?=order_check_user($value); ?></span>
            <br /><a href="<?=Purl("?mod=mobile&act=goods&type=order&id=".$value['id']); ?>">订单详情</a></td>
          </tr>
          </tbody>
          <? } } ?>        </table>
        <? if(!is_array($this->order)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
       </div>
       <? } ?>
      <? } ?>
      <? if($_GET['type']=='list') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">我的会员</div>
      </div>
      <div class="mobile_mian">
        <div class="info_bg">
          <div class="info_text">产品统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录</div>
        </div>
        <form method="post"  name="goodsfrom" id="goodsfrom" action="" onsubmit="return checkform()">
        <table class="sheet table">
          <tr>
            <th></th>
            <th>产品编号</th>
            <th>产品名称</th>
            <th>产品价格</th>
            <th>代理价格</th>
            <!--<th>剩余库存</th>-->
            <th>单位换算</th>
            <th>每箱价格</th>
          </tr>
          <? if(is_array($this->record)) { foreach($this->record as $value) { ?>          <tr class="mybg">
            <td><a href="javascript:;" onClick="showDetail('<?=$value['goods_id']?>');">^</a></td>
            <td><?=$value['goods_id']?></td>
            <td><?=$value['goods_name']?></td>
            <td class="red">&yen; <?=$value['shop_price']?>/件</td>
             <td class="red">&yen; <?=$value['agent_price']?>/件</td>
            <td><?=$value['unit_rate']?>件/箱</span></td>
             <td class="red">&yen; <span id="price_<?=$value['goods_id']?>"><?=$value['price']?></span></td>
          </tr>
         
          <tr class="detail_<?=$value['goods_id']?>"  style="display:none;" >
            <tbody>
              <tr>
                <th></th> 
                <th>代理级别</th> 
                <th>返点</th>
                <th>提成</th>
                <!--<th>剩余库存</th>-->
                <th>分红</th>
                <th>起购量</th>
                <th>价格共计</th>
              </tr>
              <? if(is_array($value['detail'])) { foreach($value['detail'] as $k=>$v) { ?>              <tr class="one_detail"  onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                <td><input type="checkbox" class="check" name="chkSku[<?=$value['goods_id']?>][<?=$v['groupid']?>]" onClick="get_price();"/></td>
                <td class="center"><?=$v['groupname']?></td>
                <td><?=$v['rebate']?>元/箱</td>
                <td><?=$v['bonus']?>元/箱</td>
                <td><?=$v['share_money']?>元/箱</td>
                <td>          
                  <div class="change-goods-num clearfix changeGoodsNum" data-value ="<?=$v['minimum']?>">
                      <a href="javascript:_number(-1,<?=$value['goods_id']?>,<?=$v['groupid']?>,<?=$v['minimum']?>);">
                      <span class="icon-common icon-common-negative"></span>
                      </a>
                      <input tyep="text" name="number[<?=$value['goods_id']?>][<?=$v['groupid']?>]" value="<?=$v['minimum']?>" onblur="return _input(this,'<?=$value['goods_id']?>,<?=$v['groupid']?>');" class="goods-num" id="number_<?=$value['goods_id']?>_<?=$v['groupid']?>">
                      <a href="javascript:_number(1,<?=$value['goods_id']?>,<?=$v['groupid']?>,<?=$v['minimum']?>);"><span class="icon-common icon-common-add"></span></a>箱
                   </div>
                </td>
                <td class="red">&yen; <span id="price_<?=$value['goods_id']?>_<?=$v['groupid']?>" class="price_<?=$value['goods_id']?> _price_"><?=$v['allprice']?></span></td>
              </tr>
              <? } } ?>            </tbody>

          </tr> 
          
          <? } } ?>        </table>
        <div class="shop-cart-count">
          <div class="shop-cart-total">
            <p class="total-price">总计金额：<span><strong id='price'>0.00</strong>元</span></p>
          </div>
        </div>  
        <?=config::form('shop-cart-btns','现在去结账','submit','','class=\'shop-cart-btns\'');?>
        <div class="shop-cart-btns nobtns">暂不订购了</div>
       </form>
        <? if(!is_array($this->record)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
      </div>
      <? } ?>
    </div>
  </div>
</div>
</div>
<? include template('mobile_footer','default/mobile'); ?>
