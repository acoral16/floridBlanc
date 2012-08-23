<?php
/* @var $this RolsController */
/* @var $model Rols */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Roles', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rols-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Roles</h1>

<p>
Puede ingresar un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los valores de busqueda para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rols-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'rols_id',
		'rols_name',
		'rols_description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
