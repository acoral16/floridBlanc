<?php
/* @var $this ProjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proyectos',
);

$this->menu=array(
	array('label'=>'Crear Projecto', 'url'=>array('create')),
	array('label'=>'Buscar Projecto', 'url'=>array('admin')),
);
?>

<h1>Proyectos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
