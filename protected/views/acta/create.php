<?php
/* @var $this ActaController */
/* @var $model Acta */

$this->breadcrumbs=array(
	'Actas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Acta', 'url'=>array('index', 'id='=>$model->acta_projectId)),
	array('label'=>'Administrar Actas', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Volver al contrato', 'url'=>Yii::app()->user->returnUrl),
);
?>

<h1>Crear Acta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>