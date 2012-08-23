<?php
/* @var $this ActaController */
/* @var $model Acta */

$this->breadcrumbs=array(
	'Actas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Volver al contrato', 'url'=>Yii::app()->user->returnUrl),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acta-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Actas</h1>

<p>
Puede ingresar opcionalmente un comparador (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de cada uno de los valores de busqueda para indicar como debe ser echa la comparacion.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'acta_id',
		'acta_name',
		'acta_path',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{download}{delete}',
			'buttons'=>array(
					'download' => array(
								'label'=>'Descargar', // text label of the button
								'url'=>"CHtml::normalizeUrl(array('download', 'id'=>\$data->acta_path))",
								'imageUrl'=>Yii:: app() ->baseUrl.'/images/downloadIcon.png',  // image URL of the button. If not set or false, a text link is used
								'options' => array('class'=>'copy'), // HTML options for the button
						),
				),
		),
	),
)); ?>
