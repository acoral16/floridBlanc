<?php
/* @var $this RolsController */
/* @var $model Rols */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rols_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rols_id), array('view', 'id'=>$data->rols_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rols_name')); ?>:</b>
	<?php echo CHtml::encode($data->rols_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rols_description')); ?>:</b>
	<?php echo CHtml::encode($data->rols_description); ?>
	<br />


</div>