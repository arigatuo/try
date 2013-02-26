<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'media_position'); ?>
		<?php echo $form->textField($model,'media_position',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'media_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_url'); ?>
		<?php echo $form->textField($model,'media_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_photo'); ?>
		<?php echo $form->textField($model,'media_photo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_text'); ?>
		<?php echo $form->textField($model,'media_text',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_ctime'); ?>
		<?php echo $form->textField($model,'media_ctime',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'media_ctime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->