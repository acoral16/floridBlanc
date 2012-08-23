<?php
/* @var $this ActaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actas',
);

$this->menu=array(
	array('label'=>'Volver al contrato', 'url'=>Yii::app()->user->returnUrl),
	array('label'=>'Administrar Actas', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
);
?>

<h1>Actas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
