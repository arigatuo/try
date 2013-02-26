<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'media-position-form',
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
		<?php echo $form->labelEx($model,'media_position_name'); ?>
		<?php echo $form->textField($model,'media_position_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_position_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->