<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Projectos', 'url'=>array('index')),
	array('label'=>'Crear Projectos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('projects-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Projectos</h1>

<p>
Puede ingresar operadores de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada una de sus valores de busqueda para especificar como se debe hacer la comparaci&oacute;n.
</p>

<?php echo CHtml::link('Busqueda avanzada	','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'project_id',
		'project_nombre',
		'project_metaResultado',
		'project_avanceFisico',
		'project_avanceFinanciero',
		//'project_metaResultado',
		//'project_nombrePrograma',
		/*
		'project_metaProducto',
		'project_condicionesActuales',
		'project_descripcionSituacion',
		'project_descripcionProducto',
		'project_causasDirectas',
		'project_causasIndirectas',
		'project_efectosDirectos',
		'project_efectosIndirectos',
		'project_region',
		'project_departamento',
		'project_municipio',
		'project_clasePoblado',
		'project_localizacion',
		'project_descripcion',
		'project_objetivoGeneral',
		'project_objetivoEspecifico',
		'project_metaObjetivoEspecifico',
		'project_objetivoEspecifico2',
		'project_metaObjetivoEspecifico2',
		'project_justificacionYantecedentes',
		*/
		'project_ssepi',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
