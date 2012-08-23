<?php
/* @var $this ContractController */
/* @var $model Contract */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contract-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_numero'); ?>
		<?php echo $form->textField($model,'contract_numero'); ?>
		<?php echo $form->error($model,'contract_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_objeto'); ?>
		<?php echo $form->textField($model,'contract_objeto',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'contract_objeto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_fechaRegistroContrato'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name'=>'contract_fechaRegistroContrato',
				'model'=>$model,
				'attribute'=>'contract_fechaRegistroContrato',
				'language'=>Yii::app()->language=='es' ? 'es' : null,
				'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'button', // 'focus', 'button', 'both'
						'buttonText'=>Yii::t('ui','Seleccionar fecha'),
						'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
						'buttonImageOnly'=>true,
				),
				'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top'
				),
		));
		echo $form->error($model,'contract_fechaRegistroContrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_oficinaGestora'); ?>
		<?php echo $form->textField($model,'contract_oficinaGestora',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contract_oficinaGestora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_observaciones'); ?>
		<?php echo $form->textField($model,'contract_observaciones',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'contract_observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_valorContrato'); ?>
		<?php echo $form->textField($model,'contract_valorContrato'); ?>
		<?php echo $form->error($model,'contract_valorContrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_codigoPresupuesto'); ?>
		<?php echo $form->textField($model,'contract_codigoPresupuesto',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contract_codigoPresupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_valorCodigo'); ?>
		<?php echo $form->textField($model,'contract_valorCodigo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contract_valorCodigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_porcentajeRespectoValorProyecto'); ?>
		<?php echo $form->textField($model,'contract_porcentajeRespectoValorProyecto'); ?> %
		<?php echo $form->error($model,'contract_porcentajeRespectoValorProyecto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->