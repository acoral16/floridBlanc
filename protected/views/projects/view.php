<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->project_id,
);

$this->menu=array(
	array('label'=>'Listar Proyectos', 'url'=>array('index')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Actualizar Proyecto', 'url'=>array('update', 'id'=>$model->project_id)),
	array('label'=>'Eliminar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->project_id),'confirm'=>'Estas seguro que deseas eliminar este elemento?'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
	array('label'=>'Administrar Proyecto', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
);
?>
<div id="content">
	<table>
		<tr>
			<td>
				<h1>Proyecto: <?php echo $model->project_nombre; ?></h1>
			</td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<?php  
					$addContract = CHtml::image(Yii:: app() ->baseUrl.'/images/contract_icon.png', 'Agregar contrato');
					echo CHtml::link($addContract,array('contract/create', 'idP'=>$model->project_id));
				?> 
			</td>
			<td>
				<?php  
					$addContract = CHtml::image(Yii:: app() ->baseUrl.'/images/see_contract_icon.png', 'Ver contratos');
					echo CHtml::link($addContract,array('contract/index', 'idP'=>$model->project_id));
				?> 
			</td>
		</tr>
		<tr>
			<td>
				<h1/>
			</td>
			<td>
				<p style="text-align:left;">Agregar contrato</p>
			</td>
			<td>
				<p style="text-align:left;">&nbsp;&nbsp;Ver contratos</p>
			</td>
		</tr>		
	</table>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'project_nombre',
		'project_fechaCreacion',
		'project_ejeTematico',
		'project_lineaTematico',
		'project_metaResultado',
		'project_avanceFisico', 
		'project_avanceFinanciero',
		'project_nombrePrograma',
		'project_metaProducto',
		'project_condicionesActuales',
		'project_descripcionSituacion',
		'project_descripcionProducto',
		'project_causasDirectas',
		'project_causasIndirectas',
		'project_efectosDirectos',
		'project_efectosIndirectos',
		'project_region',
		'project_departamento',
		'project_municipio',
		'project_clasePoblado',
		'project_localizacion',
		'project_descripcion',
		'project_objetivoGeneral',
		'project_objetivoEspecifico',
		'project_metaObjetivoEspecifico',
		'project_objetivoEspecifico2',
		'project_metaObjetivoEspecifico2',
		'project_justificacionYantecedentes',
		'project_ssepi',
	),
)); ?>
