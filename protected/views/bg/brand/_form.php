<?php
    $this->renderPartial('////common/preview_image', array(
        "photo_attr_array" => array($model->brand_pic)
    ));
?>
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
        <?php echo $this->renderPartial("////common/ajax_upload", array("input_id"=>"Brand_brand_pic")); ?>
		<?php echo $form->textField($model,'brand_pic',array('size'=>60,'maxlength'=>255,'class'=>'item_photo')); ?>
		<?php echo $form->error($model,'brand_pic'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->