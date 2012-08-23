<?php
/* @var $this ContractController */
/* @var $model Contract */

$this->breadcrumbs=array(
	'Contractos'=>array('index'),
	$model->contract_id=>array('view','id'=>$model->contract_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Contractos', 'url'=>array('index')),
	array('label'=>'Crear Contractos', 'url'=>array('create')),
	array('label'=>'Ver Contractos', 'url'=>array('view', 'id'=>$model->contract_id)),
	array('label'=>'Administrar Contractis', 'url'=>array('admin')),
);
?>

<h1>Actualizar Contracto <?php echo $model->contract_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>