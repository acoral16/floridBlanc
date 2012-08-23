<?php
/* @var $this ContractController */
/* @var $model Contract */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contract_id), array('view', 'id'=>$data->contract_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_numero')); ?>:</b>
	<?php echo CHtml::encode($data->contract_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_objeto')); ?>:</b>
	<?php echo CHtml::encode($data->contract_objeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_fechaRegistroContrato')); ?>:</b>
	<?php echo CHtml::encode($data->contract_fechaRegistroContrato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_fechaActualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->contract_fechaActualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_oficinaGestora')); ?>:</b>
	<?php echo CHtml::encode($data->contract_oficinaGestora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->contract_observaciones); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_valorContrato')); ?>:</b>
	<?php echo CHtml::encode($data->contract_valorContrato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_codigoPresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->contract_codigoPresupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_valorCodigo')); ?>:</b>
	<?php echo CHtml::encode($data->contract_valorCodigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_porcentajeRespectoValorProyecto')); ?>:</b>
	<?php echo CHtml::encode($data->contract_porcentajeRespectoValorProyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_proyectoId')); ?>:</b>
	<?php echo CHtml::encode($data->contract_proyectoId); ?>
	<br />

	*/ ?>

</div>