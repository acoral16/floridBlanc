<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'users_name'); ?>
		<?php echo $form->textField($model,'users_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'users_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_username'); ?>
		<?php echo $form->textField($model,'users_username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'users_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_password'); ?>
		<?php echo $form->textField($model,'users_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'users_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_mail'); ?>
		<?php echo $form->textField($model,'users_mail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'users_mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rols_id'); ?>
		<?php echo $form->dropdownList($model,'rols_id', CHtml::listData(Rols::model()->findAll(), 'rols_id', 'rols_name'), array('empty'=>'Seleccione un rol')); ?>
		<?php echo $form->error($model,'rols_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->