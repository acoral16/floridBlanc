<?php
/* @var $this RolsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Roles',
);

$this->menu=array(
	array('label'=>'Crear Roles', 'url'=>array('create')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Rols</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
