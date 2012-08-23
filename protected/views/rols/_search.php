<?php
/* @var $this RolsController */
/* @var $model Rols */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rols_id'); ?>
		<?php echo $form->textField($model,'rols_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rols_name'); ?>
		<?php echo $form->textField($model,'rols_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rols_description'); ?>
		<?php echo $form->textField($model,'rols_description',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->