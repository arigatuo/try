<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'apply-form',
    'enableAjaxValidation' => false,
));
?>

<div class="baogao">
        <h2>发表试用报告</h2>
        <div class="selpro-pinfen fn-clear">
            <div class="selpro">请选择你试用的产品：
                <select name="Article[item_id]" id="Article_item_id">
                    <?php if(!empty($itemList)) :
                            foreach($itemList as $item) : ?>
                    <option value="<?php echo $item->getAttribute("item_id")?>"><?php echo
                        $item->brand->getAttribute('brand_name').$item->getAttribute ("item_name"); ?></option>
                    <?php   endforeach;
                          endif; ?>
                </select>
            </div>
            <div class="pinfen">总体评价：<span class="score"></span>点击图标为产品评分</div>
        </div>
        <div class="ct fn-clear">
            标题:
            <?php echo $form->textField($model,'article_title',array('class'=>'title')); ?>
            标题长度不超过100个中文字符
            <?php echo $form->error($model, 'article_title'); ?>
        </div>
        <div class="editor">
            <?php echo $form->textArea($model, 'article_content', array('placeholder'=>'请输入心得'));?>
        </div>
        <div class="ct">
            <?php echo $form->error($model, 'article_content'); ?>
        </div>
        <?php echo CHtml::submitButton('提交', array('class'=>'baogao-submit')); ?>
</div>
<?php
    $this->endWidget();
?>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/jquery.raty.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/xheditor/xheditor-1.1.14-zh-cn.min.js"></script>

<script type="text/javascript">
    $(function(){
        $('#Article_article_content').xheditor({skin:'nostyle',tools:'Cut,Copy,Paste,|,Bold,Italic,Underline,|,FontSize,FontColor,BackColor,|,SelectAll,Align, Outdent,Indent,|,Img,Fullscreen', width:889, height:368, html5Upload:false, upImgExt:'jpg,jpeg', upImgUrl:'<?php echo Yii::app()->createUrl('main/Ajax/Uploadimg');?>'});
        $('.score').raty({ score: 4 , starOff : siteSettings.baseUrl+"/images/star-off.png",
            starOn : siteSettings.baseUrl+"/images/star-on.png", scoreName : "Article[item_point]"});
    });
</script>
