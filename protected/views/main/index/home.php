<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-27
 * Time: 下午4:24
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="trymain fn-clear">
    <div class="left">
        <div class="foucs">
            <div class="pic">
                <?php
                $count = 0;
                if(!empty($flashContent)) :
                    foreach($flashContent as $flash) :
                        ?>
                        <a href="<?php echo $flash->getAttribute("media_url");?>" target="_blank" <?php if($count++===0) :?>class="current"<?php endif;?> ><img src="<?php echo $flash->getAttribute("media_photo");?>" width="700" height="280" alt="标题"/></a>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>
            <ul class="trigger"><li class="current">1</li><li>2</li><li>3</li><li>4</li><li>5</li></ul>
            <span class="l-t"></span><span class="r-t"></span> <span class="l-b"></span> <span class="r-b"></span></div>
        <div class="trying-products">
            <div class="thd">正在进行的试用</div>
            <div class="tbd">
                <?php if(!empty($itemList)) : ?>
                    <?php   foreach($itemList as $item) :?>
                        <?php $this->renderPartial('////common/singleItemBlock', array('item'=>$item)); ?>
                    <?php   endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('////common/sidebar'); ?>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/dayCount.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/login.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/js/jquery.soChange-min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $('.foucs .pic a').soChange({
            thumbObj:$('.foucs .trigger li'),
            thumbNowClass:'current',
            thumbOverEvent:true,
            autoChange:true,
            overStop:true,
            slideTime:10,
            changeTime:5000,
            delayTime:300
        });
    })
</script>
