<?php

class ContractController extends Controller
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
				'actions'=>array('create', 'update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		Yii::app()->user->setReturnUrl(Yii::app()->request->getUrl()); //Save previos URL
		$contr = Contract::model()->findByPk($id);
		if($contr->contract_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()){
			$this->render('view',array(
					'model'=>$this->loadModel($id),
			));
		} else {
			throw new CHttpException(401,'No estas autorizado para ver este contrato.');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($idP)
	{
		//Solo se permiten crear contratos si se sabe el proyecto asociado
		if(isset($_GET['idP']))
		{
			$project = Projects::model()->findByPk($idP);
			if($project->project_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()) //Solo admin o el usuario que creo el proyecto puede agregarle contratos
			{
				$model=new Contract;

				// Uncomment the following line if AJAX validation is needed
				$this->performAjaxValidation($model);

				if(isset($_POST['Contract']))
				{
					$attributes = $_POST['Contract'];
					$attributes['contract_proyectoId'] = $idP;
					$attributes['contract_createdBy'] = Yii::app()->user->id;
					$attributes['contract_fechaActualizacion'] = $attributes['contract_fechaRegistroContrato'];
					$model->attributes = $attributes;
					//$this->beforeSave();
					if($model->save())
						$this->redirect(array('view','id'=>$model->contract_id));
				}
				
				$this->render('create',array(
						'model'=>$model,
				));
			} else {
				throw new CHttpException(401,'No estas autorizado para crear contratos a este proyecto.');
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		//Check if the user can update this model
		if($this->isAuthorized($model)){
			if(isset($_POST['Contract']))
			{
					$attributes = $_POST['Contract'];
					$fecha = new DateTime();
					$attributes['contract_fechaActualizacion'] = date_format($fecha, 'd/m/Y');
					$model->attributes = $attributes;
				if($model->save())
					$this->redirect(array('view','id'=>$model->contract_id));
			}

			$this->render('update',array(
					'model'=>$model,
			));

		} else {
			throw new CHttpException(401,'No estas autorizado para editar este contrato.');
		}
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
			$model = Projects::model()->findByPk($_GET['idP']);
			if($model->project_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()) {		 
				$model=new Contract('search');
				$model->unsetAttributes();  // clear any default values
				$array = array('contract_proyectoId' => $_GET['idP']);	
				$model->attributes = $array;
				$this->render('admin',array(
						'model'=>$model,
				));
			} else {
				throw new CHttpException(401,'No estas autorizado para ver este contrato.');
			}
		}
		else if(Yii::app()->user->isAdmin()){
			$dataProvider=new CActiveDataProvider('Contract');
			$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));
		} else {
			$this->redirect('index.php?r=projects/index');
		}
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{		
		$model=new Contract('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contract'])){
			$var = $_GET['Contract'];
			$model->attributes=$_GET['Contract'];
		}
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
		$model=Contract::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='contract-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Check is the user can perform the operation
	 * Only admin or user who create the contract can modify the contracts
	 */
	protected function isAuthorized($model)
	{
		if(Yii::app()->user->isAdmin() || $model->createdBy === Yii::app()->user->id)
			return true;
		else
			return false;
	}
	
}