<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php echo $form->textField($model,'item_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'article_title'); ?>
		<?php echo $form->textField($model,'article_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'article_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'article_content'); ?>
		<?php echo $form->textArea($model,'article_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'article_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_point'); ?>
		<?php echo $form->textField($model,'item_point'); ?>
		<?php echo $form->error($model,'item_point'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'article_ctime'); ?>
		<?php echo $form->textField($model,'article_ctime',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'article_ctime'); ?>
	</div>

    <?php
    if(!empty($model->bbs_tid)): ?>
        <div class="row">
            <?php
            echo CHtml::link("【论坛对应帖子】", CommonHelper::returnBbsUrlByTid($model->bbs_tid), array(
                'target'=>'_blank',
            ));
            ?>
        </div>
    <?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->