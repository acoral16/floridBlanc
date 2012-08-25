<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"
	media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

<!-- CSS -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />	
	
<!-- JS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script	src="http://ajax.googleapis.com/ajax/libs/1.8.12/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/login.js"></script>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>



</head>
<body>
	<div class="container" id="page">

		<div id="header">
			<div id="logo">
				<table>
					<tr>
						<td><!-- img src='images/Escudo_de_Santander_Colombia_ICON.png'
							alt="Escudo de santander" /-->
						</td>
						<td>
							<H1>
								<?php echo CHtml::encode(Yii::app()->name); ?>
							</H1>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- header -->

		<div id="mainmenu">
		
			<table>
				<tr>
					<td>
						<?php $this->widget('zii.widgets.CMenu',array(
								'items'=>array(
										array('label'=>'Inicio', 'url'=>array('/site/index')),
										array('label'=>'Admin', 'url'=>array('/admin/index'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isAdmin()),
										array('label'=>'Proyectos', 'url'=>array('/project/index'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Contactenos', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),
										array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest)
								),
						)); ?>
					</td>
					
					<?php 
						if(Yii::app()->user->isGuest){						
						?>
						<td>
						<!-- Login Starts Here -->
						<div id="loginContainer">
							<a href="#" id="loginButton"><span>Login</span><em></em> </a>
							<div style="clear: both"></div>
							<div id="loginBox">
								<form id="loginForm" action="index.php?r=site/index" method="post">
									<?php 
									$model=new LoginForm;
									$form=$this->beginWidget('CActiveForm', array(
											'id'=>'login-form',
											'enableClientValidation'=>true,
											'clientOptions'=>array(
													'validateOnSubmit'=>true,
											),
									)); ?>
									<fieldset id="body">
										<fieldset>
											<label for="email">Usuario</label> 
											<?php echo $form->textField($model,'username'); ?>
										</fieldset>
										<fieldset>
											<label for="password">Contrase&ntilde;a</label> 
											<?php echo $form->passwordField($model,'password'); ?>
										</fieldset>
										<input type="submit" id="login" value="Iniciar sesi&oacute;n" /> 
									</fieldset>
									<span><a href="#">Olvidaste tu contrase&ntilde;a?</a> </span>
									<?php $this->endWidget(); ?>
								</form> <!-- form -->						
							</div>
						</div> <!-- Login End Here -->
						</td>
						<?php } else  {?>
						<td  class="padding">
						<div style="color:white;text-align:right;font-size:18px;">
							<?php 
								echo CHtml::link("Cerrar Sesion (".Yii::app()->user->name.")",array('site/logout'),array("style"=>"color: white;"));
							?>
						</div>
						</td>	
						<?php } ?>
				</tr>
			</table>
		</div>
		<!-- mainmenu -->
		<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
		)); ?>
		<!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy;
			<?php echo date('Y'); ?>
			by mcoral.<br /> acoral16@gmail.com <br /> All Rights Reserved.<br />
			<!--?php echo Yii::powered(); ?-->
		</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
