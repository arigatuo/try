<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-28
 * Time: 上午10:55
 * To change this template use File | Settings | File Templates.
 */
if(empty($item))
    throw new CException("\$item is needed");

$itemUrl = Yii::app()->createUrl("/main/Index/Detail", array("item_id"=>$item->getAttribute("item_id")));
$itemBrand = $item->brand->getAttribute('brand_name');
$itemName = $itemBrand.$item->getAttribute("item_name");
?>
<div class="item fn-clear">
    <div class="pic"><a href="<?php echo $itemUrl;?>" target="_blank"><img src="<?php echo $item->getAttribute("item_pic_small");?>" width="218" height="218" alt="产品名称"/></a><span class="y <?php echo $item->getAttribute('item_type_id') == 2 ? "tao" : "";?>">试用</span> </div>
    <div class="txt">
        <h2><a href="<?php echo $itemUrl;?>" target="_blank"><?php echo $itemName;?></a></h2>
        <ul class="pf">
            <li class="sy"><span class="t">剩余</span><span class="b"><strong><?php echo $item->getAttribute("item_piece_left");?></strong>份</span></li>
            <li class="total"><span class="t">总数量</span><span class="b"><?php echo $item->getAttribute("item_piece");?>份</span></li>
            <li class="hot"><span class="t">人气</span><span class="b"><?php echo $item->getAttribute("item_apply_num_plus")+Apply::model()->countApplyByItemId($item->getAttribute("item_id"));?></span></li>
            <li class="wy"><a href="<?php echo $itemUrl;?>" target="_blank" title="我要试用">我要试用</a></li>
        </ul>
        <p class="des"><?php echo $item->getAttribute("item_intro");?></p>
        <div class="time" timeValue="<?php echo strtotime($item->getAttribute("item_end_time"));?>"><span class="countdown"><i class="day">8</i>天<i class="shi">23</i>时<i class="fen">51</i>分<i class="miao">22</i>秒</span><span class="applydate">申请时间：<?php echo date("y.m.d", strtotime($item->getAttribute("item_start_time")))."-".date("y.m.d", strtotime($item->getAttribute("item_end_time")));?></span></div>
    </div>
</div>
