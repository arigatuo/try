<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->brand_id), array('view', 'id'=>$data->brand_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_name')); ?>:</b>
	<?php echo CHtml::encode($data->brand_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_ctime')); ?>:</b>
	<?php echo CHtml::encode($data->brand_ctime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_pic')); ?>:</b>
	<?php echo CHtml::encode($data->brand_pic); ?>
	<br />


</div>