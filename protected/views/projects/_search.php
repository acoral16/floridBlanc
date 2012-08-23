<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'project_id'); ?>
		<?php echo $form->textField($model,'project_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_nombre'); ?>
		<?php echo $form->textField($model,'project_nombre',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_ejeTematico'); ?>
		<?php echo $form->textField($model,'project_ejeTematico',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_lineaTematico'); ?>
		<?php echo $form->textField($model,'project_lineaTematico',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_metaResultado'); ?>
		<?php echo $form->textField($model,'project_metaResultado',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_nombrePrograma'); ?>
		<?php echo $form->textField($model,'project_nombrePrograma',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_metaProducto'); ?>
		<?php echo $form->textField($model,'project_metaProducto',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_condicionesActuales'); ?>
		<?php echo $form->textField($model,'project_condicionesActuales',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_descripcionSituacion'); ?>
		<?php echo $form->textField($model,'project_descripcionSituacion',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_descripcionProducto'); ?>
		<?php echo $form->textField($model,'project_descripcionProducto',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_causasDirectas'); ?>
		<?php echo $form->textField($model,'project_causasDirectas',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_causasIndirectas'); ?>
		<?php echo $form->textField($model,'project_causasIndirectas',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_efectosDirectos'); ?>
		<?php echo $form->textField($model,'project_efectosDirectos',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_efectosIndirectos'); ?>
		<?php echo $form->textField($model,'project_efectosIndirectos',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_region'); ?>
		<?php echo $form->textField($model,'project_region',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_departamento'); ?>
		<?php echo $form->textField($model,'project_departamento',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_municipio'); ?>
		<?php echo $form->textField($model,'project_municipio',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_clasePoblado'); ?>
		<?php echo $form->textField($model,'project_clasePoblado',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_localizacion'); ?>
		<?php echo $form->textField($model,'project_localizacion',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_descripcion'); ?>
		<?php echo $form->textField($model,'project_descripcion',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_objetivoGeneral'); ?>
		<?php echo $form->textField($model,'project_objetivoGeneral',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_objetivoEspecifico'); ?>
		<?php echo $form->textField($model,'project_objetivoEspecifico',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_metaObjetivoEspecifico'); ?>
		<?php echo $form->textField($model,'project_metaObjetivoEspecifico',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_objetivoEspecifico2'); ?>
		<?php echo $form->textField($model,'project_objetivoEspecifico2',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_metaObjetivoEspecifico2'); ?>
		<?php echo $form->textField($model,'project_metaObjetivoEspecifico2',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_justificacionYantecedentes'); ?>
		<?php echo $form->textField($model,'project_justificacionYantecedentes',array('size'=>60,'maxlength'=>5000)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->