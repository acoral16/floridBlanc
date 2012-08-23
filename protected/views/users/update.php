<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->users_id=>array('view','id'=>$model->users_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuarios', 'url'=>array('create')),
	array('label'=>'Ver Usuarios', 'url'=>array('view', 'id'=>$model->users_id)),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Usuarios <?php echo $model->users_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>