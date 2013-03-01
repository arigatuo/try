<?php
    $curItemName = $curItem->brand->getAttribute("brand_name")." ".$curItem->getAttribute("item_name") ." " .$curItem->getAttribute("item_prop");
?>
<div class="banner">
    <?php if(!empty($topPic)) :
                foreach($topPic as $pic) : ?>
                    <a href="<?php echo $pic->getAttribute('media_url');?>" target="_blank">
                        <img src="<?php echo $pic->getAttribute('media_photo');?>" width="980" height="200"
                             alt="<?php echo $pic->getAttribute("media_text");?>" />
                    </a>
    <?php       endforeach;
            endif; ?>
</div>
  <div class="trymain fn-clear">
    <div class="left">
      <div class="mod3 fn-clear">
        <h2 class="thd"><?php echo $curItemName; ?></h2>
        <div class="tbd fn-clear">
          <div class="pic"><img src="<?php echo $curItem->getAttribute("item_pic_middle");?>" width="302" height="302"
alt="<?php echo $curItemName;?>" /></div>
          <div class="txt">
            <div class="ysq"><strong><?php echo $curItem->getAttribute("item_apply_num_plus")+$curItem->getAttribute
            ("item_apply_num");?>
</strong>人已申请</div>
            <div class="suliang-guige">
              <div class="suliang">数量<strong><?php echo $curItem->getAttribute("item_piece");?>份</strong></div>
              <div class="guige">规格<strong><?php echo $curItem->getAttribute("item_prop");?></strong></div>
            </div>
            <form>
              <div class="txtarea-wrap">
                <div class="txtarea-thd">申请留言：</div>
                <textarea class="txtarea"></textarea>
              </div>
              <div class="apply-baogao fn-clear"><a href="<?php echo Yii::app()->createUrl("/main/Index/apply", array("item_id"=>$curItem->getAttribute("item_id")));?>" target="_blank" class="apply" title="我要申请">我要申请</a>
                  <a href="<?php echo Yii::app()->createUrl("/main/Index/Article",
                      array('item_id'=>$curItem->getAttribute("item_id")))?>" target="_blank"
                     class="baogao">提交报告</a></div>
            </form>
          </div>
        </div>
      </div>
      <div class="details">
        <div class="details-thd">详细介绍</div>
        <div class="details-tbd">
            <?php echo $curItem->getAttribute("item_intro");?>
        </div>
    </div>
          <?php if(!empty($selectedApply)) : ?>
            <dl class="successful-trial">
                <dt>试用成功名单 </dt>
                <?php
                foreach($selectedApply as $sApply) :
                    $sApplyUid = $sApply->getAttribute('user_id');
                    ?>
                    <dd>
                        <a href="javascript:void(0)">
                            <img src="<?php echo MyUcenter::getUserHeadByUid($sApplyUid) ?>"  width="80"  height="80" alt="<?php echo MyUcenter::getUsernameByUid($sApplyUid); ?>" />
                        </a>
                        <div class="title"><a href="javascript:void(0)" ><?php echo MyUcenter::getUsernameByUid($sApplyUid); ?></a></div>
                    </dd>
                <?php
                endforeach;
                ?>
            </dl>
          <?php endif; ?>
      <div class="comments">
        <div class="thd">用户留言</div>
        <div class="tbd">
            <?php
                if(!empty($curItemApply)) :
                    $noApply = false;
                    foreach($curItemApply as $apply) :
            ?>
          <div class="comments-list fn-clear">
            <div class="pic">
                <a href="javascript:void(0)"><img src="<?php echo MyUcenter::getUserHeadByUid ($apply->getAttribute("user_id"));?>"  width="80"   height="80" alt="<?php echo MyUcenter::getUsernameByUid($apply->getAttribute("user_id"));?>"  /></a>
              <div class="title">
                  <a href="javascript:void(0)"><?php echo MyUcenter::getUsernameByUid ($apply->getAttribute("user_id"))?></a>
              </div>
            </div>
            <div class="txt">
              <p class="des"><?php echo $apply->getAttribute("apply_text");?></p>
              <div class="time"><?php echo $apply->getAttribute("apply_time");?></div>
              <div class="arrow"></div>
            </div>
          </div>
            <?php
                    endforeach;
               else :
                   $noApply = True;
                   echo "暂无留言";
               endif;
            ?>
        </div>
      </div>
      <div class="p-pagination">
          <?php if(!$noApply) : ?>
        <div class="pagination-inner">
            <?php
            //分页
            $this->widget('CLinkPager', array(
                'header' => '',
                'firstPageLabel' => '首页',
                'lastPageLabel' => '尾页',
                'prevPageLabel' => '上一页',
                'nextPageLabel' => '下一页',
                'pages' => $page,
                'maxButtonCount' => 7,
                'cssFile' => false,
            ));
            ?>
        </div>
          <?php endif; ?>
      </div>

    </div>
    <div class="right">
      <div class="mod-user-login">
        <div class="thd"></div>
        <div class="tbd">
          <div class="user-login fn-clear">
            <ul class="user-login-left">
              <li class="mb fn-clear">
                <label for="username">账号：</label>
                <span>
                <input type="text" name="username" id="username" class="logkuang" />
                </span></li>
              <li class="fn-clear">
                <label for="pwd">密码：</label>
                <span>
                <input type="password" value="" name="pwd" id="pwd" class="logkuang" />
                </span> </li>
            </ul>
            <div class="user-login-right">
              <button type="submit"  class="submit"></button>
            </div>
          </div>
          <p class="user-tips"><a href="#" target="_blank" class="register">注册新用户</a><a href="#" target="_blank" class="forget">忘记密码</a></p>
          <div class="baidu-share">
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare fn-clear"> <a class="bds_qzone">QQ空间</a> <a class="bds_tsina">新浪微博</a> <a class="bds_tqq">腾讯微博</a> </div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
            <!-- Baidu Button END -->
            完成分享，可以增加你的中奖机会 </div>
        </div>
      </div>
      <a href="#" target="_blank" class="submitreports" title="提交试用报告">提交试用报告</a>
      <div class="trialreport">
        <div class="thd">最新试用报告</div>
        <ul class="tbd">
          <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li class="last"> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
        </ul>
      </div>
      <div class="trialules">
        <div class="thd">试用规则</div>
        <div class="tbd">
          <dl class="step-1">
            <dt>获得试用资格</dt>
            <dd>注册成为爱美妈妈网会员，即可获得试用资格。</dd>
          </dl>
          <dl  class="step-2">
            <dt>提交申请</dt>
            <dd>选择你希望尝试的商品，提交试用申请。</dd>
          </dl>
          <dl  class="step-3">
            <dt>获得试用</dt>
            <dd>你提交的试用申请获得批准后，我们将通过邮件通知你，并按你在申请试用时填写的资料，将试用装邮寄到你手中。</dd>
          </dl>
          <dl class="step-4">
            <dt>获得试用资格</dt>
            <dd>在规定时间内提交试用报告的网友将获得一定的金币奖励，否则将扣除一定金币，并暂停一个月试用装申请资格。</dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
