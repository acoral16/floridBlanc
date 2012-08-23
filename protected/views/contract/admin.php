<?php
/* @var $this ContractController */
/* @var $model Contract */

$this->breadcrumbs=array(
	'Contractos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Contractos', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Ver proyectos', 'url'=>array('projects/index'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Volver al proyecto', 'url'=>Yii::app()->user->returnUrl),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contract-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Contractos</h1>

<p>
Puede ingresar un operador de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada regla de busqueda para especificar la comparacion que se debe realizar.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contract-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'contract_id',
		'contract_numero',
		'contract_objeto',
		'contract_fechaRegistroContrato',
		'contract_fechaActualizacion',
		'contract_oficinaGestora',
		/*
		'contract_observaciones',
		'contract_valorContrato',
		'contract_codigoPresupuesto',
		'contract_valorCodigo',
		'contract_porcentajeRespectoValorProyecto',
		'contract_proyectoId',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
