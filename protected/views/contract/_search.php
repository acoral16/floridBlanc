<?php
/* @var $this ContractController */
/* @var $model Contract */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'contract_id'); ?>
		<?php echo $form->textField($model,'contract_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_numero'); ?>
		<?php echo $form->textField($model,'contract_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_objeto'); ?>
		<?php echo $form->textField($model,'contract_objeto',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_fechaRegistroContrato'); ?>
		<?php echo $form->textField($model,'contract_fechaRegistroContrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_fechaActualizacion'); ?>
		<?php echo $form->textField($model,'contract_fechaActualizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_oficinaGestora'); ?>
		<?php echo $form->textField($model,'contract_oficinaGestora',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_observaciones'); ?>
		<?php echo $form->textField($model,'contract_observaciones',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_valorContrato'); ?>
		<?php echo $form->textField($model,'contract_valorContrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_codigoPresupuesto'); ?>
		<?php echo $form->textField($model,'contract_codigoPresupuesto',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_valorCodigo'); ?>
		<?php echo $form->textField($model,'contract_valorCodigo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_porcentajeRespectoValorProyecto'); ?>
		<?php echo $form->textField($model,'contract_porcentajeRespectoValorProyecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_proyectoId'); ?>
		<?php echo $form->textField($model,'contract_proyectoId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->