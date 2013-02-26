<?php $this->renderPartial("////common/preview_image"); ?>
<script>
    <?php
    if(!empty($model->item_pic_big) || !empty($model->item_pic_small))
        echo "jQuery(function(){preview_image();})";
    ?>
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'item_name'); ?>
		<?php echo $form->textField($model,'item_name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'item_name'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'item_type_id'); ?>
        <?php echo CHtml::dropDownList("Item[item_type_id]", $model->item_type_id,
        CHtml::listData(ItemType::model()->findAll
            (), "item_type_id",
            "item_type_name")); ?>
        <?php echo $form->error($model,'item_type_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_brand_id'); ?>
        <?php echo CHtml::dropDownList("Item[item_brand_id]", $model->item_brand_id,
        CHtml::listData(Brand::model()->findAll
        (), "brand_id",
        "brand_name")); ?>
		<?php echo $form->error($model,'item_brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_status'); ?>
        <?php echo CHtml::dropDownList("Item[item_status]", $model->item_status,
                    Item::model()->statusList()) ?>
		<?php echo $form->error($model,'item_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_start_time'); ?>
        <?php
        $this->widget('ext.timepicker.timepicker',
            array(
                'model'=> $model,
                'name' => 'item_start_time',
                'options' => array(
                    'dateFormat'=>'yy-mm-dd',
                    'showSecond'=>false,
                ),
            )
        );
        ?>
		<?php echo $form->error($model,'item_start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_end_time'); ?>
        <?php
        $this->widget('ext.timepicker.timepicker',
            array(
                'model'=> $model,
                'name' => 'item_end_time',
                'options' => array(
                    'dateFormat'=>'yy-mm-dd',
                    'showSecond'=>false,
                ),
            )
        );
        ?>
		<?php echo $form->error($model,'item_end_time'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model, 'item_pic_small'); ?>
        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadpic',
            'config'=>array(
                'action'=>Yii::app()->createUrl('bg/Ajax/Uploadimg'),
                'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>1*1024*1024,// maximum file size in bytes
                'onComplete'=>"js:function(id, fileName, responseJSON){
				                    photoUrl = siteSettings.baseUrl + responseJSON.folder+responseJSON .filename;
									jQuery('#Item_item_pic_small').val(photoUrl);
									preview_image();
                                }",
            )
        ));
        ?>
        <?php echo $form->textField($model,'item_pic_small',array('size'=>30,'maxlength'=>30,
        'class'=>'item_photo')); ?>
        <?php echo $form->error($model, 'item_pic_small'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'item_pic_middle'); ?>
        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadpic2',
            'config'=>array(
                'action'=>Yii::app()->createUrl('bg/Ajax/Uploadimg'),
                'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>1*1024*1024,// maximum file size in bytes
                'onComplete'=>"js:function(id, fileName, responseJSON){
				                    photoUrl = siteSettings.baseUrl + responseJSON.folder+responseJSON .filename;
									jQuery('#Item_item_pic_middle').val(photoUrl);
									preview_image();
                                }",
            )
        ));
        ?>
        <?php echo $form->textField($model,'item_pic_middle',array('size'=>30,'maxlength'=>30,
        'class'=>'item_photo')); ?>
        <?php echo $form->error($model, 'item_pic_middle'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_apply_num_plus'); ?>
		<?php echo $form->textField($model,'item_apply_num_plus',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'item_apply_num_plus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_apply_num'); ?>
		<?php echo $form->textField($model,'item_apply_num',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'item_apply_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_piece'); ?>
		<?php echo $form->textField($model,'item_piece',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'item_piece'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'item_piece_left'); ?>
        <?php echo $form->textField($model,'item_piece_left',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'item_piece_left'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'item_prop'); ?>
        <?php echo $form->textField($model,'item_prop',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'item_prop'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'item_intro'); ?>
        <?php echo $form->textArea($model,'item_intro',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'item_intro'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->