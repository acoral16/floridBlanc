<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	'enableAjaxValidation'=>false,
)); 


?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_nombre'); ?>
		<?php echo $form->textField($model,'project_nombre',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'project_nombre'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'project_fechaCreacion');
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name'=>'project_fechaCreacion',
				'model'=>$model,
				'attribute'=>'project_fechaCreacion',
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
		echo $form->error($model,'project_fechaCreacion'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'project_ejeTematico'); ?>
		<?php echo $form->textArea($model,'project_ejeTematico',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_ejeTematico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_lineaTematico'); ?>
		<?php echo $form->textArea($model,'project_lineaTematico',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_lineaTematico'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'project_ssepi'); ?>
		<?php echo $form->textField($model,'project_ssepi'); ?>
		<?php echo $form->error($model,'project_ssepi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_metaResultado'); ?>
		<?php echo $form->dropDownList($model,'project_metaResultado', CHtml::listData(Meta::model()->findAll(array('order'=>'meta_codigo')), 'meta_id', 'meta_codigo'),
				array(
					'prompt'=>'Seleccione una meta')); ?>
		<?php echo $form->error($model,'project_metaResultado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_nombrePrograma'); ?>
		<?php echo $form->textField($model,'project_nombrePrograma',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_nombrePrograma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_metaProducto'); ?>
				<?php echo $form->dropDownList($model,'project_metaProducto', CHtml::listData(Meta::model()->findAll(array('order'=>'meta_codigo')), 'meta_id', 'meta_codigo'),
				array(
					'prompt'=>'Seleccione una meta')); ?>
		<?php echo $form->error($model,'project_metaProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_condicionesActuales'); ?>
		<?php echo $form->textArea($model,'project_condicionesActuales',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_condicionesActuales'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_descripcionSituacion'); ?>
		<?php echo $form->textArea($model,'project_descripcionSituacion',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_descripcionSituacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_descripcionProducto'); ?>
		<?php echo $form->textArea($model,'project_descripcionProducto',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_descripcionProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_causasDirectas'); ?>
		<?php echo $form->textArea($model,'project_causasDirectas',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_causasDirectas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_causasIndirectas'); ?>
		<?php echo $form->textArea($model,'project_causasIndirectas',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_causasIndirectas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_efectosDirectos'); ?>
		<?php echo $form->textArea($model,'project_efectosDirectos',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_efectosDirectos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_efectosIndirectos'); ?>
		<?php echo $form->textArea($model,'project_efectosIndirectos',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_efectosIndirectos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_region'); ?>
		<?php echo $form->textField($model,'project_region',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_departamento'); 
		echo $form->dropDownList($model, 'project_departamento', CHtml::listData(Dptos::model()->findAll(array('order'=>'dptos_name')), 'dptos_code', 'dptos_name'), array(
			'prompt'=>'Seleccione un departamento',
			'ajax' => array(
			'type'=>'POST', //request type
			'url'=>CController::createUrl('Projects/updateCities'), //url to call.
			'update'=>'#Projects_'.'project_municipio', //selector to update
			))); 
		 echo $form->error($model,'project_departamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_municipio');  
		echo $form->dropDownList($model,'project_municipio', CHtml::listData(Municipios::model()->findAll(array('order'=>'municipios_name')), 'municipios_code', 'municipios_name'),
				array(
					'prompt'=>'Seleccione un municipio'));
		echo $form->error($model,'project_municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_clasePoblado'); ?>
		<?php echo $form->textField($model,'project_clasePoblado',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_clasePoblado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_localizacion'); ?>
		<?php echo $form->textField($model,'project_localizacion',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_localizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_descripcion'); ?>
		<?php echo $form->textArea($model,'project_descripcion',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_objetivoGeneral'); ?>
		<?php echo $form->textField($model,'project_objetivoGeneral',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_objetivoGeneral'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_objetivoEspecifico'); ?>
		<?php echo $form->textField($model,'project_objetivoEspecifico',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_objetivoEspecifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_metaObjetivoEspecifico'); ?>
		<?php echo $form->dropDownList($model,'project_metaObjetivoEspecifico', CHtml::listData(Meta::model()->findAll(array('order'=>'meta_codigo')), 'meta_id', 'meta_codigo'),
				array(
					'prompt'=>'Seleccione una meta')); ?>
		<?php echo $form->error($model,'project_metaObjetivoEspecifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_objetivoEspecifico2'); ?>
		<?php echo $form->textField($model,'project_objetivoEspecifico2',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'project_objetivoEspecifico2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_metaObjetivoEspecifico2'); ?>
		<?php echo $form->dropDownList($model,'project_metaObjetivoEspecifico2', CHtml::listData(Meta::model()->findAll(array('order'=>'meta_codigo')), 'meta_id', 'meta_codigo'),
				array(
					'prompt'=>'Seleccione una meta')); ?>		
		<?php echo $form->error($model,'project_metaObjetivoEspecifico2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_justificacionYantecedentes'); ?>
		<?php echo $form->textField($model,'project_justificacionYantecedentes',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'project_justificacionYantecedentes'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'project_valor'); ?>
		<?php echo $form->textField($model,'project_valor'); ?>
		<?php echo $form->error($model,'project_valor'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'project_fuenteFinanciacion'); ?>
		<?php echo $form->textField($model,'project_fuenteFinanciacion',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'project_fuenteFinanciacion'); ?>
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'project_saldo'); ?>
		<?php echo $form->textField($model,'project_saldo'); ?>
		<?php echo $form->error($model,'project_saldo'); ?>
	</div>		

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->