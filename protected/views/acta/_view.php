<?php
/* @var $this ActaController */
/* @var $model Acta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('acta_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->acta_id), array('view', 'id'=>$data->acta_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acta_name')); ?>:</b>
	<?php echo CHtml::encode($data->acta_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acta_path')); ?>:</b>
	<?php echo CHtml::encode($data->acta_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acta_createdBy')); ?>:</b>
	<?php echo CHtml::encode($data->acta_createdBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acta_projectId')); ?>:</b>
	<?php echo CHtml::encode($data->acta_projectId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acta_contractId')); ?>:</b>
	<?php echo CHtml::encode($data->acta_contractId); ?>
	<br />


</div>