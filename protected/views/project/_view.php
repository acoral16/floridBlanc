<?php
/* @var $this ProjectController */
/* @var $model Project */
?>

<div class="view">

	<b><?php  echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->project_id), array('view', 'id'=>$data->project_id));  ?>
	<br /> 

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->project_nombre); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_avanceFisico')); ?>:</b>
	<?php echo CHtml::encode($data->project_avanceFisico); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_avanceFinanciero')); ?>:</b>
	<?php echo CHtml::encode($data->project_avanceFinanciero); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_ssepi')); ?>:</b>
	<?php echo CHtml::encode($data->project_ssepi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_ejeTematico')); ?>:</b>
	<?php echo CHtml::encode($data->project_ejeTematico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_lineaTematico')); ?>:</b>
	<?php echo CHtml::encode($data->project_lineaTematico); ?>
	<br />

	<?php /* echo CHtml::encode($data->getAttributeLabel('project_metaResultado')); ?>:</b>
	<?php echo CHtml::encode($data->project_metaResultado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_nombrePrograma')); ?>:</b>
	<?php echo CHtml::encode($data->project_nombrePrograma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_metaProducto')); ?>:</b>
	<?php echo CHtml::encode($data->project_metaProducto); ?>
	<br />

	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_tituloProyecto')); ?>:</b>
	<?php echo CHtml::encode($data->project_tituloProyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_condicionesActuales')); ?>:</b>
	<?php echo CHtml::encode($data->project_condicionesActuales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_descripcionSituacion')); ?>:</b>
	<?php echo CHtml::encode($data->project_descripcionSituacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_descripcionProducto')); ?>:</b>
	<?php echo CHtml::encode($data->project_descripcionProducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_causasDirectas')); ?>:</b>
	<?php echo CHtml::encode($data->project_causasDirectas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_causasIndirectas')); ?>:</b>
	<?php echo CHtml::encode($data->project_causasIndirectas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_efectosDirectos')); ?>:</b>
	<?php echo CHtml::encode($data->project_efectosDirectos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_efectosIndirectos')); ?>:</b>
	<?php echo CHtml::encode($data->project_efectosIndirectos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_region')); ?>:</b>
	<?php echo CHtml::encode($data->project_region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_departamento')); ?>:</b>
	<?php echo CHtml::encode($data->project_departamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_municipio')); ?>:</b>
	<?php echo CHtml::encode($data->project_municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_clasePoblado')); ?>:</b>
	<?php echo CHtml::encode($data->project_clasePoblado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_localizacion')); ?>:</b>
	<?php echo CHtml::encode($data->project_localizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->project_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_objetivoGeneral')); ?>:</b>
	<?php echo CHtml::encode($data->project_objetivoGeneral); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_objetivoEspecifico')); ?>:</b>
	<?php echo CHtml::encode($data->project_objetivoEspecifico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_metaObjetivoEspecifico')); ?>:</b>
	<?php echo CHtml::encode($data->project_metaObjetivoEspecifico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_objetivoEspecifico2')); ?>:</b>
	<?php echo CHtml::encode($data->project_objetivoEspecifico2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_metaObjetivoEspecifico2')); ?>:</b>
	<?php echo CHtml::encode($data->project_metaObjetivoEspecifico2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_justificacionYantecedentes')); ?>:</b>
	<?php echo CHtml::encode($data->project_justificacionYantecedentes); ?>
	<br />

	*/ ?>

</div>