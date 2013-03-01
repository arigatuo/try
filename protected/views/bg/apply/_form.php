<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'apply-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php echo $form->textField($model,'item_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apply_status'); ?>
        <?php echo CHtml::dropDownList("Apply[apply_status]", $model->apply_status, Apply::model()->statusList()); ?>
		<?php echo $form->error($model,'apply_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apply_text'); ?>
		<?php echo $form->textArea($model,'apply_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'apply_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->