<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->users_id,
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuarios', 'url'=>array('create')),
	array('label'=>'Actualizar Usuarios', 'url'=>array('update', 'id'=>$model->users_id)),
	array('label'=>'Eliminar Usuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->users_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Ver Usuarios #<?php echo $model->users_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'users_id',
		'users_name',
		'users_username',
		'users_password',
		'users_mail',
		'rols_id',
	),
)); ?>
