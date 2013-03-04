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
              <div class="apply-baogao fn-clear">
                  <a href="<?php echo Yii::app()->createUrl("/main/Index/apply", array("item_id"=>$curItem->getAttribute("item_id")));?>" class="apply" title="我要申请">我要申请</a>
                  <a href="<?php echo Yii::app()->createUrl("/main/Index/Article", array('item_id'=>$curItem->getAttribute("item_id")))?>"  class="baogao">提交报告</a>
              </div>
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
      <?php $this->renderPartial("////common/sidebar"); ?>
  </div>
</div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/login.js"></script>
