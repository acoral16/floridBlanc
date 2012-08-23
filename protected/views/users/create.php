<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Crear Usuarios</h1>

<?php
	echo $this->renderPartial('_form', array('model'=>$model));
?>