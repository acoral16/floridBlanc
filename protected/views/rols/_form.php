<?php
/* @var $this RolsController */
/* @var $model Rols */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rols-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rols_name'); ?>
		<?php echo $form->textField($model,'rols_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'rols_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rols_description'); ?>
		<?php echo $form->textField($model,'rols_description',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'rols_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->