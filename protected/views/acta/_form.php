<?php
/* @var $this ActaController */
/* @var $model Acta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acta-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'acta_name'); ?>
		<?php echo $form->textField($model,'acta_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'acta_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'acta_avanceFisico'); ?>
		<?php echo $form->textField($model,'acta_avanceFisico'); ?>
		<?php echo $form->error($model,'acta_avanceFisico'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'acta_avanceFinanciero'); ?>
		<?php echo $form->textField($model,'acta_avanceFinanciero'); ?>
		<?php echo $form->error($model,'acta_avanceFinanciero'); ?>
	</div>		
	
	<div class="row">
		<?php echo $form->labelEx($model,'acta_pagada'); ?>
		<?php echo $form->dropDownList($model, 'acta_pagada', array('0' => 'No', '1' => 'Si'), array('empty' => 'Seleccione una opcion')); ?>
		<?php echo $form->error($model,'acta_pagada'); ?>
	</div>		

	<div class="row">
		<?php echo $form->labelEx($model,'acta_path'); ?>
		<?php echo $form->fileField($model,'acta_path'); ?>
		<?php echo $form->error($model,'acta_path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->