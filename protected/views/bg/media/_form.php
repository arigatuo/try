<?php
//图片预览
$this->renderPartial('////common/preview_image', array(
    "photo_attr_array" => array($model->media_photo)
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'media_position'); ?>
        <?php echo CHtml::dropDownList("Media[media_position]", $model->media_position,
            CHtml::listData(MediaPosition::model()
                ->findAll(),
            "media_position", "media_position_name")); ?>
		<?php echo $form->error($model,'media_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_url'); ?>
		<?php echo $form->textField($model,'media_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_photo'); ?>
        <?php echo $this->renderPartial("////common/ajax_upload", array("input_id" => "Media_media_photo")); ?>
		<?php echo $form->textField($model,'media_photo',array('size'=>60,'maxlength'=>255, 'class'=>'item_photo')); ?>
		<?php echo $form->error($model,'media_photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_text'); ?>
		<?php echo $form->textField($model,'media_text',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->