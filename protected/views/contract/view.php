<?php
/* @var $this ContractController */
/* @var $model Contract */

$this->breadcrumbs=array(
	'Contractos'=>array('index'),
	$model->contract_id,
);

$this->menu=array(
	array('label'=>'Listar Contractos', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Actualizar Contractos', 'url'=>array('update', 'id'=>$model->contract_id), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Eliminar Contractos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->contract_id),'confirm'=>'Estas seguro que deseas eliminar este elemento?')),
	array('label'=>'Administrar Contractos', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Volver al proyecto', 'url'=>Yii::app()->user->returnUrl),
);
?>
<div id="content">
	<table>
		<tr>
			<td>
				<h1>Contrato #: <?php echo $model->contract_numero; ?></h1>
			</td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<?php  
					$addContract = CHtml::image(Yii:: app() ->baseUrl.'/images/agregarActasicon.png', 'Agregar acta');
					echo CHtml::link($addContract,array('acta/create', 'idP'=>$model->contract_id));
				?> 			
			</td>
			<td>
				<?php  
					$addContract = CHtml::image(Yii:: app() ->baseUrl.'/images/verActasicon.png', 'Ver actas');
					echo CHtml::link($addContract,array('acta/index', 'idP'=>$model->contract_id));
				?> 			
			</td>
		</tr>
		<tr>
			<td>
				<h1/>
			</td>
			<td>
				<p style="text-align:left;">Agregar acta</p>
			</td>
			<td>
				<p style="text-align:left;">&nbsp;&nbsp;Ver actas</p>
			</td>
		</tr>		
	</table>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'contract_numero',
		'contract_objeto',
		'contract_fechaRegistroContrato',
		'contract_fechaActualizacion',
		'contract_oficinaGestora',
		'contract_observaciones',
		'contract_valorContrato',
		'contract_codigoPresupuesto',
		'contract_valorCodigo',
		'contract_porcentajeRespectoValorProyecto',
		'contract_avanceFisico',
		'contract_avanceFinanciero',
	),
)); ?>
