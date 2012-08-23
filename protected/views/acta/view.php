<?php
/* @var $this ActaController */
/* @var $model Acta */

$this->breadcrumbs=array(
	'Actas'=>array('index'),
	$model->acta_id,
);

$this->menu=array(
	array('label'=>'Listar Actas', 'url'=>array('index', 'id='=>$model->acta_projectId)),
	//array('label'=>'Update Acta', 'url'=>array('update', 'id'=>$model->acta_id)),
	array('label'=>'Eliminar Acta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->acta_id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Administrar Actas', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Volver al contrato', 'url'=>Yii::app()->user->returnUrl),
);
?>

<h1>Acta: <?php echo $model->acta_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'acta_name',
		'acta_avanceFisico',
		'acta_avanceFinanciero',
		'acta_fechaCargue',
		'acta_pagada',
	),
)); ?>
<br/>
<DIV ALIGN=RIGHT>
	<?php  
		$addContract = CHtml::image(Yii:: app() ->baseUrl.'/images/download.png', 'Descargar acta');
		echo CHtml::link($addContract,array('acta/download', 'id'=>$model->acta_path));
	?> 
</DIV>
