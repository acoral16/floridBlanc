<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->users_id), array('view', 'id'=>$data->users_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_name')); ?>:</b>
	<?php echo CHtml::encode($data->users_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_username')); ?>:</b>
	<?php echo CHtml::encode($data->users_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_password')); ?>:</b>
	<?php echo CHtml::encode($data->users_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_mail')); ?>:</b>
	<?php echo CHtml::encode($data->users_mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rols_id')); ?>:</b>
	<?php echo CHtml::encode($data->rols_id); ?>
	<br />


</div>