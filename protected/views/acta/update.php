<?php
/* @var $this ActaController */
/* @var $model Acta */

$this->breadcrumbs=array(
	'Actas'=>array('index'),
	$model->acta_id=>array('view','id'=>$model->acta_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acta', 'url'=>array('index')),
	array('label'=>'Create Acta', 'url'=>array('create')),
	array('label'=>'View Acta', 'url'=>array('view', 'id'=>$model->acta_id)),
	array('label'=>'Manage Acta', 'url'=>array('admin')),
);
?>

<h1>Update Acta <?php echo $model->acta_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>