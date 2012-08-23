<?php

$this->pageTitle=Yii::app()->name . ' - Admin';
$this->breadcrumbs=array(
	'Admin',
);

?>


<div id="content">
	<table >
		<tr>
			<td >
				<?php  
					$imageUsers = CHtml::image(Yii:: app() ->baseUrl.'/images/users_icon.png', 'Usuarios');
					echo CHtml::link($imageUsers,array('users/index'));
				?> 
			</td>
			<td >
				<?php  
					$imageRols = CHtml::image(Yii:: app() ->baseUrl.'/images/rols_icon.png' , 'Roles');
					echo CHtml::link($imageRols,array('rols/index'));
				?> 
			</td>
			<td >
				<?php  
					$imageRols = CHtml::image(Yii:: app() ->baseUrl.'/images/config_icon.png' , 'Configuración');
					echo CHtml::link($imageRols,array('rols/index'));
				?> 
			</td>
		</tr>
		<tr>
			<td >
				Usuarios
			</td>
			<td >
				Roles
			</td>
			<td >
				Configuraci&oacute;n
			</td>
		</tr>
	</table>
</div>
