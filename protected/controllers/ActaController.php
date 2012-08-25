<?php

class ActaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'download'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'download'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),	
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$acta = Acta::model()->findByPk($id);
		if($acta->acta_pagada === '0')
			$acta->acta_pagada = 'No';
		else
			$acta->acta_pagada = 'Si';
		if($acta->acta_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()){
			$this->render('view',array(
				'model'=>$acta,
			));
		} else {
			throw new CHttpException(401,'No estas autorizado para ver esta acta.');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($idP)
	{
		//Solo se permiten crear actas si se sabe el contrato asociado
		if(isset($_GET['idP']))
		{
			$contract = Contract::model()->findByPk($idP);
			if($contract->contract_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()) //Solo admin o el usuario que creo el contrato puede agregarle actas
			{
				$model=new Acta;

				// Uncomment the following line if AJAX validation is needed
				$this->performAjaxValidation($model);

				if(isset($_POST['Acta']))
				{
					$attributes = $_POST['Acta'];
					$attributes['acta_createdBy'] = Yii::app()->user->id;
					$attributes['acta_projectId'] = $contract->contract_proyectoId;
					$attributes['acta_contractId'] = $idP;
					$saveFile = CUploadedFile::getInstance($model,'acta_path');
					$directory = 'upload' . DIRECTORY_SEPARATOR . 'contrato'.$idP;
					
					$fecha = new DateTime();
					$attributes['acta_fechaCargue'] = date_format($fecha, 'd/m/Y');
					
					if(!is_dir($directory)) //Si el directorio no existe, creelo
						mkdir($directory, 0777);
					
					if($saveFile != null){
						$file = $directory. DIRECTORY_SEPARATOR . $saveFile->name;
						$attributes['acta_path'] = $file;
					}
					$model->attributes = $attributes;
					if($model->save()){
						$saveFile->saveAs($file);
						//Actualiza el avance fisico y financiero del proyecto
						$this->updateProjectState($idP);
						$this->redirect(array('view','id'=>$model->acta_id));
					}
				}

				$this->render('create',array(
						'model'=>$model,
				));
			} else {
				throw new CHttpException(401,'No estas autorizado para crear actas en este contrato.');
			}
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		/*
	}
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if($model->acta_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()){
			if(isset($_POST['Acta']))
			{
				$model->attributes=$_POST['Acta'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->acta_id));
			}

			$this->render('update',array(
					'model'=>$model,
			));
		} else {*/
			throw new CHttpException(401,'Acción no permitida.');
		//}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(isset($_GET['idP'])){
			$model = Project::model()->findByPk($_GET['idP']);
			if($model->project_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()) {
				$model=new Acta('search');
				$model->unsetAttributes();  // clear any default values
				$array = array('acta_contractId' => $_GET['idP']);
				$model->attributes = $array;
				$this->render('admin',array(
						'model'=>$model,
				));
			} else {
				throw new CHttpException(401,'No estas autorizado para ver esta acta.');
			}
		}
		else if(Yii::app()->user->isAdmin()){
			$dataProvider=new CActiveDataProvider('Acta');
			$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));
		} else {
			$this->redirect('index.php?r=acta/index');
		}
	}
	
	public function actionDownload()
	{
		if(isset($_GET['id'])){
			$name = $_GET['id'];
			$ext = substr($name, -3);
			header('Content-Description: File Transfer');
			header('Content-Type: image/'.$ext);
			header("Content-disposition: attachment; filename=file.".$ext);
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . filesize($name));
			header('Expires: 0');
			header('Cache-Control: public');
			header('Pragma: public');
			@readfile($name);
			exit;
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Acta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Acta']))
			$model->attributes=$_GET['Acta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Acta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='acta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	private function updateProjectState($idP)
	{
		$actas=Acta::model()->findAllByAttributes(array('acta_contractId'=>$idP));
		$avaFisico = 0;
		$avaFinanciero = 0;
		foreach( $actas as $acta ) {
			$avaFisico += $acta->acta_avanceFisico;
			$avaFinanciero += $acta->acta_avanceFinanciero;
		}
		
		$contrato = Contract::model()->findByPk($idP);
		$contrato->contract_avanceFisico = $avaFisico;
		$contrato->contract_avanceFinanciero = $avaFinanciero;
		
		$contrato->update();
	}
}
