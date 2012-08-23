<?php
/* @var $this ContractController */
/* @var $model Contract */

$this->breadcrumbs=array(
	'Contractos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver al proyecto', 'url'=>Yii::app()->user->returnUrl),
);
?>

<h1>Crear Contracto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>