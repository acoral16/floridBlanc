<?php

/**
 * This is the model class for table "Project".
 *
 * The followings are the available columns in table 'Project':
 * @property integer $project_id
 * @property string $project_nombre
 * @property string $project_ejeTematico
 * @property string $project_lineaTematico
 * @property string $project_metaResultado
 * @property string $project_nombrePrograma
 * @property string $project_metaProducto
 * @property string $project_condicionesActuales
 * @property string $project_descripcionSituacion
 * @property string $project_descripcionProducto
 * @property string $project_causasDirectas
 * @property string $project_causasIndirectas
 * @property string $project_efectosDirectos
 * @property string $project_efectosIndirectos
 * @property string $project_region
 * @property integer $project_departamento
 * @property integer $project_municipio
 * @property string $project_clasePoblado
 * @property string $project_localizacion
 * @property string $project_descripcion
 * @property string $project_objetivoGeneral
 * @property string $project_objetivoEspecifico
 * @property string $project_metaObjetivoEspecifico
 * @property string $project_objetivoEspecifico2
 * @property string $project_metaObjetivoEspecifico2
 * @property string $project_justificacionYantecedentes
 * @property integer $project_valor
 * @property string $project_fuenteFinanciacion
 * @property integer $project_saldo
 * @property string $project_ssepi
 * @property integer $project_createdBy
 * @property integer $project_avanceFisico
 * @property integer $project_avanceFinanciero
 * @property string $project_fechaCreacion
 * @property integer $project_activo
 *
 * The followings are the available model relations:
 * @property Acta[] $actas
 * @property Contract[] $contracts
 * @property Dptos $projectDepartamento
 * @property Municipios $projectMunicipio
 * @property Users $projectCreatedBy
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_nombre, project_ejeTematico, project_lineaTematico, project_metaResultado, project_nombrePrograma, project_metaProducto, project_condicionesActuales, project_descripcionSituacion, project_descripcionProducto, project_causasDirectas, project_causasIndirectas, project_efectosDirectos, project_efectosIndirectos, project_region, project_departamento, project_municipio, project_clasePoblado, project_localizacion, project_descripcion, project_objetivoGeneral, project_objetivoEspecifico, project_metaObjetivoEspecifico, project_objetivoEspecifico2, project_metaObjetivoEspecifico2, project_justificacionYantecedentes, project_valor, project_fuenteFinanciacion, project_saldo, project_ssepi, project_createdBy, project_avanceFisico, project_avanceFinanciero, project_fechaCreacion, project_activo', 'required'),
			array('project_departamento, project_municipio, project_valor, project_saldo, project_createdBy, project_avanceFisico, project_avanceFinanciero, project_activo', 'numerical', 'integerOnly'=>true),
			array('project_nombre', 'length', 'max'=>500),
			array('project_ejeTematico, project_lineaTematico, project_nombrePrograma, project_condicionesActuales, project_descripcionSituacion, project_descripcionProducto, project_causasDirectas, project_causasIndirectas, project_efectosDirectos, project_efectosIndirectos, project_region, project_clasePoblado, project_localizacion, project_descripcion, project_objetivoGeneral, project_objetivoEspecifico, project_objetivoEspecifico2', 'length', 'max'=>1000),
			array('project_metaResultado, project_metaProducto, project_metaObjetivoEspecifico, project_metaObjetivoEspecifico2', 'length', 'max'=>30),
			array('project_justificacionYantecedentes', 'length', 'max'=>5000),
			array('project_fuenteFinanciacion, project_ssepi', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_id, project_nombre, project_ejeTematico, project_lineaTematico, project_metaResultado, project_nombrePrograma, project_metaProducto, project_condicionesActuales, project_descripcionSituacion, project_descripcionProducto, project_causasDirectas, project_causasIndirectas, project_efectosDirectos, project_efectosIndirectos, project_region, project_departamento, project_municipio, project_clasePoblado, project_localizacion, project_descripcion, project_objetivoGeneral, project_objetivoEspecifico, project_metaObjetivoEspecifico, project_objetivoEspecifico2, project_metaObjetivoEspecifico2, project_justificacionYantecedentes, project_valor, project_fuenteFinanciacion, project_saldo, project_ssepi, project_createdBy, project_avanceFisico, project_avanceFinanciero, project_fechaCreacion, project_activo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actas' => array(self::HAS_MANY, 'Acta', 'acta_projectId'),
			'contracts' => array(self::HAS_MANY, 'Contract', 'contract_proyectoId'),
			'projectDepartamento' => array(self::BELONGS_TO, 'Dptos', 'project_departamento'),
			'projectMunicipio' => array(self::BELONGS_TO, 'Municipios', 'project_municipio'),
			'projectCreatedBy' => array(self::BELONGS_TO, 'Users', 'project_createdBy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Project',
			'project_nombre' => 'Project Nombre',
			'project_ejeTematico' => 'Project Eje Tematico',
			'project_lineaTematico' => 'Project Linea Tematico',
			'project_metaResultado' => 'Project Meta Resultado',
			'project_nombrePrograma' => 'Project Nombre Programa',
			'project_metaProducto' => 'Project Meta Producto',
			'project_condicionesActuales' => 'Project Condiciones Actuales',
			'project_descripcionSituacion' => 'Project Descripcion Situacion',
			'project_descripcionProducto' => 'Project Descripcion Producto',
			'project_causasDirectas' => 'Project Causas Directas',
			'project_causasIndirectas' => 'Project Causas Indirectas',
			'project_efectosDirectos' => 'Project Efectos Directos',
			'project_efectosIndirectos' => 'Project Efectos Indirectos',
			'project_region' => 'Project Region',
			'project_departamento' => 'Project Departamento',
			'project_municipio' => 'Project Municipio',
			'project_clasePoblado' => 'Project Clase Poblado',
			'project_localizacion' => 'Project Localizacion',
			'project_descripcion' => 'Project Descripcion',
			'project_objetivoGeneral' => 'Project Objetivo General',
			'project_objetivoEspecifico' => 'Project Objetivo Especifico',
			'project_metaObjetivoEspecifico' => 'Project Meta Objetivo Especifico',
			'project_objetivoEspecifico2' => 'Project Objetivo Especifico2',
			'project_metaObjetivoEspecifico2' => 'Project Meta Objetivo Especifico2',
			'project_justificacionYantecedentes' => 'Project Justificacion Yantecedentes',
			'project_valor' => 'Project Valor',
			'project_fuenteFinanciacion' => 'Project Fuente Financiacion',
			'project_saldo' => 'Project Saldo',
			'project_ssepi' => 'Project Ssepi',
			'project_createdBy' => 'Project Created By',
			'project_avanceFisico' => 'Project Avance Fisico',
			'project_avanceFinanciero' => 'Project Avance Financiero',
			'project_fechaCreacion' => 'Project Fecha Creacion',
			'project_activo' => 'Project Activo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('project_nombre',$this->project_nombre,true);
		$criteria->compare('project_ejeTematico',$this->project_ejeTematico,true);
		$criteria->compare('project_lineaTematico',$this->project_lineaTematico,true);
		$criteria->compare('project_metaResultado',$this->project_metaResultado,true);
		$criteria->compare('project_nombrePrograma',$this->project_nombrePrograma,true);
		$criteria->compare('project_metaProducto',$this->project_metaProducto,true);
		$criteria->compare('project_condicionesActuales',$this->project_condicionesActuales,true);
		$criteria->compare('project_descripcionSituacion',$this->project_descripcionSituacion,true);
		$criteria->compare('project_descripcionProducto',$this->project_descripcionProducto,true);
		$criteria->compare('project_causasDirectas',$this->project_causasDirectas,true);
		$criteria->compare('project_causasIndirectas',$this->project_causasIndirectas,true);
		$criteria->compare('project_efectosDirectos',$this->project_efectosDirectos,true);
		$criteria->compare('project_efectosIndirectos',$this->project_efectosIndirectos,true);
		$criteria->compare('project_region',$this->project_region,true);
		$criteria->compare('project_departamento',$this->project_departamento);
		$criteria->compare('project_municipio',$this->project_municipio);
		$criteria->compare('project_clasePoblado',$this->project_clasePoblado,true);
		$criteria->compare('project_localizacion',$this->project_localizacion,true);
		$criteria->compare('project_descripcion',$this->project_descripcion,true);
		$criteria->compare('project_objetivoGeneral',$this->project_objetivoGeneral,true);
		$criteria->compare('project_objetivoEspecifico',$this->project_objetivoEspecifico,true);
		$criteria->compare('project_metaObjetivoEspecifico',$this->project_metaObjetivoEspecifico,true);
		$criteria->compare('project_objetivoEspecifico2',$this->project_objetivoEspecifico2,true);
		$criteria->compare('project_metaObjetivoEspecifico2',$this->project_metaObjetivoEspecifico2,true);
		$criteria->compare('project_justificacionYantecedentes',$this->project_justificacionYantecedentes,true);
		$criteria->compare('project_valor',$this->project_valor);
		$criteria->compare('project_fuenteFinanciacion',$this->project_fuenteFinanciacion,true);
		$criteria->compare('project_saldo',$this->project_saldo);
		$criteria->compare('project_ssepi',$this->project_ssepi,true);
		$criteria->compare('project_createdBy',$this->project_createdBy);
		$criteria->compare('project_avanceFisico',$this->project_avanceFisico);
		$criteria->compare('project_avanceFinanciero',$this->project_avanceFinanciero);
		$criteria->compare('project_fechaCreacion',$this->project_fechaCreacion,true);
		$criteria->compare('project_activo',$this->project_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}