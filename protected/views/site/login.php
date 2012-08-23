<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
		'Login',
);
?>

<h1>Iniciar sesi&oacute;n</h1>

<p>Por favor ingrese sus datos para ingresar al sistema</p>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
					'validateOnSubmit'=>true,
			),
	)); ?>

	<p class="note">
		Campos con <span class="required">*</span> son obligatorios.
	</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with
			<tt>demo/demo</tt>
			or
			<tt>admin/admin</tt>
			.
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Iniciar'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
<!-- form -->
