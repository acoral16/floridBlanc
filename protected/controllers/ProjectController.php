<?php

class ProjectController extends Controller
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
				'actions'=>array('create','update', 'UpdateCities'),
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
		$model = Project::model()->findByPk($id);
		if($model->project_createdBy === Yii::app()->user->id || Yii::app()->user->isAdmin()){
			//Modificar el código por el nombre del departamento y del municipio
			$muni = Municipios::model()->findByAttributes(array('municipios_code'=>$model->project_municipio));
			$dpto = Dptos::model()->findByAttributes(array('dptos_code'=>$model->project_departamento));
			$model->project_municipio = $muni->municipios_name;
			$model->project_departamento = $dpto->dptos_name;
			$this->render('view',array(
				'model'=>$model,//$this->loadModel($id),
			));
		} else {
			throw new CHttpException(401,'No estas autorizado para ver este proyecto.');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Project;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$attributes = $_POST['Project'];
			$attributes['project_createdBy'] = Yii::app()->user->id;
			$attributes['project_avanceFisico'] = 0;
			$attributes['project_avanceFinanciero'] = 0;
			$model->attributes = $attributes;
			if($model->save()){
				$this->redirect(array('view','id'=>$model->project_id));			
			}
		}
		
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		$this->performAjaxValidation($model);
		
		//Check if the user can update this model
		if($this->isAuthorized($model)){			
			if(isset($_POST['Project']))
			{
				$model->attributes=$_POST['Project'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->project_id));
			}
			$this->render('update',array(
				'model'=>$model,
			));
		}else
			throw new CHttpException(401,'No estas autorizado para editar este proyecto.');

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//Check if the user can update this model
		if($this->isAuthorized(loadModel($id))){
			$this->loadModel($id)->delete();
		}
		else
			throw new CHttpException(401,'No estas autorizado para eliminar este proyecto.');

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->isAdmin()){ //Si es administrador traiga todos los proyectos
			$dataProvider=new CActiveDataProvider('Project');
			$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));
		}
		else{ //Si es usuario solo traiga mis proyectos
			$model=new Project('search');
			$model->unsetAttributes();  // clear any default values
			$array = array('project_createdBy' => Yii::app()->user->id);
			$model->attributes = $array;
			$this->render('admin',array(
					'model'=>$model,
			));
		}

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if($this->isAuthorized(null)){
			$model=new Project('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Project']))
				$model->attributes=$_GET['Project'];
				
			$this->render('admin',array(
					'model'=>$model,
			));
		}
		else
			throw new CHttpException(401,'No estas autorizado para editar este proyecto.');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Check is the user can perform the operation
	 * Only admin or user who create the project can update the project
	 */
	protected function isAuthorized($model)
	{
		if(Yii::app()->user->isAdmin() || $model->project_createdBy === Yii::app()->user->id)
			return true;
		else
			return false;
	}
	
	public function actionUpdateCities()
	{
		$var = $_POST['Project'];
		$dptoCode = $_POST['Project']['project_departamento'];
		$data= Municipios::model()->findAll('municipios_dptos_code=:municipios_dptos_code',
				array(':municipios_dptos_code'=>(int) $dptoCode));
		
		$data=CHtml::listData($data,'municipios_code','municipios_name');
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
		}
	}

}
