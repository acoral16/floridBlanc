<?php
/* @var $this RolsController */
/* @var $model Rols */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	$model->rols_id,
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Roles', 'url'=>array('create')),
	array('label'=>'Actualizar Roles', 'url'=>array('update', 'id'=>$model->rols_id)),
	array('label'=>'Eliminar Roles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rols_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Ver roles #<?php echo $model->rols_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rols_id',
		'rols_name',
		'rols_description',
	),
)); ?>
