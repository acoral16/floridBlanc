<?php
/* @var $this RolsController */
/* @var $model Rols */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Create Rols</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>