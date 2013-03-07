<?php
    /**
     * 用于同步试用装发布帖子
     */
?>
<style type="text/css">
    .item-s {overflow:hidden;zoom:1;}
    .item-s h3 { font-size:16px; font-family:'微软雅黑'; }
    .item-s h3 a { color:#FF3F9D }
    .item-s-num { padding:10px 0; }
    .item-s-num strong { font-weight:500; color:#ff3f9d }
    .item-s-pic { float:left; width:220px; margin-left:10px; display:inline; margin-right:26px; _margin-right:23px; }
    .item-s-pic img { border:1px solid #C4ADB3 }
    .item-s-txt { overflow:hidden; padding-top:15px; }
    .item-s-txt p { line-height:38px; }
    .item-s-txt p span { font-weight:700; }
    .item-s-txt .act-status { width:275px; padding-top:12px; border-top:1px dashed #FB429F }
    .item-s-txt .over { float:left; position:relative; margin:15px 40px 0 0; font-size:14px; font-weight:700; color:#F90600 }
    .item-s-txt .over .icon { position:absolute; right:-30px; top:-5px; width:22px; height:12px; background:url(<?php echo Yii::app()->baseUrl;?>/images/s.png) no-repeat 0 -52px; }
    .item-s-txt .baoming { float:left; width:135px; height:51px; background:url(<?php echo Yii::app()->baseUrl;?>/images/s.png) no-repeat; text-indent:-9999px; overflow:hidden }
</style>
<div class="item-s">
    <h3><a href="<?php if(!empty($url)) echo $url;?>" target="_blank"><?php if(!empty($item_title)) echo $item_title;?></a></h3>
    <!--<div class="item-s-num"><strong>5040</strong>人报名 | <strong>65654</strong>人查看 | <strong>6485</strong>条点评 | <strong>18</strong>人推荐</div>-->
    <a href="<?php if(!empty($url)) echo $url;?>" target="_blank" class="item-s-pic"><img src="<?php if(!empty($item_pic))  echo $item_pic?>" width="218" height="218" ></a>
    <div class="item-s-txt">
        <p><span>活动类型：</span>免费试用</p>
        <p><span>开始时间：</span><?php if(!empty($item_start_time)) echo date("Y年m月d号", $item_start_time);?></p>
        <p><span>结束时间：</span><?php if(!empty($item_end_time)) echo date("Y年m月d号", $item_end_time);?></p>
        <?php //todo js判断 ?>
        <div class="act-status"><!--<span class="over">活动已结束<i class="icon"></i></span>--><a href="<?php if(!empty($url)) echo $url;?>" target="_blank" class="baoming" title="我要报名">我要报名</a> </div>
    </div>
</div>
<div>
    <?php if(!empty($item_intro_more)) echo $item_intro_more; ?>
</div>
