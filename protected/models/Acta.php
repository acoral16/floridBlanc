<?php

/**
 * This is the model class for table "acta".
 *
 * The followings are the available columns in table 'acta':
 * @property integer $acta_id
 * @property string $acta_name
 * @property string $acta_path
 * @property integer $acta_createdBy
 * @property integer $acta_projectId
 * @property integer $acta_contractId
 *
 * The followings are the available model relations:
 * @property Contract $actaContract
 * @property Users $actaCreatedBy
 * @property Project $actaProject
 */
class Acta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Acta the static model class
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
		return 'acta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('acta_name, acta_createdBy, acta_projectId, acta_contractId, acta_path, acta_avanceFisico, acta_avanceFinanciero, acta_fechaCargue, acta_pagada', 'required'),
			array('acta_createdBy, acta_projectId, acta_contractId', 'numerical', 'integerOnly'=>true),
			array('acta_name', 'length', 'min'=>5, 'max'=>100),
			array('acta_path', 'file', 'types'=>'jpg, gif, png, tiff, pdf'),
			array('acta_fechaCargue', 'type', 'type' => 'date', 'message' => '{attribute}: no es una fecha!', 'dateFormat' => 'dd/MM/yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('acta_id, acta_name, acta_createdBy, acta_projectId, acta_contractId', 'safe', 'on'=>'search'),
			array('acta_avanceFisico', 'greaterThanHundred'),
			array('acta_avanceFinanciero', 'greaterThanHundred'),
		);
	}
	
	//Regla de validacion del valor del porcentaje del proyecto
	public function greaterThanHundred($attribute,$params)
	{
		if ($this->$attribute>100)
			$this->addError($attribute, 'El porcentaje respecto al valor del proyecto no puede ser mayor al 100%');
		else if ($this->$attribute<0)
			$this->addError($attribute, 'El porcentaje respecto al valor del proyecto no puede ser menor al 0%');
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actaContract' => array(self::BELONGS_TO, 'Contract', 'acta_contractId'),
			'actaCreatedBy' => array(self::BELONGS_TO, 'Users', 'acta_createdBy'),
			'actaProject' => array(self::BELONGS_TO, 'Project', 'acta_projectId'),
		);
	}
	
	//Se ajusta la fecha antes de guardarla en la bd
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			// Format dates based on the locale
			foreach($this->metadata->tableSchema->columns as $acta_fechaCargue => $column)
			{
				if ($column->dbType == 'date')
				{
					$this->$acta_fechaCargue = date('Y-m-d',
							CDateTimeParser::parse($this->$acta_fechaCargue,
									Yii::app()->locale->getDateFormat('short')));
				}
				elseif ($column->dbType == 'datetime')
				{
					$day  = strtok($this->$acta_fechaCargue, '/');
					$moth = strtok('/');
					$year = strtok('/');
						
					$this->$acta_fechaCargue = $year."/".$moth."/".$day;
				}
			}
			return true;
		}
		else
			return false;
	}
	
	//Se ajusta la fecha antes de mostrarla en la vista
	protected function afterFind()
	{
		// Format dates based on the locale
		foreach($this->metadata->tableSchema->columns as $acta_fechaCargue => $column)
		{
			if (!strlen($this->$acta_fechaCargue)) continue;
	
			if ($column->dbType == 'date')
			{
				$this->$acta_fechaCargue = Yii::app()->dateFormatter->formatDateTime(
						CDateTimeParser::parse(
								$this->$acta_fechaCargue,
								'yyyy-MM-dd'
						),
						'short',null
				);
			}
			elseif ($column->dbType == 'datetime')
			{
				$year  = strtok($this->$acta_fechaCargue, '-');
				$moth = strtok('-');
				$day = strtok('-');
				$day = str_replace(" 00:00:00","",$day);
					
				$this->$acta_fechaCargue = $day."/".$moth."/".$year;
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
			'acta_id' => 'Acta',
			'acta_name' => 'Nombre del acta',
			'acta_path' => 'Archivo',
			'acta_createdBy' => 'Creada por',
			'acta_projectId' => 'Proyecto asociado',
			'acta_contractId' => 'Contrato asociado',
			'acta_avanceFisico' => 'Avance fisico (%)',
			'acta_avanceFinanciero'	=> 'Avance financiero (%)',
			'acta_fechaCargue' => 'Fecha de cargue',
			'acta_pagada' => 'Ya se pago?'	
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

		$criteria->compare('acta_id',$this->acta_id);
		$criteria->compare('acta_name',$this->acta_name,true);
		$criteria->compare('acta_createdBy',$this->acta_createdBy);
		$criteria->compare('acta_projectId',$this->acta_projectId);
		$criteria->compare('acta_contractId',$this->acta_contractId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}