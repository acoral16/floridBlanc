<?php
/* @var $this ContractController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contractos',
);

$this->menu=array(
	array('label'=>'Administrar Contractos', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Volver al proyecto', 'url'=>Yii::app()->user->returnUrl),
);
?>

<h1>Contractos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
