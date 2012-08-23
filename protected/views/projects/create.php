<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Projectos', 'url'=>array('index')),
	array('label'=>'Administrar Projectos', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
);
?>

<h1>Crear Projecto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>