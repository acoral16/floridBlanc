<?php

/**
 * This is the model class for table "Project".
 *
 * The followings are the available columns in table 'Project':
 * @property integer $project_id
 * @property integer $project_createdBy
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
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
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
			array('project_departamento, project_municipio, project_nombre, project_ssepi,project_ejeTematico, project_lineaTematico, project_metaResultado, project_nombrePrograma, project_metaProducto, project_condicionesActuales, project_descripcionSituacion, project_descripcionProducto, project_causasDirectas, project_causasIndirectas, project_efectosDirectos, project_efectosIndirectos, project_region,  project_clasePoblado, project_localizacion, project_descripcion, project_objetivoGeneral, project_objetivoEspecifico, project_metaObjetivoEspecifico, project_objetivoEspecifico2, project_metaObjetivoEspecifico2, project_justificacionYantecedentes, project_fuenteFinanciacion, project_saldo, project_valor, project_fechaCreacion, project_avanceFisico, project_avanceFinanciero',  'required'),			
			array('project_createdBy, project_ssepi, project_saldo, project_valor, project_municipio, project_departamento, project_avanceFinanciero, project_avanceFisico', 'numerical', 'integerOnly'=>true),
			array('project_nombre, project_ejeTematico, project_lineaTematico, project_nombrePrograma, project_condicionesActuales, project_descripcionSituacion, project_descripcionProducto, project_causasDirectas, project_causasIndirectas, project_efectosDirectos, project_efectosIndirectos, project_region,  project_clasePoblado, project_localizacion, project_descripcion, project_objetivoGeneral, project_objetivoEspecifico, project_objetivoEspecifico2, project_justificacionYantecedentes', 'length', 'min'=>5, 'max'=>500),
			array('project_ejeTematico, project_lineaTematico, project_nombrePrograma, project_condicionesActuales, project_descripcionSituacion, project_descripcionProducto, project_causasDirectas, project_causasIndirectas, project_efectosDirectos, project_efectosIndirectos, project_region, project_clasePoblado, project_localizacion, project_descripcion, project_objetivoGeneral, project_objetivoEspecifico, project_objetivoEspecifico2', 'length', 'min'=>5, 'max'=>1000),
			array('project_justificacionYantecedentes', 'length', 'min'=>4, 'max'=>5000),
			array('project_fechaCreacion', 'type', 'type' => 'date', 'message' => '{attribute}: no es una fecha!', 'dateFormat' => 'dd/MM/yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_id, project_createdBy, project_nombre, project_ejeTematico, project_lineaTematico, project_metaResultado, project_nombrePrograma, project_metaProducto, project_condicionesActuales, project_descripcionSituacion, project_descripcionProducto, project_causasDirectas, project_causasIndirectas, project_efectosDirectos, project_efectosIndirectos, project_region, project_departamento, project_municipio, project_clasePoblado, project_localizacion, project_descripcion, project_objetivoGeneral, project_objetivoEspecifico, project_metaObjetivoEspecifico, project_objetivoEspecifico2, project_metaObjetivoEspecifico2, project_justificacionYantecedentes', 'safe', 'on'=>'search'),
			array('project_valor','compare','compareAttribute'=>'project_saldo','operator'=>'>', 'allowEmpty'=>false , 'message'=>'{attribute} debe ser mayor a el saldo del proyecto.'),
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
			'Users' => array(self::BELONGS_TO, 'Users', 'users_id'),
		);
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			// Format dates based on the locale
			foreach($this->metadata->tableSchema->columns as $project_fechaCreacion => $column)
			{
				if ($column->dbType == 'date')
				{
					$this->$project_fechaCreacion = date('Y-m-d',
							CDateTimeParser::parse($this->$project_fechaCreacion,
									Yii::app()->locale->getDateFormat('short')));
				}
				elseif ($column->dbType == 'datetime')
				{				
					$day  = strtok($this->$project_fechaCreacion, '/');
					$moth = strtok('/');
					$year = strtok('/');
						
					$this->$project_fechaCreacion = $year."/".$moth."/".$day;
				}
			}
			return true;
		}
		else
			return false;
	}
	
	protected function afterFind()
	{
		// Format dates based on the locale
		foreach($this->metadata->tableSchema->columns as $project_fechaCreacion => $column)
		{
			if (!strlen($this->$project_fechaCreacion)) continue;
	
			if ($column->dbType == 'date')
			{
				$this->$project_fechaCreacion = Yii::app()->dateFormatter->formatDateTime(
						CDateTimeParser::parse(
								$this->$project_fechaCreacion,
								'yyyy-MM-dd'
						),
						'short',null
				);
			}
			elseif ($column->dbType == 'datetime')
			{
				$year  = strtok($this->$project_fechaCreacion, '-');
				$moth = strtok('-');
				$day = strtok('-');
				$day = str_replace(" 00:00:00","",$day);
					
				$this->$project_fechaCreacion = $day."/".$moth."/".$year;
			}
		}
		return true;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Projecto',
			'project_createdBy' => 'Creado por',
			'project_nombre' => 'Nombre del proyecto',
			'project_ejeTematico' => 'Eje tematico',
			'project_lineaTematico' => 'Linea extrategica',
			'project_metaResultado' => 'Meta de resultado afectada con el desarrollo del proyecto',
			'project_nombrePrograma' => 'Nombre del programa',
			'project_metaProducto' => 'Meta de Producto afectada con el desarrollo del proyecto',
			'project_condicionesActuales' => 'Condiciones Actuales',
			'project_descripcionSituacion' => 'Descripci&oacute;n de la Situaci&oacute;n',
			'project_descripcionProducto' => 'Descripci&aacute;n del problema',
			'project_causasDirectas' => 'Causas Directas',
			'project_causasIndirectas' => 'Causas Indirectas',
			'project_efectosDirectos' => 'Efectos Directos',
			'project_efectosIndirectos' => 'Efectos Indirectos',
			'project_region' => 'Regi&oacute;n',
			'project_departamento' => 'Departamento',
			'project_municipio' => 'Municipio',
			'project_clasePoblado' => 'Clase de centro Poblado',
			'project_localizacion' => 'Localizaci&oacute;n especifica',
			'project_descripcion' => 'Descripci&oacute;n general del proyecto',
			'project_objetivoGeneral' => 'Objetivo General',
			'project_objetivoEspecifico' => 'Objetivo especifico',
			'project_metaObjetivoEspecifico' => 'Meta Objetivo especifico',
			'project_objetivoEspecifico2' => 'Objetivo Especifico',
			'project_metaObjetivoEspecifico2' => 'Meta Objetivo Especifico',
			'project_justificacionYantecedentes' => 'Justificacion y antecedentes',
			'project_valor' => 'Valor del proyecto',
			'project_fuenteFinanciacion' => 'Fuente de financiacion',
			'project_saldo' => 'Saldo',
			'project_ssepi' => 'Ssepi',
			'project_fechaCreacion' => 'Fecha de creacion',
			'project_avanceFisico' => 'Avace fisico (%)',
			'project_avanceFinanciero' => 'Avace financiero (%)',
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

		//$criteria->compare('project_id',$this->project_id);
		$criteria->compare('project_createdBy',$this->project_createdBy);
		$criteria->compare('project_nombre',$this->project_nombre,true);
		$criteria->compare('project_ejeTematico',$this->project_ejeTematico,true);
		$criteria->compare('project_lineaTematico',$this->project_lineaTematico,true);
		/*
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
		$criteria->compare('project_departamento',$this->project_departamento,true);
		$criteria->compare('project_municipio',$this->project_municipio,true);
		$criteria->compare('project_clasePoblado',$this->project_clasePoblado,true);
		$criteria->compare('project_localizacion',$this->project_localizacion,true);
		$criteria->compare('project_descripcion',$this->project_descripcion,true);
		$criteria->compare('project_objetivoGeneral',$this->project_objetivoGeneral,true);
		$criteria->compare('project_objetivoEspecifico',$this->project_objetivoEspecifico,true);
		$criteria->compare('project_metaObjetivoEspecifico',$this->project_metaObjetivoEspecifico,true);
		$criteria->compare('project_objetivoEspecifico2',$this->project_objetivoEspecifico2,true);
		$criteria->compare('project_metaObjetivoEspecifico2',$this->project_metaObjetivoEspecifico2,true);
		$criteria->compare('project_justificacionYantecedentes',$this->project_justificacionYantecedentes,true);
		$criteria->compare('project_valor',$this->project_valor,true);
		$criteria->compare('project_fuenteFinanciacion',$this->project_fuenteFinanciacion,true);
		$criteria->compare('project_saldo',$this->project_saldo,true);
		$criteria->compare('project_ssepi',$this->project_ssepi,true);
		*/
		$criteria->compare('project_avanceFisico',$this->project_avanceFisico,true);
		$criteria->compare('project_avanceFinanciero',$this->project_avanceFinanciero,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}