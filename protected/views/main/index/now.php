<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-27
 * Time: 下午4:56
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="trymain fn-clear">
    <div class="left">
      <div class="trying-products">
        <div class="thd">正在进行的试用</div>
        <div class="tbd">
            <?php if(!empty($itemList)) : ?>
                <?php   foreach($itemList as $item) :?>
                    <?php $this->renderPartial('////common/singleItemBlock', array('item'=>$item)); ?>
                <?php   endforeach; ?>
            <?php endif; ?>
        </div>
          <div class="p-pagination">
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
          </div>
      </div>
    </div>
    <?php $this->renderPartial("////common/sidebar"); ?>
  </div>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/dayCount.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/login.js"></script>
