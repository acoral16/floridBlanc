<?php
/* @var $this ActaController */
/* @var $model Acta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'acta_id'); ?>
		<?php echo $form->textField($model,'acta_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acta_name'); ?>
		<?php echo $form->textField($model,'acta_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acta_path'); ?>
		<?php echo $form->textField($model,'acta_path',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acta_createdBy'); ?>
		<?php echo $form->textField($model,'acta_createdBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acta_projectId'); ?>
		<?php echo $form->textField($model,'acta_projectId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acta_contractId'); ?>
		<?php echo $form->textField($model,'acta_contractId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->