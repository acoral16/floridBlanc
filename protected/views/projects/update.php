<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->project_id=>array('view','id'=>$model->project_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Projecto', 'url'=>array('index')),
	array('label'=>'Crear Projecto', 'url'=>array('create')),
	array('label'=>'Ver Projecto', 'url'=>array('view', 'id'=>$model->project_id)),
	array('label'=>'Administrar Projecto', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
);
?>

<h1>Actualizar Projectos <?php echo $model->project_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>