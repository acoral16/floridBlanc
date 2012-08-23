<?php
/* @var $this RolsController */
/* @var $model Rols */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	$model->rols_id=>array('view','id'=>$model->rols_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Roles', 'url'=>array('create')),
	array('label'=>'Ver Roles', 'url'=>array('view', 'id'=>$model->rols_id)),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Actualizar roles <?php echo $model->rols_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>