<?php
    //todo 增加一个ajax上传图片

    $this->renderPartial('////common/preview_image');
?>
<script>
    <?php
    if(!empty($model->brand_pic))
        echo "jQuery(function(){preview_image();})";
    ?>
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brand-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_name'); ?>
		<?php echo $form->textField($model,'brand_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'brand_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_pic'); ?>
        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadpic',
            'config'=>array(
                'action'=>Yii::app()->createUrl('bg/Ajax/Uploadimg'),
                'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>1*1024*1024,// maximum file size in bytes
                'onComplete'=>"js:function(id, fileName, responseJSON){
				                    photoUrl = siteSettings.baseUrl + responseJSON.folder+responseJSON .filename;
									jQuery('#Brand_brand_pic').val(photoUrl);
									preview_image();}",
            )
        ));
        ?>
		<?php echo $form->textField($model,'brand_pic',array('size'=>60,'maxlength'=>255,'class'=>'item_photo')); ?>
		<?php echo $form->error($model,'brand_pic'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->